<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body>
        <h1>{{ config('app.name') }}</h1>
    </body>
</html>
