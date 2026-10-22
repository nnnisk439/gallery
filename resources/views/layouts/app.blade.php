<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@section('title') Галерея @show</title>
    <!-- Подключаем простые стили, чтобы сайт не выглядел как голый HTML -->
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f4f4f4; color: #333; }
        nav { background: #333; padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        nav a { color: white; text-decoration: none; margin-right: 15px; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        .container { max-width: 1000px; margin: 0 auto; background: white; padding: 20px; border-radius: 5px; }
        .grid { display: flex; flex-wrap: wrap; gap: 20px; }
        .card { border: 1px solid #ddd; padding: 10px; width: 300px; border-radius: 5px; background: #fff; }
        .card img { width: 100%; height: 200px; object-fit: cover; border-radius: 3px; }
        .btn { display: inline-block; padding: 8px 15px; background: #007bff; color: white; text-decoration: none; border-radius: 3px; margin-top: 10px; }
        .btn:hover { background: #0056b3; }
    </style>
</head>
<body>

    <!-- Навигационное меню -->
    <nav>
        <a href="{{ route('home') }}">Главная</a>
        <a href="{{ url('/gallery') }}">Галерея</a>
        <a href="{{ url('/admin') }}">Админка</a>
    </nav>

    <!-- Сюда будет вставляться содержимое других страниц -->
    <div class="container">
        @yield('content')
    </div>

</body>
</html>