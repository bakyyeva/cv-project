<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Mukta:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front/assets/vendors/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/assets/css/live-resume.css') }}">
    @yield('css')
</head>

<body>
@include('layouts.front.header')
<div class="content-wrapper">
    @include('layouts.front.sidebar')
    <main>
        @yield('content')
        <footer>Live Resume @ <a href="https://www.bootstrapdash.com" target="_blank" rel="noopener noreferrer">BootstrapDash</a>. All Rights Reserved 2020</footer>
    </main>
</div>
<script src="{{ asset('assets/front/assets/vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/front/assets/vendors/@popperjs/core/dist/umd/popper-base.min.js') }}"></script>
<script src="{{ asset('assets/front/assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/front/assets/js/live-resume.js') }}"></script>
@yield('js')
</body>
</html>
