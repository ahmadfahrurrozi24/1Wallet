@extends('dashboard.layout.template')
@section('css')
<style>
    /* body{ */
        /* background-image: linear-gradient(90deg, rgb(6, 8, 51), rgb(17, 19, 83)); */
        /* background-color: black; */
    /* } */
    .user-profile{
        width: 35%;
        margin: auto;
        /* height: 100%; */
        background-color: white;
        padding: 40px;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        gap: 40px;
        border-radius: 12px;
        border: 3px solid #c4c4c4;
        font-family: "Roboto", sans-serif;
        
    }
    .user-image{
        width: 130px;
        height: 130px;
        margin: auto;
        /* background-color: green; */
        border: 2px solid #c4c4c4;
        border-radius: 50%;
    }
    .user-detail{
        width: 100%;
        /* height: 150px; */
        /* background-color: darkgreen; */
        display: flex;
        flex-direction: column;
        gap: 10px;
        /* justify-content: space-evenly; */
        /* align-items: center; */
    }
    .user-detail input{
        width: 100%;
        box-sizing: border-box;
        border-radius: 10px;
        border: 2px solid #c4c4c4;
        height: 40px;
        padding: 10px;
        box-sizing: border-box;
    }
    .user-detail input:disabled{
        background-color: #ece9e9;
        cursor:no-drop;
    }
    .user-detail .password{
        width: 100%;
        /* background-color: darkgreen; */
        display: flex;
    }
    .user-detail .password input{
        border-radius: 10px 0 0 10px;
    }
    .user-detail a{
        width: 55px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        /* background-color: darkslategray; */
        background-color: rgb(21, 23, 99);
        /* background: rgb(81, 12, 219); */
        color: white;
        text-decoration: none;
        border-radius: 0 10px 10px 0;
        font-size: 27px;
    }
    .user-profile .submit{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        /* background-color: aquamarine; */
    }
    .submit button{
        width: 50%;
        height: 50px;
        border-radius: 7px;
        border: none;     
        /* margin: auto; */
        /* background: rgb(81, 12, 219); */
        background: rgb(21, 23, 99);
        color: white;
        cursor: pointer;
        font-size: 17px;
        font-family: sans-serif;
    }
    /* .submit button:hover{ */
        /* background-color: rgb(44, 19, 95); */
    /* } */
</style>
@endsection
@section('content')
    <div class="wrapper">
        <div class="user-profile">
            <div class="user-image"></div>
            <div class="user-detail">    
                <label for="Name">Name :</label>
                <input type="text" name="Name" value="Diandra Rifqi">
                <label for="Email">Email :</label>
                <input type="disable" name="Email" placeholder="Diandra@gmail.com" disabled>
                <label for="password">Password :</label>
                <div class="password">
                    <input type="password" name="password" value="password" disabled>
                    <a href=""><i class='bx bx-edit'></i></a>
                </div>
            </div>
            <div class="submit">
                <button type="submit">save</button>
            </div>
        </div>
        {{-- <img src="{{ auth()->user()->profile_image ? '/imgprofile/' . auth()->user()->profile_image : asset('img/user-placeholder.jpg') }}"
            width="200" alt="">
        <form action="" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <input type="file" name="imgProfile">
            <input type="text" name="name" value="{{ auth()->user()->name }}">
            <input type="email" name="email" value="{{ auth()->user()->email }}">
            <button type="submit">submit</button>
        </form> --}}
    </div>
@endsection
