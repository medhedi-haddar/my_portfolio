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
    <link rel="stylesheet" href="{{asset('css/sb-admin.min.css')}}">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">

    @include('partials.navbar_admin')

    <div class="content-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>*
    </div>

@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
@show
</body>