@extends('layout.template')
@section('css')
    <link rel="stylesheet" href="{{ asset("css/signIn.css")}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
@endsection

@section('content')
    <!-- <h1>Login</h1>
    @if (session()->has('message'))
        <h2>{{ session()->get('message') }}</h2>
    @endif
    <form action="" method="POST" >
      @csrf
      <div>
        <label for="email">email</label>
        <input type="email" value="{{ old("name") }}" name="email" >
        @error('email')
          <p>{{ $message }}</p>
        @enderror
      </div>
      <div>
        <label for="password">password</label>
        <input type="password" value="{{ old("email") }}" name="password" >
        @error('password')
          <p>{{ $message }}</p>
        @enderror
      </div>
      <button type="submit">submit</button>
    </form> -->
    <div class="container">
        <form action="" method="POST">
            {{-- <img src="p.png" alt="logo"> --}}
            @csrf
            <img src="{{ asset("img/logo1.png") }}" alt="" />
            <h1>Sign In</h1>
            <div class="user">
                <div class="email">
                    <i class='bx bx-envelope bx-flip-horizontal'></i>
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="password">
                    <i class='bx bxs-key' ></i>
                    <input type="password" id="password" placeholder="Password" name="password">
                    <i class='bx bx-hide'></i>
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
    </script>
    
@endsection