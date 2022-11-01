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
    <canvas class="line-chart" id="myChart" width="300" height="100"></canvas>

    <canvas id="pieChart" width="200" height="50"></canvas>
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
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// pie-Chart
const ctxpie = document.getElementById('pieChart').getContext('2d');
const pieChart = new Chart(ctxpie, {
    type: 'pie',
    data: {
        labels: ['Water BIll', 'Food & Baverage', 'Transport'],
        datasets: [{
            label: '# of Votes',
            data: [35, 45, 20],
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
    options: {
        scales: {
        } 
    },
    plugins:[ChartDataLabels]
});

</script>
@endsection