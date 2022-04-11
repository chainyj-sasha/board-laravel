@extends('layout.admin')

@section('title', $title)

@section('content')

    <table border="1">
        <caption>Все объявления на сайте</caption>
        <tr>
            <th>id</th>
            <th>Текст объявления</th>
            <th>Дата создания</th>
            <th>Активное</th>
            <th>Просмотр</th>
        </tr>
        @foreach($ads as $ad)
            <tr>
                <td>{{ $ad->id }}</td>
                <td>{{ mb_substr($ad->text, 0, 100). '...' }}</td>
                <td>{{ $ad->created_at }}</td>
                <td>{{ $ad->active }}</td>
                <td><a href="/view-ad/{{ $ad->id }}">подробнее</a></td>
            </tr>
        @endforeach
    </table><br><br>

    <table border="1">
        <caption>Таблица юзеров</caption>
        <tr>
            <th>id</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Is admin</th>
            <th>Ban</th>
            <th>Edit</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin }}</td>
                <td>{{ $user->active }}</td>
                <td><a href="/edit-user/{{ $user->id }}">редактировать</a></td>
            </tr>
        @endforeach
    </table>


@endsection
