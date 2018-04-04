<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="container-fluid p-0">
            <div class="">
                @include('partials.navbar')
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container-fluid p-0">
            @yield('content')
        </div>
    </div>
</div>
@include('partials.contact')
@include('partials.footer')
@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        $(document).ready(function() {
            $(window).scrollTop(0);
            $(window).scroll(function() {
                if ($(this).scrollTop() >= 50) {
                    $('nav').addClass('top');
                } else if( $(this).scrollTop() <= 50) {
                    $('nav').removeClass('top');
                }
            });
        });

    </script>
@show
</body>
</html>

