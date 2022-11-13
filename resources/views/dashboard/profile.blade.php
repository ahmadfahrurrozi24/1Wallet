@extends('dashboard.layout.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
    <div class="wrapper">
        <form action="" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="profile-nav">
                <button class="nav-info" type="button">Profile info</button>
                <button class="nav-change" type="button">Change password</button>
                <span class="nav-select"></span>
            </div>
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
                    </div>
                    <div class="submit">
                        <button type="submit">save</button>
                    </div>
                </div>
            </div>
            <div class="change-password">
                {{-- <label for="currentPassword">Current password :</label> --}}
                <div class="box-password">
                    <input type="password" class="passwords" placeholder="Current password" name="currentPassword">
                    <i class='bx bx-hide'></i>
                </div>
                {{-- <label for="newPassword">New password :</label> --}}
                <div class="box-password">
                    <input type="password" class="passwords" placeholder="New password" name="newPassword">
                    <i class='bx bx-hide'></i>
                </div>
                {{-- <label for="confirm">Confirm password :</label> --}}
                <div class="box-password">
                  <input type="password" class="passwords" placeholder="Confirm password" name="confirm">
                  <i class='bx bx-hide'></i>
                </div>
                <div class="submit">
                  <span id="notice"></span>
                  <button type="button" class="save">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script>
        const nav = document.querySelector('.profile-nav');
        const info = document.querySelector('.nav-info');
        const change = document.querySelector('.nav-change');
        const select = document.querySelector('.nav-select');

        const profileInfo = document.querySelector('.user-profile');
        const boxName = document.querySelector('.user-name');
        const imgInp = document.getElementById("file-profile")
        const imgPrev = document.querySelector(".user-image")
        const name = document.querySelector('.user-name input');

        const changePassword = document.querySelector('.change-password');
        const password = document.querySelectorAll('.passwords');
        const same = document.querySelector('#notice');
        const save = document.querySelector('.save');

        boxName.addEventListener('click', function() {
            name.select();
        });

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                imgPrev.style.backgroundImage = `url(${URL.createObjectURL(file)})`
            }
        }


        nav.addEventListener('click', function(e){
            if(e.target.className == 'nav-change'){
                e.target.nextElementSibling.style.marginLeft = '150px';
                profileInfo.style.display = 'none';
                changePassword.style.display = 'flex';
            } else if(e.target.className == 'nav-info'){
                e.target.nextElementSibling.nextElementSibling.style.marginLeft = '0px';
                profileInfo.style.display = 'flex';
                changePassword.style.display = 'none';
            }
        });


        changePassword.addEventListener('click', function(i){
            if(i.target.className == 'bx bx-hide'){
                i.target.previousElementSibling.type = 'text';
                i.target.setAttribute('class', 'bx bx-show');
            } else if(i.target.className == 'bx bx-show'){
                i.target.previousElementSibling.type = 'password';
                i.target.setAttribute('class', 'bx bx-hide');
            }
        });

        
        save.addEventListener('click', function(){
            if(password[1].value != password[2].value){
                same.innerHTML = 'Password and Confirm password do not match';
            } else{
                same.innerHTML = '';
            }
        });

    </script>
@endsection
