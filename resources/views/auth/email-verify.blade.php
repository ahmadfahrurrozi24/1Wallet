@extends('layout.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/email-verify.css') }}">
@endsection

@section('content')
    <div class="container">
        <img src="{{ asset('img/caution.png') }}">
        <h1>Please verify your email</h1>
        <p>not received email yet?</p>
        <form action="{{ route('verification.send') }}" method="POST">
            @csrf
            <button type="submit">Send email verification again</button>
        </form>
    </div>
@endsection
@section('js')
    @if (session()->has('message'))
        <script>
            Toastify({
                text: "{{ session()->get('message') }}",
                style: {
                    background: "#40db5a",
                    color: "white",
                    fontFamily: "Roboto",
                    borderRadius: "10px",
                }
            }).showToast();
        </script>
    @endif
@endsection
