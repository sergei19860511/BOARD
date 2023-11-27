@extends('layouts.app')
@section('title', 'Список объявлений')

    @section('content')
        <div class="container">
            <h1 class="my-3 text-center">Объявления</h1>
            @if(count($userFavoritePosts) > 0)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Детально</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userFavoritePosts as $userFavoritePost)
                        <tr>
                            <th scope="row">{{ $userFavoritePost->post->id }}</th>
                            <td>{{ $userFavoritePost->post->title }}</td>
                            <td>{{ $userFavoritePost->post->price . ' руб' }}</td>
                            <td><a href="{{ route('post.show', $userFavoritePost->post) }}">Детально...</a></td>
                            @auth('web')
                                <td>
                                    <form action="{{ route('delete-favorites', $userFavoritePost) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">
                                            Удалить из избранного
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

