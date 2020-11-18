<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HouseholdaccountbookController extends Controller
{
    public function add()
    {
        return view('admin.householdaccountbook.create');
    }

    public function create()
    {
        return redirect('admin/householdaccountbook');
    }

    public function index()
    {
        return view('admin.householdaccountbook.index');
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
