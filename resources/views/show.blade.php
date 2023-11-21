@extends('layouts.app')
@section('title', 'Подробнее')

    @section('content')

        <div class="card">
            <div class="card-header">
                Подробное описание
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->text }}</p>
                <p><b>Автор:</b> {{ $post->user->name }}</p>
                <p><a href="{{ route('post.index') }}">Назад</a></p>
            </div>
        </div>
    @endsection
