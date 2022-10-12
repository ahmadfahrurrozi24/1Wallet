@extends('layout.template')
@section('content')
    <h1>Register</h1>
    <form action="" method="POST">
      @csrf
      <div>
        <label for="name">name</label>
        <input type="text" value="{{ old("name") }}" name="name" >
      </div>
      <div>
        <label for="email">email</label>
        <input type="email" value="{{ old("email") }}" name="email" >
      </div>
      <div>
        <label for="password">password</label>
        <input type="password" name="password" >
      </div>
      <div>
        <label for="balance">balance</label>
        <input type="number" value="{{ old("balance") }}" name="balance" >
      </div>

      <button type="submit">submit</button>
    </form>
@endsection