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

@if(auth()->check())
    {{ auth()->user()->name }}
    <a href="/logout">разлогин</a>
    @if(auth()->user()->is_admin == 1)
        <p><a href="/admin">на страницу администратора</a></p>
    @endif
@else
    <p>Только зарегистрированые пользователи могут размещать объявления</p>
    <a href="/login">Авторизация</a><br>
    <a href="/register">Регистрация</a>
@endif

@yield('content')

@if($_SERVER['REQUEST_URI'] != '/')
    <a href="/">На главную</a>
@endif


</body>
</html>
