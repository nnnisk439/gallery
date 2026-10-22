@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <h1>Добро пожаловать в Галерею!</h1>
    
    <h2>Последние поступления</h2>
    
    @if($latest->isEmpty())
        <p>Пока нет добавленных работ. Зайдите в админку и добавьте первую!</p>
    @else
        <div class="grid">
            @foreach($latest as $item)
                <div class="card">
                    @if($item->preview)
                        <img src="{{ asset('storage/'.$item->preview) }}" alt="{{ $item->title }}">
                    @else
                        <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}">
                    @endif
                    <h3>{{ $item->title }}</h3>
                    <a href="{{ route('gallery.show', $item->id) }}" class="btn">Смотреть</a>
                </div>
            @endforeach
        </div>
    @endif
@endsection