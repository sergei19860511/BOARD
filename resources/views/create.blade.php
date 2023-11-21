@extends('layouts.app')
@section('title', 'Добавить в мои объявления')
@section('content')
    <form action="{{ route('home.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="txtTitle" class="form-label">Товар</label>
            <input name="title" id="txtTitle" class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title') }}">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="txtContent" class="form-label">Описание</label>
            <textarea name="text" id="txtContent" class="form-control @error('text') is-invalid @enderror"
                      row="3">{{ old('text') }}</textarea>
            @error('text')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="txtPrice" class="form-label">Цена</label>
            <input name="price" id="txtPrice" class="form-control @error('price') is-invalid @enderror"
                   value="{{ old('price') }}">
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary" value="Добавить">
    </form>
@endsection()
