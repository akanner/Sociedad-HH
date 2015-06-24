<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="es" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Open Graph data -->
    @section('og-data')
    <meta property="og:title" content="" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="" />
    <meta property="og:site_name" content="" /> @show

    <title>@section('title') Sociedad de Hemat&oacute;logos y Hemoterapeutas de La Plata @show</title>

    <!--<link rel="shortcut icon" href="{{{ asset('assets/site/ico/favicon.ico') }}}">-->

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" /> @yield('styles')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="container">
        @include('layout.nav')
        @yield('content')
    </div>
    <!-- /container -->

    <script type="application/javascript" src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
    <script type="application/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    @yield('scripts')

</body>

</html>
