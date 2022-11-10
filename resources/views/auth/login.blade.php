@extends('layout.template')
@section('css')
    <link rel="stylesheet" href="{{ asset("css/signIn.css")}}">
@endsection

@section('content')
    <div class="container">
        <form action="" method="POST">
            @csrf
            <img src="{{ asset("img/logo1.png") }}" alt="" />
            <h1>Sign In</h1>
            <div class="user">
                <div class="email">
                    <i class='bx bx-envelope bx-flip-horizontal'></i>
                    <input type="email" placeholder="Email" value="{{ old("email") }}" name="email">
                </div>
                <div class="password">
                    <i class='bx bxs-key' ></i>
                    <div class="box-password">
                      <input type="password" id="password" placeholder="Password" name="password" value="{{ old("password") }}">
                      <i class='bx bx-hide'></i>
                    </div>
                </div>
            </div>
            <button type="submit">Sign In</button>
            <p>Not registered yet ? <a href="/register">Click here</a></p>
        </form>
    </div>
@endsection
@section('js')

    <script>
      const showPW = document.querySelector('.bx-hide');
      const password = document.getElementById('password');
      showPW.addEventListener('click', function(){
          if(showPW.className == 'bx bx-hide'){
              showPW.setAttribute('class', 'bx bx-show');
              password.type = "text";
          } else{
              showPW.setAttribute('class', 'bx bx-hide');
              password.type = "password";
          }
      });

      let style = {
        backgroundImage: `linear-gradient(to right,#d1001f,#1520A6`,
    
        color: "white",
        fontFamily : "Roboto",
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

    @if (session()->has('message'))
      <script>
        Toastify({
          text: "{{ session()->get('message') }}",
          style 
        }).showToast();
      </script>
    @endif
    
@endsection