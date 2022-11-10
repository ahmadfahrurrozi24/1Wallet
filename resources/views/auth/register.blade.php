@extends('layout.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/signUp.css') }}">
@endsection
@section('content')
    <div class="container">
        <form action="" method="POST">
            @csrf
            <h1>Sign Up</h1>
            <div class="user">
                <div class="username">
                    <i class='bx bx-user'></i>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Username">
                </div>
                <div class="email">
                    <i class='bx bx-envelope bx-flip-horizontal'></i>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
                <div class="password">
                    <i class='bx bxs-key'></i>
                    <div class="box-password">
                        <input type="password" id="password" value="{{ old('password') }}" name="password"
                        placeholder="Password">
                        <i class='bx bx-hide'></i>
                    </div>
                </div>
                <div class="balance">
                    <i class='bx bx-wallet bx-flip-horizontal'></i>
                    <input type="text" id="balance" value="{{ old('balance', 0) }}" name="balance"
                        placeholder="Balance" autocomplete="off">
                </div>
                <div class="check">
                    <input type="checkbox" name="agreement">
                    <p>I Accept All Requirements</p>
                </div>
            </div>
            <button type="submit">Create Account</button>
            <div class="question">
                <p>Already have an account ? <a href="/login" class="click">Click Here!</a></p>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.6.0/autoNumeric.min.js"
        integrity="sha512-6j+LxzZ7EO1Kr7H5yfJ8VYCVZufCBMNFhSMMzb2JRhlwQ/Ri7Zv8VfJ7YI//cg9H5uXT2lQpb14YMvqUAdGlcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const showPW = document.querySelector('.bx-hide');
        const password = document.getElementById('password');
        showPW.addEventListener('click', function() {
            if (showPW.className == 'bx bx-hide') {
                showPW.setAttribute('class', 'bx bx-show');
                password.type = "text";
            } else {
                showPW.setAttribute('class', 'bx bx-hide');
                password.type = "password";
            }
        });

        new AutoNumeric('#balance', {
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            maximumValue: '1000000000',
            minimumValue: 0
        });

        let style = {
            background: "red",
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

    @error('password')
        <script>
            Toastify({
                text: "{{ $message }}",
                style
            }).showToast();
        </script>
    @enderror

    @error('name')
        <script>
            Toastify({
                text: "{{ $message }}",
                style
            }).showToast();
        </script>
    @enderror

    @error('balance')
        <script>
            Toastify({
                text: "{{ $message }}",
                style
            }).showToast();
        </script>
    @enderror

    @error('agreement')
        <script>
            Toastify({
                text: "{{ $message }}",
                style
            }).showToast();
        </script>
    @enderror
@endsection
