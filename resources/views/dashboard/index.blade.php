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
                <h1>{{ Helper::balanceFormat(auth()->user()->current_balance) }}</h1>
            </div>
        </div>
    
        <!-- Money Expense -->
        <div class="expense box-dashboard">
            <div class="box-head">
                <p>My Expense</p>
                <h3>This Month</h3>
            </div>
            <div class="box-balance">
                <h1>{{ Helper::amountFormat($recordTotal["totalExpenseMonth"]) }}</h1>
            </div>
        </div>
    
        <!-- Money Income -->
        <div class="income box-dashboard">
            <div class="box-head">
                <p>My Income</p>
                <h3>This Month</h3>
            </div>
            <div class="box-balance">
                <h1>{{ Helper::amountFormat($recordTotal["totalIncomeMonth"]) }}</h1>
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
    <script>
        let btn = document.querySelectorAll(".hamburger-button");
        let sidebar = document.querySelector(".sidebar");

        btn.forEach(element => {
            element.onclick = function () {
                sidebar.classList.toggle("active");
            };
        });


    </script>
@endsection