<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8">
        <title>Wize Watts</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('css/materialize.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

        @yield('css')

    </head>
    <body>
        
        @include('includes._nav')
        
        @yield('content')

        @include('includes._footer')

    </body>
        <script src="{{asset('js/materialize.min.js')}}"></script>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>

        @yield('js')

</html>