<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstrapper for Admin.
 */

// Отключаем встроенные поля формы, которые нам не нужны
Encore\Admin\Form::forget(['map', 'editor']);
