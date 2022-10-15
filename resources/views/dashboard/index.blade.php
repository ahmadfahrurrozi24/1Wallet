@extends('dashboard.layout.template')
@section('content')
    <h1>Index Dashboard</h1>
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
    </div>
@endsection