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
        text-align: center;
        background-image: linear-gradient(90deg, rgb(6, 8, 51), rgb(17, 19, 83));
        font-family: "Roboto", sans-serif;
        color: white;
    }
    h1{
        letter-spacing: 0.5px;
    }
    a{
        width: 200px;
        height: 50px;
        margin: 30px auto;
        border-radius: 10px;
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
    <iframe src="https://giphy.com/embed/QJ4Hm8oJgMJIqFAuVc" width="200" height="200" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
    
    <h1>Email successfully verified</h1>
    <a href="/dashboard">Go to dashboard</a>
</div>
@endsection
@section('js')
@endsection