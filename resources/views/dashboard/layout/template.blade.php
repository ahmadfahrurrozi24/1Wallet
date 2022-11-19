<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @yield('css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

</head>

<body>
    @include('dashboard.layout.sidebar')
    <div class="dashboard-content">
        @include('dashboard.layout.header')
        @yield('content')
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    {{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> --}}
    <script src="{{ asset('js/index.js') }}"></script>
    @if (session()->has('message'))
        <script>
            Toastify({
                text: "{{ session()->get('message') }}",
                style: {
                    background: "#40db5a",
                    color: "white",
                    fontFamily: "Roboto",
                    borderRadius: "10px"
                },
                gravity: "top",
                position: "right"
            }).showToast();
        </script>
    @endif
    @yield('js')
</body>

</html>
