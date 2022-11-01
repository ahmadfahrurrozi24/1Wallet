@extends('dashboard.layout.template')
@section('content')
    <div class="wrapper">
        <form action="" method="POST">
            @method("put")
            @csrf
            <input type="file" name="imgProfile" >
            <input type="text" name="name" value="{{ auth()->user()->name }}">
            <input type="email" name="email" value="{{ auth()->user()->email }}">
            <button type="submit">submit</button>
        </form>
    </div>
    
@endsection