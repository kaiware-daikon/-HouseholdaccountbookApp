<?php

namespace App\Http\Controllers\Admin;

use App\HouseholdAccountBook;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HouseholdAccountBookController extends Controller
{
    public function add()
    {
        return view('admin.householdaccountbook.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, HouseholdAccountBook::$rules);

        $householdaccountbook = new HouseholdAccountBook;
        $register = $request->input('register');

        $form = $request->all();

        unset($form['_token']);

        $householdaccountbook->fill($form);
        $householdaccountbook->save();

        if ($register === "連続登録") {
            return redirect()->action('Admin\HouseholdAccountBookController@create');
        }
        return redirect()->action('Admin\HouseholdAccountBookController@index');
    }

    public function index(Request $request)
    {
        $selectAccount = $request->select_account;
        $month = $request->select_month ?? Carbon::now()->month;
        // $month = isset($selectMonth) ? $selectMonth : Carbon::now()->month;

        if (!empty($selectAccount)) {
            $householdaccountbook = HouseholdAccountBook::where('account', $selectAccount)->whereMonth('payment_date', $month)->orderBy('payment_date')->get();
        } else {
            $householdaccountbook = HouseholdAccountBook::whereMonth('payment_date', $month)->orderBy('payment_date')->get();
        }
        // $householdaccountbook = HouseholdAccountBook::whereMonth('payment_date', $month)->orderBy('payment_date')->get();

        $totalPrice = 0;
        foreach ($householdaccountbook as $data) {
            $totalPrice += $data->price;
        }
        // compact('posts', 'totalPrice') と ['posts' => $posts, 'totalPrice' => $totalPrice]
        // は同じ
        return view('admin.householdaccountbook.index', compact('householdaccountbook', 'totalPrice', 'selectAccount'));
    }

    public function edit(Request $request)
    {
        $householdaccountbook = HouseholdAccountBook::find($request->id);

        if (empty($householdaccountbook)) {
            abort(404);
        }

        return view('admin.householdaccountbook.edit', ['householdaccountbook' => $householdaccountbook]);
    }

    public function update(Request $request)
    {
        $householdaccountbook = HouseholdAccountBook::find($request->id);
        $this->validate($request, HouseholdAccountBook::$rules);

        $form = $request->all();

        unset($form['_token']);
        $householdaccountbook->fill($form);
        $householdaccountbook->save();

        return redirect()->action('Admin\HouseholdAccountBookController@index');
    }

    public function delete(Request $request)
    {
        $householdAccountBook = HouseholdAccountBook::find($request->id);

        $householdAccountBook->delete();

        return redirect()->action('Admin\HouseholdAccountBookController@index');
    }

    public function showChart(Request $request)
    {

        return view('admin.householdaccountbook.chart');
    }
}
