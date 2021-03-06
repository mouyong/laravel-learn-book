<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Sample App') - Laravel 入门教程</title>
    <link rel="stylesheet" href="/css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="app">
    @include('layouts._header')
    <div class="container">
        <div class="col-md-offset-1 col-md-10">
            @include('shared.messages')
            @yield('content')
            @include('layouts._footer')
        </div>
    </div>
</div>

<script src="/js/app.js"></script>
</body>
</html>