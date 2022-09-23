<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $page->page_title }}</title>
    <meta name="description" content="{{ $page->page_description }}">
    <meta name="keywords" content="{{ $page->page_keyword }}">
    <link rel="stylesheet" href="{{ asset('css/website.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
</head>
<body class="bg-white">
<x-web-header :cPage="$page"></x-web-header>
<header class="page-hero home-page-hero bg-gradient-primary-to-secondary"
        style="background: url({{ $page->banner_image }})">
    <div class="page-hero-content pt-10">
        <div class="container">
            <div class="row justify-content-center" style="">
                <div class="col-12">
                    <div class="img-adjust-home-banner">
                        <img src="{{ asset('uploads/line-D1.png') }}" class="line-one" alt="">
                    </div>
                    <h1 class="page-hero-title home-title">
                        {{ $page->page_title }}
                    </h1>
                    <div class="text-right img-adjust-home-banner">
                        <img src="{{ asset('uploads/line-D2.png') }}" class="line-two" alt="">
                    </div>
                </div>
                <div class="col-12 mt-3 text-center">
                    <a onclick="apply_registration('{{ json_encode(\App\Enum\RegisterTypeEnum::getTranslationKeys()) }}')"
                       class="start_button py-sm-3 px-sm-5">
                        {{ trans('general.get_started') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="bg-white">
    {{$content}}
</main>
<x-web-footer :cPage="$page"></x-web-footer>
<script src="{{ asset('js/website.min.js') }}"></script>
<script>
    $('.testing_owl').owlCarousel({
        loop:true,
        margin:10,
        dots:false,
        nav:true,
        navText:["<i class='bx bx-chevron-left'></i>","<i class='bx bx-chevron-right'></i>"],
        mouseDrag:false,
        autoplay:true,
        animateOut: 'slideOutUp',
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
</script>
<x-session-messages></x-session-messages>
</body>
</html>
