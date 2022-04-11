@extends('layout.admin')

@section('title', $title)

@section('content')

    <h4>Просмотр объявления</h4>

    <p>{{ $ad->text }}</p>

    <form action="" method="post">
        @csrf
        @if($ad->active == 1)
            <input name="active" type="hidden" value="0"><br><br>
            <input name="button" type="submit" value="Отклонить">
        @else
            <input name="active" type="hidden" value="1"><br><br>
            <input name="button" type="submit" value="Активировать">
        @endif
    </form>


@endsection
