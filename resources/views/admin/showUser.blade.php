@extends('layout.admin')

@section('title', $title)

@section('content')

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <h4>Простотр юзера</h4>

    <ul>
        <li>Имя: {{ $user->name }}</li>
        <li>Электронная почта: {{ $user->email }}</li>
        @if($user->active == 1)
            <li>Бан: активен</li>
        @else
            <li>Бан: забанен</li>
        @endif
        @if($user->is_admin == 1)
            <li>Администратор: Да</li>
        @else
            <li>Администратор: Нет</li>
        @endif

    </ul>

    <h4>Редактировать данные юзера</h4>

    <form action="" method="post">
        @csrf
        <input name="name" type="text" value="{{ $user->name }}"><br><br>
        <input name="email" type="email" value="{{ $user->email }}"><br><br>
        <input name="buttonEdite" type="submit" value="Редактировать">
    </form>

    <form action="" method="post">
        @csrf
        @if($user->active == 1)
            <input name="ban" type="hidden" value="0">
            <input name="buttonBan" type="submit" value="забанить юзера">
        @else
            <input name="ban" type="hidden" value="1">
            <input name="buttonBan" type="submit" value="разбанить юзера">
        @endif
    </form>

@endsection
<input name="ban" type="hidden" value="0">
