<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/angular-route.min.js"></script>
    <script src="js/appdirective.js"></script>
</head>
@include('layouts.header')

<div class="content-wrapper">
    <div class="container">
        @yield('content')
    </div>
</div>

@include('layouts.footer')

<script>
    var PUBLIC_FOLDER = 'public/';
</script>
</html>
