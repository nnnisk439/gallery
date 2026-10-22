<?php

namespace App\Http\Controllers\Gallery;

use App\Models\GalleryItem;
use Illuminate\Http\Request;

// Наш контроллер наследует BaseController, как сказано в методичке
class GalleryController extends BaseController
{
    // 1. Показать список всех картинок
    public function index()
    {
        // Берем только активные записи, сортируем по дате (сначала новые) и делим по 12 штук на страницу
        $items = GalleryItem::where('is_active', true)
            ->orderByDesc('published_at')
            ->paginate(12);

        // Передаем переменную $items в шаблон gallery/index.blade.php
        return view('gallery.index', compact('items'));
    }

    // 2. Показать одну конкретную картинку
    public function show($id)
    {
        // Ищем запись по ID. Если не найдем — выдаст ошибку 404
        $item = GalleryItem::findOrFail($id);

        // Передаем переменную $item в шаблон gallery/show.blade.php
        return view('gallery.show', compact('item'));
    }

    // 3. Показать форму создания (пока оставим простую заготовку)
    public function create()
    {
        return view('gallery.create'); 
    }

    // 4. Сохранить новую картинку
    public function store(Request $request)
    {
        // Проверяем входящие данные (обязательно ли название и картинка и т.д.)
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|max:4096', // Картинка до 4MB
            'preview' => 'nullable|image|max:2048',
        ]);

        // Сохраняем загруженный файл в папку storage/app/public/gallery
        $data['image'] = $request->file('image')->store('gallery', 'public');
        
        // Если загрузили превью — сохраняем и его
        if ($request->hasFile('preview')) {
            $data['preview'] = $request->file('preview')->store('gallery/previews', 'public');
        }

        // Ставим статус "активно" и текущую дату публикации
        $data['is_active'] = $request->boolean('is_active');
        $data['published_at'] = now();

        // Создаем запись в базе данных
        GalleryItem::create($data);

        // Перенаправляем пользователя обратно в галерею с сообщением об успехе
        return redirect()->route('gallery.index')->with('success', 'Работа добавлена');
    }

    // Остальные методы (edit, update, destroy) мы пока оставим пустыми.
    // Вы можете добавить их позже, если захотите редактировать картинки с сайта.
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}