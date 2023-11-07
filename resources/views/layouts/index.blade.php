<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" class="">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@include('layouts.partials.header')

<body>

    @yield('main')

</body>

</html>