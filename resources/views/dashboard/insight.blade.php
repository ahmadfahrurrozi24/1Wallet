@extends('dashboard.layout.template')
@section('content')
    <div class="wrapper">
        <div class="dashboard-insight">
            <!-- Money Expense -->
            <div class="expense box-insight">
                <div class="box-head">
                    <p>Expense</p>
                    <h3>This Week</h3>
                </div>
                <div class="box-balance">
                    <h1>@amount($recordTotal['totalExpenseWeek'])</h1>
                </div>
            </div>

            <!-- Money Income -->
            <div class="income box-insight">
                <div class="box-head">
                    <p>Income</p>
                    <h3>This Week</h3>
                </div>
                <div class="box-balance">
                    <h1>@amount($recordTotal['totalIncomeWeek'])</h1>
                </div>
            </div>
        </div>

        <div>

            {{-- lineChart --}}
            <div class="linechart1">
                <div class="line-chart">
                    <canvas id="myChart"></canvas>
                </div>
            </div>

            <div class="pieWrap">
                {{-- Expense Pie Chart --}}
                @if ($available['expense'])
                    <div class="piechart-">
                        <h3>Expense</h3>
                        <canvas id="ExpenseChart"></canvas>
                    </div>
                @endif

                {{-- Income Pie Chart --}}
                @if ($available['income'])
                    <div class="piechart-">
                        <h3>Income</h3>
                        <canvas id="IncomeChart"></canvas>
                    </div>
                @endif
            </div>
        </div>



    </div>
@endsection
@section('js')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
        integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js"
        integrity="sha512-Tfw6etYMUhL4RTki37niav99C6OHwMDB2iBT5S5piyHO+ltK2YX8Hjy9TXxhE1Gm/TmAV0uaykSpnHKFIAif/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js"
        integrity="sha512-Tfw6etYMUhL4RTki37niav99C6OHwMDB2iBT5S5piyHO+ltK2YX8Hjy9TXxhE1Gm/TmAV0uaykSpnHKFIAif/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- line-chart --}}
    <script>
        let dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
        };

        const weekData = {!! $weekChartData !!}
        let labelWeekExpense = Object.keys(weekData.expense)
        let dataWeekExpense = Object.values(weekData.expense)
        let labelWeekIncome = Object.keys(weekData.income)
        let dataWeekIncome = Object.values(weekData.income)


        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labelWeekExpense,
                datasets: [{
                        label: 'Expense',
                        data: dataWeekExpense,
                        backgroundColor: "#de0a26",
                        borderColor: "#de0a26",
                        borderWidth: 3
                    },
                    {
                        label: 'Income',
                        data: dataWeekIncome,
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

                if (sum == 0) delete total[key]

            }

            return total
        }

        // pie-Chart Expense
        let categoryData = {!! $categoryChartData !!}
        let options = {
            plugins: {
                tooltip: {
                    enabled: false
                },
                datalabels: {
                    formatter: (value, ctx) => {
                        let sum = 0;
                        let dataArr = ctx.chart.data.datasets[0].data;
                        dataArr.map(data => {
                            sum += data;
                        });
                        let percentage = (value * 100 / sum).toFixed(2) + "%";
                        return percentage;
                    },
                    color: '#fff',
                }
            }
        }

        const ctxExpense = document.getElementById('ExpenseChart').getContext('2d');
        const expenseChartColor = Array.from({
            length: Object.keys(getTotalData(categoryData.expense)).length
        }, () => dynamicColors())
        const ExpenseChart = new Chart(ctxExpense, {
            type: 'pie',
            data: {
                labels: Object.keys(getTotalData(categoryData.expense)),
                datasets: [{
                    data: Object.values(getTotalData(categoryData.expense)),
                    backgroundColor: expenseChartColor,
                }]
            },
            options,
            responsive: true,
            maintainAspectRatio: false,
            plugins: [ChartDataLabels]
        });


        // pie-Chart Income
        const ctxIncome = document.getElementById('IncomeChart').getContext('2d');
        const incomeChartColor = Array.from({
            length: Object.keys(getTotalData(categoryData.income)).length
        }, () => dynamicColors())
        const IncomeChart = new Chart(ctxIncome, {
            type: 'pie',
            data: {
                labels: Object.keys(getTotalData(categoryData.income)),
                datasets: [{
                    data: Object.values(getTotalData(categoryData.income)),
                    backgroundColor: incomeChartColor,
                }]
            },
            options,
            responsive: true,
            maintainAspectRatio: false,
            plugins: [ChartDataLabels]
        });
    </script>
@endsection
