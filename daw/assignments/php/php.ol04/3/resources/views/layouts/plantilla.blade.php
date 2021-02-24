<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1">
        <title>Your page</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css" media="screen">
    </head>
    <body>
        <!-- Cabecera -->
        @include("layouts.navbar")
        @yield("cabecera")
        <!-- Principal -->
        @include("layouts.card")
        @yield("infoGeneral")
        <!-- Pie -->
        @yield("pie")
        <!-- Librerías Bootstrap -->
        <script src="{{asset('js/jquery-3.5.1.min.js')}}" charset="utf-8"></script>
        <script src="{{asset('js/bootstrap.min.js')}}" charset="utf-8"></script>
    </body>
</html>
