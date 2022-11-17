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
                <button class="nav-info nav-button dipilih" data-nav="info" type="button">Profile info</button>
                <button class="nav-change nav-button " data-nav="change" type="button">Change password</button>
                <span class="nav-select"></span>
            </div>
            <div class="user-profile active">
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
        </form>
        <form action="/dashboard/profile/changepassword" method="POST">
            @csrf
            <div class="change-password">
                {{-- <label for="currentPassword">Current password :</label> --}}
                <div class="box">
                    <div class="box-password">
                        <input type="password" class="passwords" placeholder="Current password" name="current-password">
                        <i class='bx bx-hide'></i>
                    </div>
                    @error('current-password')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                {{-- <label for="newPassword">New password :</label> --}}
                <div class="box">
                    <div class="box-password">
                        <input type="password" class="passwords" placeholder="New password" name="password">
                        <i class='bx bx-hide'></i>
                    </div>
                    @error('password')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                {{-- <label for="confirm">Confirm password :</label> --}}
                <div class="box">
                    <div class="box-password">
                        <input type="password" class="passwords" placeholder="Confirm password" name="confirm-password">
                        <i class='bx bx-hide'></i>
                    </div>
                    @error('confirm-password')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="submit">
                    <button type="submit" class="save">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script>
        const navButton = document.querySelectorAll(".nav-button")
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
        navButton.forEach(elm => {
            elm.addEventListener("click" , e => {
                navButton.forEach(el => el.classList.remove("dipilih"))
                e.target.classList.add("dipilih")

                changeDisplay()
            })
        })

        changeDisplay()

        function changeDisplay(){
            navButton.forEach(elm => {
                if(elm.classList.contains("dipilih")){
                    let selected = elm.dataset.nav
                    if(selected == "info"){
                        profileInfo.classList.add("active")
                        changePassword.classList.remove("active")
                    }else if(selected == "change"){
                        changePassword.classList.add("active")
                        profileInfo.classList.remove("active")
                    }
                }
            })
        }
        
        changePassword.addEventListener('click', function(i) {
            if (i.target.className == 'bx bx-hide') {
                i.target.previousElementSibling.type = 'text';
                i.target.setAttribute('class', 'bx bx-show');
            } else if (i.target.className == 'bx bx-show') {
                i.target.previousElementSibling.type = 'password';
                i.target.setAttribute('class', 'bx bx-hide');
            }
        });

    </script>

    @error('current-password')
    <script>
        info.classList.remove("dipilih")
        change.classList.add("dipilih")
        changeDisplay()
    </script>
    @enderror
    @error('password')
    <script>
        info.classList.remove("dipilih")
        change.classList.add("dipilih")
        changeDisplay()
    </script>
    @enderror
    @error('confirm-password')
    <script>
        info.classList.remove("dipilih")
        change.classList.add("dipilih")
        changeDisplay()
    </script>
    @enderror
@endsection
