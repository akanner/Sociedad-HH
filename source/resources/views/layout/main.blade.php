<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="es" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <meta name="description" content="La Sociedad de Hematología y Hemoterapia de La Plata es una asociación sin fines de lucro que reúne de forma voluntaria a profesionales de la hematología y hemoterapia de la localidad platense y sus alrededores.">
    <meta name="keywords" content="sociedad,hematologia,hemoterapia,hematologos,hemoterapeutas,la,plata,ciudad,local,asociacion,profesional,voluntaria,platense">
    <meta name="author" content="Sociedad de Hematología y Hemoterapia de La Plata">

    <!-- Open Graph data -->
    @section('og-data')
    <meta property="og:title" content="Sociedad de Hematología y Hemoterapia de La Plata" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.sociedadhh.com.ar/" />
    <meta property="og:image" content="http://www.sociedadhh.com.ar/img/logo/logo-simplificado.png" />
    <meta property="og:description" content="La Sociedad de Hematología y Hemoterapia de La Plata es una asociación sin fines de lucro que reúne de forma voluntaria a profesionales de la hematología y hemoterapia de la localidad platense y sus alrededores." />
    <meta property="og:site_name" content="Sociedad de Hematología y Hemoterapia de La Plata" />
    @show

    <title>@section('title') Sociedad de Hemat&oacute;logos y Hemoterapeutas de La Plata @show</title>

    <link rel="icon" type="image/png" href="{{{ asset('favicon.png') }}}">

    <link rel="stylesheet" href="{{ elixir('css/libraries.css') }}" />
    <link rel="stylesheet" href="{{ elixir('css/main.css') }}" />
    @yield('styles')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Set default header if not overriden -->
    <div id="main-wrapper">
        @yield('header', View::make('layout.header'))
        @include('layout.nav')
        @include('layout.bodycontent')
    </div>
    @include('layout.footer')

    <script type="application/javascript" src="{{ elixir('js/libraries.js')}}"></script>
    @yield('scripts')

</body>

</html>
