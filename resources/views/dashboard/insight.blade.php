@extends('dashboard.layout.template')
@section('content')
    <div class="wrapper">
        <div class="dashboard-insight">
            <!-- Money Expense -->
            <div class="expense box-insight">
                <div class="box-head">
                    <p>Expense</p>
                    {{-- <h3>This Month</h3> --}}
                </div>
                <div class="box-balance">
                    <h1>IDR 100,000</h1>
                </div>
            </div>

            <!-- Money Income -->
            <div class="income box-insight">
                <div class="box-head">
                    <p>Income</p>
                    {{-- <h3>This Month</h3> --}}
                </div>
                <div class="box-balance">
                    <h1>IDR 12,000,000</h1>
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
                <div class="piechart-">
                    <h3>Expense</h3>
                    <canvas id="ExpenseChart"></canvas>
                </div>

                {{-- Income Pie Chart --}}
                <div class="piechart-">
                    <h3>Income</h3>
                    <canvas id="IncomeChart"></canvas>
                </div>
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
        // let dynamicColors = function() {
        //     var r = Math.floor(Math.random() * 255);
        //     var g = Math.floor(Math.random() * 255);
        //     var b = Math.floor(Math.random() * 255);
        //     return "rgb(" + r + "," + g + "," + b + ")";
        // };

        // const ctx = document.getElementById('myChart');
        // const myChart = new Chart(ctx, {
        //     type: 'line',
        //     data: {
        //         labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        //         datasets: [{
        //                 label: 'Expense',
        //                 data: [12, 19, 3, 5, 2, 3, 69],
        //                 backgroundColor: "#de0a26",
        //                 borderColor: "#de0a26",
        //                 borderWidth: 3
        //             },
        //             {
        //                 label: 'Income',
        //                 data: [16, 14, 25, 7, 6, 1, 57],
        //                 backgroundColor: "#03ac13",
        //                 borderColor: "#03ac13",
        //                 borderWidth: 3
        //             }
        //         ]
        //     },
        //     responsive: true,
        //     maintainAspectRatio: false,
        //     options: {
        //         scales: {
        //             y: {
        //                 beginAtZero: true
        //             }
        //         }
        //     }
        // });

        // pie-Chart Expense
        let categoryData = {!! $categoryChartData !!}
        let labelExpenseChart = Object.keys(categoryData.expense);
        let dataExpenseChart = categoryData.expense

        let totalExpense = {};

        // console.log(dataExpenseChart)
        for (const [key, value] of Object.entries(dataExpenseChart)) {
            let sum = 0;
            for (const data of value) {
                sum += parseInt(data)
            }
            totalExpense = {
                ...totalExpense,
                [key]: sum
            }
        }

        console.log(totalExpense)
        // let labelIncomeChart = Object.keys(pieChartData.income);
        // let dataIncomeChart = Object.values(pieChartData.income)
        // console.log(pieChartData)
        // let options = {
        //     plugins: {
        //         tooltip: {
        //             enabled: true
        //         },
        //         datalabels: {
        //             formatter: (value, ctx) => {
        //                 let sum = 0;
        //                 let dataArr = ctx.chart.data.datasets[0].data;
        //                 dataArr.map(data => {
        //                     sum += data;
        //                 });
        //                 let percentage = (value * 100 / sum).toFixed(2) + "%";
        //                 return percentage;
        //             },
        //             color: '#fff',
        //         }
        //     }
        // }

        // const ctxExpense = document.getElementById('ExpenseChart').getContext('2d');
        // const expenseChartColor = Array.from({
        //     length: labelExpenseChart.length
        // }, () => dynamicColors())
        // const ExpenseChart = new Chart(ctxExpense, {
        //     type: 'pie',
        //     data: {
        //         labels: labelExpenseChart,
        //         datasets: [{
        //             data: dataExpenseChart,
        //             backgroundColor: expenseChartColor,
        //         }]
        //     },
        //     options,
        //     responsive: true,
        //     maintainAspectRatio: false,
        //     plugins: [ChartDataLabels]
        // });


        // // pie-Chart Income
        // const ctxIncome = document.getElementById('IncomeChart').getContext('2d');
        // const IncomeChart = new Chart(ctxIncome, {
        //     type: 'pie',
        //     data: {
        //         labels: labelIncomeChart,
        //         datasets: [{
        //             data: dataIncomeChart,
        //             backgroundColor: expenseChartColor,
        //         }]
        //     },
        //     options,
        //     responsive: true,
        //     maintainAspectRatio: false,
        //     plugins: [ChartDataLabels]
        // });
    </script>
@endsection
