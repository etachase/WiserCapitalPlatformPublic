<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ config('app.short_name') }} | {{ $page_title or "Page Title" }}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Set a meta reference to the CSRF token for use in AJAX request -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="icon" type="image/png" href="{{url('/assets/themes/wisercapital/img/favicon-icon.png')}}">
        <!-- Bootstrap 3.3.4 -->
        <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons 4.4.0 -->
        <link href="{{ asset("/bower_components/admin-lte/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />

        <!-- Ionicons 2.0.1 -->
        <link href="{{ asset("/bower_components/admin-lte/ionicons/css/ionicons.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css") }}" rel="stylesheet" type="text/css" />


        <!-- Application CSS-->
        <link href="{{ asset(elixir('css/all.css')) }}" rel="stylesheet" type="text/css" />


        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/bs/dt-1.10.11,r-2.0.2/datatables.min.css"/>
        <link type="text/css" rel="stylesheet" href="https://fast.fonts.com/cssapi/454a050b-22e4-49d2-8f01-30156db35d0c.css">
        <link href="{{ asset(('/assets/themes/wisercapital/css/jquery-ui.min.css')) }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset(('/assets/themes/wisercapital/css/styles.css')) }}" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
        
        <!-- Optional header section  -->
        @yield('head_extra')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <!-- Body -->
    @include('partials._body')

</html>
