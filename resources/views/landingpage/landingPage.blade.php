<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">

<body>
    <div class="header">

        {{-- Title & Logo --}}
        <div class="Title">
            <img class="logo" src="{{ asset('img/logo.png') }}" />
            <h2>1Wallet</h2>

            {{-- Navbar --}}
            {{-- <div class="navbar">
            <ul>
                <li><a class="login" href="/login">Sign In</a></li>
                <li><a href="/register">Sign Up</a></li>
                <li><a href="#about">About Us</a></li>
              </ul>
        </div> --}}
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
        <div class="slogan" data-aos="fade-up" data-aos-duration="1000">
            <h1>Simple way to manage money for</h1>
            <h1>Everyone anywhere and anytime</h1>
        </div>

        {{-- Button --}}
        <div class="button-wrapper">
            @if (auth()->guest())
                <button class="button-33" role="button"><a class="button-link" href="/register">Get
                        Started</a></button>
                <button class="button-33" role="button"> <a class="button-link" href="/login">Login Now</a></button>
            @else
                <button class="button-33" role="button"> <a class="button-link" href="/dashboard">Go to
                        Dashboard</a></button>
            @endif
        </div>

        {{-- Img Transaction --}}
        <div class="Content-Transaction" data-aos="fade-right" data-aos-duration="1000">
            <img class="img-transaction" src="{{ asset('img/transaction.png') }}">
            <div class="img-slogan">
                <h1>Easy way to</h1>
                <h1>Add transaction</h1>
            </div>
        </div>

        {{-- img History --}}
        <div class="Content-History" data-aos="fade-left" data-aos-duration="1000">
            <div class="img-slogan">
                <h1>Easy way to check</h1>
                <h1>Financial statement</h1>
            </div>
            <img class="img-History" src="{{ asset('img/history.png') }}">
        </div>
    </div>

    {{-- Img Insight --}}
    <div class="Content-Insight" data-aos="fade-right" data-aos-duration="1000">
        <img class="img-Insight" src="{{ asset('img/insight.jpg') }}">
        <div class="img-slogan">
            <h1>Easy way to check</h1>
            <h1>Income and expense</h1>
        </div>
    </div>


    {{-- JS AOS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>
</body>
