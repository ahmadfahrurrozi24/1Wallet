<head>
    {{-- <meta charset="UTF-8"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">
    <title>LandingPage</title>
</head>

<body>

    <div class="header">

        {{-- Title & Logo --}}
        <div class="Title">
            <img class="logo" src="{{ asset('img/logo.png') }}" />
            <h2>1Wallet</h2>
        </div>
        @auth
            <div class="user-information">
                <div class="user-image" style="background-image:url(@avatar(auth()->user()->profile_image))">
                </div>
                <h2>{{ auth()->user()->name }}</h2>
            </div>
        @endauth
    </div>
    {{-- Content --}}
    <div class="content">
        {{-- slogan --}}
        <div class="slogan">
            <h1>Simple way to manage money for</h1>
            <h1>Everyone anywhere and anytime</h1>
        </div>

        {{-- Button --}}
        <div class="button-wrapper">
            @if (auth()->guest())
                <a class="button-link button-33" href="/register">Get
                    Started</a>
                <a class="button-link button-33" href="/login">Login Now</a>
            @else
                <a class="button-link button-33" href="/dashboard">Go to
                    Dashboard</a>
                <a class="button-link button-33" href="/dashboard">Logout</a>
                {{-- <button class="button-33" role="button"> </button> --}}
            @endif
        </div>

        <div class="Content-About">

            {{-- Img Transaction --}}
            <div class="Content-Transaction">
                <img class="img-transaction" src="{{ asset('img/transaction.jpg') }}">
                <div class="img-slogan">
                    <h1>Easy way to</h1>
                    <h1>Add transaction</h1>
                </div>
            </div>

            {{-- img History --}}
            <div class="Content-History">
                <img class="img-History" src="{{ asset('img/history.jpg') }}">
                <div class="img-slogan">
                    <h1>Easy way to check</h1>
                    <h1>Financial statement</h1>
                </div>
            </div>

            {{-- Img Insight --}}
            <div class="Content-Insight">
                <img class="img-Insight" src="{{ asset('img/dashboard.jpg') }}">
                <div class="img-slogan">
                    <h1>Easy way to check</h1>
                    <h1>Income and expense</h1>
                </div>
            </div>
        </div>
    </div>

</body>
