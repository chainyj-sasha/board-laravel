@extends('layout.main')

@section('title', $title)

@section('content')

    <h4>Список объявлений подкатегории "{{ $subcategory }}":</h4>

    <ul>
        @foreach($ads as $ad)
            <li>{{ $ad->text }}</li>
        @endforeach
    </ul>

    @auth()

        <form action="" method="post">
            @csrf
            <textarea name="text" id="" cols="30" rows="10" placeholder="введите текст объявления..."></textarea><br><br>
            <input name="button" type="submit">
        </form>

    @endauth

@endsection
