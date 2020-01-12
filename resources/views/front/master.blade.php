<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'صفحه اصلی') - {{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('front/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
</head>
<body>
<header class="rtl">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('front.index') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('front.index') }}">صفحه اصلی <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">درباره ما</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">ارتباط ما</a>
                </li>
            </ul>
            <form class="form-inline flex-nowrap my-2 my-lg-0" action="/" method="get">
                <input class="form-control mr-sm-2" type="search" name="s" placeholder="جستجو ..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0 ml-md-0 ml-2" type="submit">جستجو</button>
            </form>
        </div>
    </nav>
</header>

@yield('content')


<footer class="bg-dark text-white text-center p-3 o-font-xs position-fixed w-100">
    <p class="mb-0">.تمامی حقوق مادی و معنوی این وبسایت به <a href="{{ route('front.index') }}">{{ config('app.name') }}</a> تعلق دارد</p>
</footer>


<script src="{{ asset('front/js/jquery.min.js') }}"></script>
<script src="{{ asset('front/js/popper.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
</body>
</html>
