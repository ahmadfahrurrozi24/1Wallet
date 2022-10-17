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
  <link rel="stylesheet" href="{{ asset("css/style.css") }}">
  <link rel="stylesheet" href="{{ asset("css/sidebar.css") }}">
</head>
<body>
  @include('dashboard.layout.sidebar')
  <div class="dashboard-content">
    @include('dashboard.layout.header')
    @yield('content')
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
    
    let btn = document.querySelectorAll(".hamburger-button");
        let sidebar = document.querySelector(".sidebar");

        btn.forEach(element => {
            element.onclick = function () {
                sidebar.classList.toggle("active");
            };
        });

  </script>
  @yield('js')
</body>
</html>