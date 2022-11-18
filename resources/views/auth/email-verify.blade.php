@extends('layout.template')
@section('css')
<style>
    @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap");
    *{
        margin: 0;
        padding: 0;
    }

    .container{
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 5px;
        background-image: linear-gradient(90deg, rgb(6, 8, 51), rgb(17, 19, 83));
        font-family: "Roboto", sans-serif;
        color: white;
    }
    img{
        width: 200px;
        height: 200px;
    }
    p{
        font-size: 21px;
    }
    a{
        width: 300px;
        height: 50px;
        border-radius: 10px;
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 19px;
        text-decoration: none;
        color: white;
        background-color: rgb(41, 126, 41);
    }
    a:hover{
        background-color: rgb(34, 102, 34);
    }
</style>
@endsection

@section('content')
<div class="container">
    <img src="{{ asset('img/caution.png') }}">
    <h1>Please verify your email</h1>
    <p>not received email yet?</p>
    <a href="">Send email verification again</a>
</div>
@endsection