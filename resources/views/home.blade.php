@extends('layouts.app')
@section('title', 'Мои объявления')
@section('content')
    <h2>Добро пожаловать, {{ auth()->user()->name }}!</h2>
    <p class="text-end"><a href="{{ route('home.create') }}" class="btn btn-success">Добавить объявление</a></p>
    @if (count($posts) > 0)
        <table class="table table-striped table-borderless">
            <thead>
            <tr>
                <th>Товар</th>
                <th>Цена, руб.</th>
                <th>Автор ID</th>
                <th colspan="2">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td><h3>{{ $post->title }}</h3></td>
                    <td>{{ $post->price }}</td>
                    <td>{{ $post->user->id }}</td>
                    <td>
                        <a href="{{ route('home.edit', $post) }}" class="btn btn-warning">Изменить</a>
                    </td>
                    <td>
                        <form action="{{ route('home.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection()
