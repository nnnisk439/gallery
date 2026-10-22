<?php

namespace App\Admin\Controllers;

use App\Models\GalleryItem;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GalleryItemController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'GalleryItem';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GalleryItem());

        $grid->column('id', 'ID')->sortable();
        $grid->column('title', 'Название');
        $grid->column('preview', 'Превью')->image('', 80, 60); // Показываем маленькую картинку
        $grid->column('is_active', 'Активна')->switch(); // Переключатель вкл/выкл
        $grid->column('published_at', 'Опубликовано');
        $grid->column('created_at', 'Создано');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(GalleryItem::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('title', 'Название');
        $show->field('description', 'Описание');
        $show->field('image', 'Изображение')->image(); // Показываем большую картинку
        $show->field('is_active', 'Активна')->using([1 => 'Да', 0 => 'Нет']);
        $show->field('published_at', 'Дата публикации');
        $show->field('created_at', 'Создано');
        $show->field('updated_at', 'Обновлено');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
         $form = new Form(new GalleryItem());

        $form->text('title', 'Название')->required();
        $form->textarea('description', 'Описание');
        $form->image('image', 'Изображение')->required()->uniqueName(); // Загрузка картинки
        $form->image('preview', 'Превью')->uniqueName(); // Загрузка превью
        $form->switch('is_active', 'Активна')->default(1); // По умолчанию включена
        $form->datetime('published_at', 'Дата публикации')->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
