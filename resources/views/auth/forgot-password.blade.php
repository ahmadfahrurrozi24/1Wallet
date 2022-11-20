@extends('layout.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/signIn.css') }}">
    <style>
        form {
            display: flex;
            flex-direction: column;
            gap: 40px
        }

        .user {
            height: 0;
        }

        p {
            margin-top: -20px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <form action="" method="POST">
            @csrf
            <img src="{{ asset('img/logo1.png') }}" alt="" />
            <h1>Forgot Password</h1>
            <p>We will send you a link to reset your password.</p>
            <div class="user">
                <div class="email">
                    <i class='bx bx-envelope bx-flip-horizontal'></i>
                    <input type="email" placeholder="Email" value="{{ old('email') }}" name="email">
                </div>
            </div>
            <button type="submit">Submit</button>
            <p><a href="/login">Back To Login</a></p>
        </form>
    </div>
@endsection
@section('js')
    <script>
        let style = {
            background: "#fa3f32",
            color: "white",
            fontFamily: "Roboto",
            borderRadius: "10px"
        }
    </script>

    @error('email')
        <script>
            Toastify({
                text: "{{ $message }}",
                style
            }).showToast();
        </script>
    @enderror

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
