<?php
use App\Blog;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Blog::class, function (ModelConfiguration $model) {
    $model->setTitle('Блог')->setAlias('blog');
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->paginate(10);
        $display->setHtmlAttribute('class', 'table-info table-hover');
        $display->setColumns([
            AdminColumn::link('title')->setLabel('Заголовок')->setWidth('300px'),
            AdminColumn::datetime('created_at')->setLabel('Создан'),
            AdminColumn::datetime('updated_at')->setLabel('Изменён'),
            //AdminColumn::text('content')->setLabel('Текст')->setWidth('500px'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function($id = null) {
        $form = AdminForm::panel();
        $form->setItems(
            AdminFormElement::text('title', 'Заголовок'),
            //AdminFormElement::text('url', 'url'),
            AdminFormElement::text('author_id', 'author_id'),
            AdminFormElement::wysiwyg('content', 'Текст')->setEditor('ckeditor'),
            AdminFormElement::wysiwyg('custom_css', 'custom_css')->setEditor('ckeditor'),
            AdminFormElement::wysiwyg('custom_js', 'custom_js')->setEditor('ckeditor')
        );
        $form
            ->getButtons()
            ->setSaveButtonText('Сохранить')
            ->setDeleteButtonText('Удалить')
            ->setCancelButtonText('Отменить');
        return $form;
    });

    // Создание записи
    $model->setMessageOnCreate('Сторінка створена');

    // Редактирование записи
    $model->setMessageOnUpdate('Сторінка обновлена');

    // Удаление записи
    $model->setMessageOnDelete('Сторінка видалена');

    // Восстановление записи
    $model->setMessageOnRestore('Сторінка востаовлена');


});