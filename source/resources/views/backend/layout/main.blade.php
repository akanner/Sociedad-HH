<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="es" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

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

    <div class="container">
        @include('backend.layout.nav')
        @include('backend.layout.bodycontent')
    </div>

    <script type="application/javascript" src="{{ elixir('js/libraries.js')}}"></script>
    @yield('scripts')

</body>

</html>
