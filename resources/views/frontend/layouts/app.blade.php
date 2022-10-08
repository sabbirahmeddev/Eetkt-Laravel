<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- favicon img -->
    <link rel="shortcut icon" href="img/favicon/Tab-Icon 1.png" type="image/x-icon">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <!-- Remix Icon Css -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- fontawsom css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- wow css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/animate.css')}}">
    <!-- Customm CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">

    <title>Tour & Travels</title>
</head>

<body>

    @include('frontend.layouts.navbar')
    @yield('content')
    @include('frontend.layouts.footer')

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js')}}" alt=""></script>
    <!-- Swiper js -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js')}}" alt=""></script>
    <!-- wow js -->
    <script src="{{asset('assets/frontend/js/wow.min.js')}}" alt=""></script>
    <!-- custom js -->
    <script src="{{asset('assets/frontend/js/main.js')}}" alt=""></script>

</body>

</html>
