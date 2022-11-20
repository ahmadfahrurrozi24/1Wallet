@extends('layout.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/email-success.css') }}">
@endsection

@section('content')
    <div class="container">
        <iframe src="https://giphy.com/embed/QJ4Hm8oJgMJIqFAuVc" width="200" height="200" frameBorder="0"
            class="giphy-embed" allowFullScreen></iframe>

        <h1>Email successfully verified</h1>
        <a href="/dashboard">Go to dashboard</a>
    </div>
@endsection
@section('js')
@endsection
