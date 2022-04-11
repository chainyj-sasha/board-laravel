<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>

<h3>Страница администратора</h3>

<p>Вы вошли как <b>{{ auth()->user()->name }}</b></p>

@yield('content')

@if($_SERVER['REQUEST_URI'] != '/admin')
    <p><a href="/admin">На главную страницу администратора</a></p>
@endif

<p><a href="/">На главную страницу сайта</a></p>

</body>
</html>
