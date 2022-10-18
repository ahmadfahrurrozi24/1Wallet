@extends('layout.template')
@section('css')
  <link rel="stylesheet" href="{{ asset("css/signUp.css") }}">  
@endsection
@section('content')
    {{-- <h1>Register</h1>
    <form action="" method="POST">
      @csrf
      <div>
        <label for="name">name</label>
        <input type="text" value="{{ old("name") }}" name="name" >
        @error('name')
            <p>{{ $message }}</p>
        @enderror
      </div>
      <div>
        <label for="email">email</label>
        <input type="email" value="{{ old("email") }}" name="email" >
        @error('email')
          <p>{{ $message }}</p>
        @enderror 
      </div>
      <div>
        <label for="password">password</label>
        <input type="password" name="password" >
        @error('password')
          <p>{{ $message }}</p>
        @enderror
      </div>
      <div>
        <label for="balance">balance</label>
        <input type="text" autocomplete="off" value="{{ old("balance") }}" id="balance" name="balance" >
        @error('balance')
          <p>{{ $message }}</p>
        @enderror
      </div>

      <button type="submit">submit</button>
    </form>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.6.0/autoNumeric.min.js" integrity="sha512-6j+LxzZ7EO1Kr7H5yfJ8VYCVZufCBMNFhSMMzb2JRhlwQ/Ri7Zv8VfJ7YI//cg9H5uXT2lQpb14YMvqUAdGlcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  new AutoNumeric('#balance' , {
    digitGroupSeparator : '.',
    decimalCharacter    : ',',
  });
</script> --}}

<div class="container">
  <form action="">
      <h1>Sign Up</h1>
      <div class="user">
          <div class="username">
              <i class='bx bx-user'></i>
              <input type="text" placeholder="Username">
          </div>
          <div class="email">
              <i class='bx bx-envelope bx-flip-horizontal'></i>
              <input type="email" placeholder="Email">
          </div>
          <div class="password">
              <i class='bx bxs-key' ></i>
              <input type="password" id="password" placeholder="Password">
              <i class='bx bx-hide'></i>
          </div>
          <div class="balance">
              <i class='bx bx-wallet bx-flip-horizontal'></i>
              <input type="text" placeholder="Balance">
          </div>
          <div class="check">
              <input type="checkbox">
              <p>I Agree</p>
          </div>
      </div>
      <button type="submit">Create Account</button>
      <div class="question">
        <p>Already have an account ? <a href="/login" class="click">Click Here!</a></p>
      </div>
  </form>
</div>
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

@endsection