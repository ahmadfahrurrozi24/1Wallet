@extends('layout.template')
@section('content')
    <h1>Register</h1>
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
        <input type="number" value="{{ old("balance") }}" name="balance" >
        @error('balance')
          <p>{{ $message }}</p>
        @enderror
      </div>

      <button type="submit">submit</button>
    </form>
@endsection