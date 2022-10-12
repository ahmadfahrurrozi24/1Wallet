@extends('layout.template')
@section('content')
    <h1>Login</h1>
    <form action="" method="POST" >
      @csrf
      <div>
        <label for="email">email</label>
        <input type="email" value="{{ old("name") }}" name="email" >
      </div>
      <div>
        <label for="password">password</label>
        <input type="password" value="{{ old("email") }}" name="password" >
      </div>
      <button type="submit">submit</button>
    </form>
@endsection