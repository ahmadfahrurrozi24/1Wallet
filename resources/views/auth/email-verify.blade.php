@extends('layout.template')
@section('content')
    <h1>Please Verify your email</h1>
    <p>if you haven't got any email verification on ur inbox</p>
    @if (session()->has('message'))
        <p>{{ session()->get('message') }}</p>
    @endif
    <form action="/email/verification-notification" method="POST">
        @csrf
        <button type="submit">Sent Email Verification</button>
    </form>
@endsection
