<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gallery\GalleryController;
use App\Models\GalleryItem;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Маршрут для Главной страницы ("/")
Route::get('/', function () {
    // Берем 3 последние активные работы для вывода на главной
    $latest = GalleryItem::where('is_active', true)
        ->latest('published_at')
        ->take(3)
        ->get();
        
    // Возвращаем шаблон welcome.blade.php и передаем туда переменную $latest
    return view('welcome', compact('latest'));
})->name('home'); // Даем маршруту имя 'home', чтобы потом удобно было на него ссылаться


// 2. Маршруты для Галереи (ресурсный контроллер)
// Эта конструкция автоматически создаст маршруты для всех действий (index, show, create, store и т.д.)
Route::resource('/gallery', GalleryController::class)->names('gallery');