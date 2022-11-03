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
    <div class="line-chart">
    <canvas id="myChart"></canvas>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js" integrity="sha512-Tfw6etYMUhL4RTki37niav99C6OHwMDB2iBT5S5piyHO+ltK2YX8Hjy9TXxhE1Gm/TmAV0uaykSpnHKFIAif/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- line-chart --}}
<script>

const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        datasets: [{
            label: 'Expense',
            data: [12, 19, 3, 5, 2, 3, 69],
            backgroundColor: "#de0a26",
            borderColor:"#de0a26",
            borderWidth: 3
        },
        {
            label: 'Income',
            data: [16, 14, 25, 7, 6, 1, 57],
            backgroundColor: "#03ac13",
            borderColor:"#03ac13",
            borderWidth: 3
        }]
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

// pie-Chart Expense
const ctxExpense = document.getElementById('ExpenseChart').getContext('2d');
const ExpenseChart = new Chart(ctxExpense, {
    type: 'pie',
    data: {
        labels: ['Water BIll', 'Food & Baverage', 'Transport'],
        datasets: [{
            label: '# of Votes',
            data: [35, 45, 20],
            color: "white",
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 1
        }]
    },
    responsive: true,
    maintainAspectRatio: false,
    plugins:[ChartDataLabels]
});


// pie-Chart Income
const ctxIncome = document.getElementById('IncomeChart').getContext('2d');
const IncomeChart = new Chart(ctxIncome, {
    type: 'pie',
    data: {
        labels: ['Water BIll', 'Food & Baverage', 'Transport'],
        datasets: [{
            label: '# of Votes',
            data: [45, 20, 35],
            color: "white",
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 1
        }]
    },
    responsive: true,
    maintainAspectRatio: false,
    plugins:[ChartDataLabels]
});

</script>
@endsection