<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="flex-grid">
    <div class="border-right"></div>
    <div class="header">@include("partials.header")</div>
    <div class="nav">@include('partials.nav')</div>
    <div class="content">@yield('content')</div>
    <div class="footer">@include("partials.footer")</div>

</div>
    <script src="{{ asset('js/navbar.js') }}"></script>
</body>
</html>