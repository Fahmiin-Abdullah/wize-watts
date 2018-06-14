<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Wize Watts</title>
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('css/materialize.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/users/app.css')}}">

        @yield('css')

    </head>
    <body>
        
        @include('includes.users._nav')

        @include('includes._errors')
        
        @yield('content')

        @include('includes.users._footer')

    </body>
        <script src="{{asset('js/materialize.min.js')}}"></script>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/users/app.js')}}"></script>

        @yield('js')

        @include('includes._toast')

</html>