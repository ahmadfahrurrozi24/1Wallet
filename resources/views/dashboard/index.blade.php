@extends('dashboard.layout.template')
@section('content')
    <h1>Index Dashboard</h1>
    <h2>My balance : @currency(auth()->user()->balance) </h2>
@endsection