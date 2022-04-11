@extends('layout.main')

@section('title', $title)

@section('content')
    <h4>Выберите подкатегорию:</h4>

    <ul>
        @foreach($subCategories as $subCategory)
            <li><a href="/subcategory/{{ $subCategory->title }}">{{ $subCategory->title }}</a></li>
        @endforeach
    </ul>
@endsection
