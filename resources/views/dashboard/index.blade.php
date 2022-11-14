@extends('dashboard.layout.template')
@section('content')
    <div class="wrapper">
        <div class="dashboard-information">
            <div class="wallet box-dashboard">
                <div class="box-head">
                    <p>My Wallet</p>
                    <h3>Money Availabe</h3>
                </div>
                <div class="box-balance">
                    <h1>@balance(auth()->user()->current_balance)</h1>
                </div>
            </div>

            <!-- Money Expense -->
            <div class="expense box-dashboard">
                <div class="box-head">
                    <p>My Expense</p>
                    <h3>This Month</h3>
                </div>
                <div class="box-balance">
                    <h1>@amount($recordTotal['totalExpenseMonth'])</h1>
                </div>
            </div>

            <!-- Money Income -->
            <div class="income box-dashboard">
                <div class="box-head">
                    <p>My Income</p>
                    <h3>This Month</h3>
                </div>
                <div class="box-balance">
                    <h1>@amount($recordTotal['totalIncomeMonth'])</h1>
                </div>
            </div>

            {{-- lineChart --}}
            <div class="linechart1">
                <div class="line-chart">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>


    {{-- <h1>Index Dashboard</h1>
	<h2>Hello, {{ auth()->user()->name }}</h2>
    <div style="display: flex;gap: 10px">
        <div>
            <h2>My balance :{{ Helper::balanceFormat(auth()->user()->current_balance) }} </h2>
            <h2>My expense this week : {{ Helper::amountFormat($recordTotal["totalExpenseWeek"]) }}</h2>
            <h2>My income this week : {{ Helper::amountFormat($recordTotal["totalIncomeWeek"]) }}</h2>
            <h2>My expense this month : {{ Helper::amountFormat($recordTotal["totalExpenseMonth"]) }}</h2>
            <h2>My income this month : {{ Helper::amountFormat($recordTotal["totalIncomeMonth"]) }}</h2>
        </div>
        <div>
            <h2>Last Transaction</h2>
            <ul>
                @foreach ($lastRecord as $Lr)
                    <li>
                        <h2>{{ Helper::amountFormat($Lr->amount) }}</h2>
                        <p>{{ $Lr->category->type->name }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div> --}}
@endsection
@section('js')

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js"
    integrity="sha512-Tfw6etYMUhL4RTki37niav99C6OHwMDB2iBT5S5piyHO+ltK2YX8Hjy9TXxhE1Gm/TmAV0uaykSpnHKFIAif/A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- line chart --}}
    <script>
        let dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
        };

        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                datasets: [{
                        label: 'Expense',
                        data: [12, 19, 3, 5, 2, 3, 69],
                        backgroundColor: "#de0a26",
                        borderColor: "#de0a26",
                        borderWidth: 3
                    },
                    {
                        label: 'Income',
                        data: [16, 14, 25, 7, 6, 1, 57],
                        backgroundColor: "#03ac13",
                        borderColor: "#03ac13",
                        borderWidth: 3
                    }
                ]
            },
            responsive: true,
            maintainAspectRatio: false,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        function getTotalData(objectData) {
            let total = {};

            // console.log(dataExpenseChart)
            for (const [key, value] of Object.entries(objectData)) {
                let sum = 0;
                for (const data of value) {
                    sum += parseInt(data)
                }

                if (sum < 0) sum *= -1

                total = {
                    ...total,
                    [key]: sum
                }
            }

            return total
        }
    </script>
@endsection
