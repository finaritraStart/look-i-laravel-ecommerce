<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/client/css/bootstrap/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="/client/css/bootstrap/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="/client/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/client/css/animate.css">
    <link rel="stylesheet" type="text/css" href="/client/css/aos.css">
    <link rel="stylesheet" type="text/css" href="/client/css/icomoon.css">
    <link rel="stylesheet" type="text/css" href="/client/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="/client/css/magnific-popup.css">
</head>

<body>
    @include('header')

    <body class="goto-here">
        @yield('content')
        @include('footer')
