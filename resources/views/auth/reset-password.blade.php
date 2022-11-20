@extends('layout.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/signIn.css') }}">
    <style>
        form {
            display: flex;
            flex-direction: column;
            gap: 20px
        }

        /* .user {
                    height: 0;
                } */
    </style>
@endsection

@section('content')
    <div class="container">
        <form action="/reset-password" method="POST">
            @csrf
            @method('post')
            <input type="hidden" name="token" value="{{ $token }}">
            <img src="{{ asset('img/logo1.png') }}" alt="" />
            <h1>Reset Password</h1>
            <div class="user">
                <div class="email">
                    <i class='bx bx-envelope bx-flip-horizontal'></i>
                    <input type="email" placeholder="Email" value="{{ old('email') }}" name="email">
                </div>
                <div class="password">
                    <i class='bx bxs-key'></i>
                    <div class="box-password">
                        <input type="password" id="password" class="password-input" placeholder="Password" name="password"
                            value="{{ old('password') }}">
                        <i class='bx bx-hide'></i>
                    </div>
                </div>
                <div class="password">
                    <i class='bx bxs-key'></i>
                    <div class="box-password">
                        <input type="password" id="confirmPassword" class="password-input" placeholder="Confirm Password"
                            name="password_confirmation" value="{{ old('password_confirmation') }}">
                        <i class='bx bx-hide'></i>
                    </div>
                </div>
            </div>
            <button type="submit">Submit Changes</button>
        </form>
    </div>
@endsection
@section('js')
    <script>
        const passwordInputs = document.querySelectorAll(".password-input");

        passwordInputs.forEach((elm) => {
            const showPW = elm.nextElementSibling;

            showPW.addEventListener("click", function() {
                if (showPW.className == "bx bx-hide") {
                    showPW.setAttribute("class", "bx bx-show");
                    elm.type = "text";
                } else {
                    showPW.setAttribute("class", "bx bx-hide");
                    elm.type = "password";
                }
            });
        });

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

    @error('password_confirmation')
        <script>
            Toastify({
                text: "{{ $message }}",
                style
            }).showToast();
        </script>
    @enderror

    @error('password')
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
