<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>
</head>
@include('layouts.header')

<div class="content-wrapper">
    <div class="container">
        @yield('content')
    </div>
</div>

@include('layouts.footer')

<script>
    var PUBLIC_FOLDER='public/';
</script>
</html>
