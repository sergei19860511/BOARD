@extends('layouts.app')
@section('title', 'Список объявлений')

    @section('content')
        <div class="container">
            <h1 class="my-3 text-center">Объявления</h1>
            @if(count($posts) > 0)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Детально</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->price . ' руб' }}</td>
                            <td><a href="{{ route('post.show', $post) }}">Детально...</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @endsection

