@extends('dashboard.layout.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
    <div class="wrapper">
        <form action="" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="user-profile">
                <div class="box-image">
                    <div class="user-image" style="background-image:url(@avatar(auth()->user()->profile_image))">
                    </div>
                    <label for="file-profile" class="image-edit"><i class='bx bxs-camera'></i></label>
                    <input type="file" name="imgProfile" id="file-profile">
                </div>
                <div class="user-detail">
                    <label for="Name">Name</label>
                    <div class="user-name">
                        <input type="text" name="name" value="{{ auth()->user()->name }}">
                        <i class='bx bx-pencil'></i>
                    </div>
                    <label for="Email">Email</label>
                    <input type="disable" name="email" placeholder="{{ auth()->user()->email }}" disabled>
                    <label for="password">Password</label>
                    <div class="password">
                        <input type="password" name="password" value="password" disabled>
                        {{-- <a href=""><i class='bx bx-edit'></i></a> --}}
                        <a href="">Change password</a>
                    </div>
                    <div class="submit">
                        <button type="submit">save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script>
        const boxName = document.querySelector('.user-name');
        const name = document.querySelector('.user-name input');
        const imgInp = document.getElementById("file-profile")
        const imgPrev = document.querySelector(".user-image")

        boxName.addEventListener('click', function() {
            name.select();
        });

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                imgPrev.style.backgroundImage = `url(${URL.createObjectURL(file)})`
            }
        }
    </script>
@endsection
