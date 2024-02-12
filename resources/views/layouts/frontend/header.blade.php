<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ isset($seo_text) ? $seo_text->meta_description : '' }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('images/website-images/' . $settingsData['favicon']) }}">
    <!-- Bootstrap -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" />
    <!-- Responsive -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <!-- Contact -->
    <link rel="stylesheet" href="{{ asset('frontend/css/contact.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('toastr/toastr.css') }}">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick.css')}}" />
    <link rel="stylesheet" type="text/css"
        href="{{asset('slick/slick-theme.css')}}" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&family=Roboto&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">


</head>

<body>
    @php
        function myStrToUpper($str)
        {
            $search = ['ı', 'i', 'ğ', 'ü', 'ş', 'ö', 'ç'];
            $replace = ['I', 'İ', 'Ğ', 'Ü', 'Ş', 'Ö', 'Ç'];

            return str_replace($search, $replace, strtoupper($str));
        }

    @endphp
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container navbar-container">
            <div class="navbar-brand">
                <a href="/">
                    @if ($settingsData['header_logo'])
                        <img src="{{ asset('images/website-images/' . $settingsData['header_logo']) }}" alt="Logo">
                    @else
                        BABAYACHTING
                    @endif
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>



            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MENU</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body justify-content-end">
                    <ul class="navbar-nav">
                        @foreach ($pages as $page)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs($page->page_seo_title) ? 'active' : '' }}"
                                    href="/{{ $page->page_seo_title }}">{{ myStrToUpper($page->page_title) }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

    </nav>
