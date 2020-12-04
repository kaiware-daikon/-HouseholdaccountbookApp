@extends('layouts.admin')

@section('title', '支出内訳')

@section('content')

    <body>
        <h1>支出内訳</h1>
        <div class="chartWrapper">
            <canvas id="myPieChart" height="500" width="500"></canvas>
        </div>
        <div>
            <form action="{{ action('Admin\HouseholdAccountBookController@showChart') }}">
                <select name="select_month">
                    <option value="" selected="selected">選択して下さい</option>
                    <option value="1">1月</option>
                    <option value="2">2月</option>
                    <option value="3">3月</option>
                    <option value="4">4月</option>
                    <option value="5">5月</option>
                    <option value="6">6月</option>
                    <option value="7">7月</option>
                    <option value="8">8月</option>
                    <option value="9">9月</option>
                    <option value="10">10月</option>
                    <option value="11">11月</option>
                    <option value="12">12月</option>
                </select>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-info" value="設定">
            </form>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
        <script>
            let ctx = document.getElementById("myPieChart");
            let myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["食費", "日用品費", "交通費", "住居費",
                        "水道光熱費", "通信費", "保険料", "教育費",
                        "医療費", "交際費", "美容費", "被服費",
                        "娯楽費", "雑費", "特別費", "税金", "お小遣い", "その他"
                    ],
                    datasets: [{
                        backgroundColor: [
                            "#FFBEDA",
                            "#FFC7AF",
                            "#FFDBC9",
                            "#FFD5EC",
                            "#EAD9FF",
                            "#D9E5FF",
                            "#D7EEFF",
                            "#F3FFD8",
                            "#CEF9DC",
                            "#E6FFE9",
                            "#CBFFD3",
                            "#B1F9D0",
                            "#EDFFBE",
                            "#C2EEFF",
                            "#BAD3FF",
                            "#DCC2FF",
                            "#FFABCE",
                            "#FFAD90"
                        ],
                        data: [1, 2, 3]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: '支出内訳'
                    }
                }
            });

        </script>
        <p><a href="{{ action('Admin\HouseholdAccountBookController@index') }}">一覧へ</a></p>

    </body>

@endsection
