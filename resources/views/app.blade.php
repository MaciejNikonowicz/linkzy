<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{env('APP_NAME')}}</title>
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
</head>
<body>
@if (Cache::get('user'))
    <script>
        window.Laravel = {!!json_encode([
            'isLoggedin' => true,
            'user' => Cache::get('user')
        ]) !!}
    </script>
@else
    <script>
        window.Laravel = {!!json_encode([
            'isLoggedin' => false
        ]) !!}
    </script>
@endif
@if(Session::get('message'))
    <script>
        window.Session = {!! json_encode([
            'message' => Session::get('message')
        ]) !!}
    </script>
@endif
<div id="app">
    <app></app>
</div>
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>