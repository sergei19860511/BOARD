@extends('layouts.app')
@section('title', 'Список объявлений')

    @section('content')
        <div class="container">
            <h1 class="my-3 text-center">Объявления</h1>
            @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if(count($posts) > 0)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Автор ID</th>
                        <th scope="col">Детально</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->price . ' руб' }}</td>
                            <td>{{ $post->user->id }}</td>
                            <td><a href="{{ route('post.show', $post) }}">Детально...</a></td>
                            @auth('web')
                                <td>
                                    <form action="{{ route('add-to-favorites') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <input type="hidden" value="{{ auth('web')->user()->id ?? '' }}">
                                        <button type="submit" class="btn btn-outline-danger">
                                            Добавить в избранное
                                        </button>
                                    </form>
                                </td>
                            @endauth
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @endsection

