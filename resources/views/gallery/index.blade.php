@extends('layouts.app') <!-- Говорим, что используем наш каркас -->

@section('title', 'Все работы') <!-- Заголовок страницы -->

@section('content')
    <h1>Галерея работ</h1>

    <div class="grid">
        @foreach($items as $item)
            <div class="card">
                <!-- Выводим картинку. Если превью нет, показываем полную картинку -->
                @if($item->preview)
                    <img src="{{ asset('storage/'.$item->preview) }}" alt="{{ $item->title }}">
                @else
                    <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}">
                @endif
                
                <h3>{{ $item->title }}</h3>
                <p>{{ Str::limit($item->description, 100) }}</p>
                <small>Опубликовано: {{ $item->published_at?->format('d.m.Y') }}</small>
                <br>
                <a href="{{ route('gallery.show', $item->id) }}" class="btn">Подробнее</a>
            </div>
        @endforeach
    </div>

    <!-- Выводим кнопки пагинации (переключение страниц) -->
    <div style="margin-top: 20px;">
        {{ $items->links() }}
    </div>
@endsection