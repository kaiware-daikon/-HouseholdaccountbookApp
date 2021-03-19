@extends('layouts.admin')

@section('title', '支出一覧')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>支出一覧</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ action('Admin\HouseholdAccountBookController@create') }}" role="button"
                        class="btn btn-info">支出の登録</a>
                </div>
                <div class="col-md-3 pull-center">
                    <form action="{{ action('Admin\HouseholdAccountBookController@index') }}">
                        <div class="form-group row">
                            <div class="col-md-10">
                                <label>月別一覧</label>
                                <select class="form-control" name="select_month">
                                    <option value="" selected="selected">選択して下さい</option>
                                    <option value=1>1月</option>
                                    <option value=2>2月</option>
                                    <option value=3>3月</option>
                                    <option value=4>4月</option>
                                    <option value=5>5月</option>
                                    <option value=6>6月</option>
                                    <option value=7>7月</option>
                                    <option value=8>8月</option>
                                    <option value=9>9月</option>
                                    <option value=10>10月</option>
                                    <option value=11>11月</option>
                                    <option value=12>12月</option>
                                </select>
                            </div>
                            <div class="col-md-10">
                                <label>項目別一覧</label>
                                <select class="form-control" name="select_account">
                                    <option value="" selected="selected">選択して下さい</option>
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
                            <div class="col-md-2">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-info" value="設定">
                            </div>

                        </div>
                    </form>
                </div>

                @if (!empty($totalPrice))
                <div class="container">
                    <div class="d-flex flex-row-reverse bd-highlight">
                        <div class="card center">
                            <div class="card-header">今月の合計金額</div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    {{ number_format($totalPrice) }}円
                                </li>
                            </ul>
                        </div>
                @endif
                @if (!empty($totalPrice))
                    <div class="card center">
                        <div class="card-header">合計金額が一番高い項目とその平均額</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                {{ $mostExpensiveAccount }} - {{ number_format($mostExpensiveAccountAveragePrice) }}円
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="10%">No.</th>
                                <th width="10%">支払日</th>
                                <th width="20%">項目</th>
                                <th width="30%">商品名</th>
                                <th width="10%">数量</th>
                                <th width="10%">単価</th>
                                <th width="10%">小計</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @if (!empty($householdaccountbook))
                            @foreach ($householdaccountbook as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->payment_date->format('Y/m/d') }}</td>
                                    @if ($data->account == '')
                                        <td></td>
                                    @else
                                        <td>{{ $data->account }}</td>
                                    @endif
                                    <td>{!! nl2br(e(Str::limit($data->name, 100))) !!}</td>
                                    <td>{{ $data->num }}</td>
                                    <td class="unit_price">{{ $data->unit_price }}</td>
                                    <td class="unit_price">{{ $data->formatted_price }}</td>
                                    <td>
                                        <p><a
                                                href="{{ action('Admin\HouseholdAccountBookController@edit', ['id' => $data->id]) }}">編集</a>
                                        </p>
                                        <p><a
                                                href="{{ action('Admin\HouseholdAccountBookController@delete', ['id' => $data->id]) }}">削除</a>
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
