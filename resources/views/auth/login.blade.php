@extends('layout.template')
@section('content')
    {{-- <h1>Login</h1>
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
    </form> --}}
    
@endsection