@extends('layouts.admin')

@section('title', '支出データの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>支出データの編集</h2>
            </div>
        </div>
        <form action="{{ action('Admin\HouseholdAccountBookController@update',['id' => $householdaccountbook->id]) }}" method="post">
            @if (count($errors) > 0)
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
            @endif
            <div class="row">
                <div class="col">
                    <label class="label">支払日</label>
                <input type="date" class="form-control" name="payment_date" max="{{ date('Y-m-d')}}" value="{{ $householdaccountbook->payment_date->format('Y-m-d') }}">
                </div>
                <div class="col">
                    <label class="label">項目</label>
                    <select class="form-control" name="account">
                        <option value="食費">食費</option>
                        <option value="日用品費">日用品費</option>
                        <option value="交通費">交通費</option>
                        <option value="住居費">住居費</option>
                        <option value="水道光熱費">水道光熱費</option>
                        <option value="通信費">通信費</option>
                        <option value="保険料">保険料</option>
                        <option value="教育費">教育費</option>
                        <option value="医療費">医療費</option>
                        <option value="交際費">交際費</option>
                        <option value="美容費">美容費</option>
                        <option value="被服費">被服費</option>
                        <option value="娯楽費">娯楽費</option>
                        <option value="雑費">雑費</option>
                        <option value="特別費">特別費</option>
                        <option value="税金">税金</option>
                        <option value="お小遣い">お小遣い</option>
                        <option value="その他">その他</option>
                    </select>
                </div>
                <div class="col">
                    <label class="label">商品名</label>
                <input type="text" class="form-control" name="name" value="{{ $householdaccountbook->name }}">
                </div>
                <div class="col">
                    <label class="label">数量</label>
                <input type="number" class="form-control" name="num" min=1 value="{{ $householdaccountbook->num }}">
                </div>
                <div class="col">
                    <label class="label">単価</label>
                <input type="text" class="form-control" name="unit_price" value="{{ $householdaccountbook->unit_price }}">
                </div>
                {{ csrf_field() }}
                <div class="col">
                    <input type="submit" class="btn btn-info" value="更新">
                </div>
                <div class="col">
                <p><a href="{{ action('Admin\HouseholdAccountBookController@index') }}">一覧に戻る</a></p>
                </div>
            </div>
        </form>
    </div>
@endsection