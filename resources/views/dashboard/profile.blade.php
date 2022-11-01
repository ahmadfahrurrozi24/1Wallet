@extends('dashboard.layout.template')
@section('content')
    <div class="wrapper">
        <img src="{{ auth()->user()->profile_image ? '/imgprofile/' . auth()->user()->profile_image : asset('img/user-placeholder.jpg') }}"
            width="200" alt="">
        <form action="" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <input type="file" name="imgProfile">
            <input type="text" name="name" value="{{ auth()->user()->name }}">
            <input type="email" name="email" value="{{ auth()->user()->email }}">
            <button type="submit">submit</button>
        </form>
    </div>
@endsection
