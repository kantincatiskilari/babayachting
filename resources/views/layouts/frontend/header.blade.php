<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">


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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <div class="navbar-brand">
                <a href="/">BABAYACHTING</a>
            </div>

            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav d-flex gap-3">
                    @foreach ($pages as $page)
                        <li class="nav-item">
                            <a class="nav-link" href="{{$page->page_seo_title}}">{{ myStrToUpper($page->page_title) }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </nav>
