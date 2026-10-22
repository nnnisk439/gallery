@extends('layouts.app')

@section('title', $item->title)

@section('content')
    <h1>{{ $item->title }}</h1>
    
    <div style="text-align: center; margin-bottom: 20px;">
        <!-- Выводим большую картинку -->
        <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" style="max-width: 100%; max-height: 600px; border-radius: 5px;">
    </div>

    <p style="font-size: 18px; line-height: 1.6;">{{ $item->description }}</p>
    
    <hr>
    <p><strong>Дата публикации:</strong> {{ $item->published_at?->format('d.m.Y H:i') }}</p>

    <a href="{{ url('/gallery') }}" class="btn">← Назад к галерее</a>
@endsection