<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<h3>Форма регистрации</h3>

<form action="" method="post">
    @csrf
    <input name="name" type="text" placeholder="введите имя" value="{{ old('name') }}"> Как вас зовут<br><br>
    <input name="email" type="email" placeholder="эл. почта" value="{{ old('email') }}"> Электронная почта<br><br>
    <input name="password" type="password"> Придумайте пароль<br><br>
    <input name="password_confirmation" type="password"> Повторите пароль<br><br>
    <input name="button" type="submit">
</form>


</body>
</html>
