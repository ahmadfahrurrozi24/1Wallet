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
</script>

@endsection