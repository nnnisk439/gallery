<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Подключаем мягкое удаление

class GalleryItem extends Model
{
    use HasFactory, SoftDeletes; // Включаем мягкое удаление

    // Поля, которые разрешено заполнять
    protected $fillable = [
        'title', 
        'preview', 
        'description', 
        'image', 
        'is_active', 
        'published_at'
    ];

    // Указываем, что дата публикации должна быть объектом даты
    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'datetime',
    ];
}