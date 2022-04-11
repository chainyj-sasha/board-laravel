@extends('layout.main')

@section('title', $title)

@section('content')

    <h3>Основная страница сайта</h3>

    <h4>Категории объявлений:</h4>

    <ul>
        @foreach($categories as $category)
            <li><a href="/category/{{ $category->title }}">{{ $category->title }}</a></li>
        @endforeach
    </ul>

@endsection
