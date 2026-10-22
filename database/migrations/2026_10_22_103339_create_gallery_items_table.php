<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('gallery_items', function (Blueprint $table) {
        $table->id(); // Уникальный номер (ID)
        $table->string('title'); // Название работы
        $table->string('preview')->nullable(); // Путь к превью (может быть пустым)
        $table->text('description')->nullable(); // Описание работы
        $table->string('image'); // Путь к полному изображению
        $table->boolean('is_active')->default(true); // Показывать на сайте (да/нет)
        $table->timestamp('published_at')->nullable(); // Дата публикации
        $table->timestamps(); // Поля created_at и updated_at
        $table->softDeletes(); // Поле deleted_at (для мягкого удаления)
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_items');
    }
};
