@extends('dashboard.layout.template')
@section('content')
    <h1>Index Dashboard</h1>
    <h2>My balance : @currency(auth()->user()->balance) </h2>
    <h2>My expense this week : @currency($recordTotal["totalExpenseWeek"])</h2>
    <h2>My income this week : @currency($recordTotal["totalIncomeWeek"])</h2>
    <h2>My expense this month : @currency($recordTotal["totalExpenseMonth"])</h2>
    <h2>My income this month : @currency($recordTotal["totalIncomeMonth"])</h2>
@endsection