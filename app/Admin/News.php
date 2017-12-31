<?php
use App\News;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(News::class, function (ModelConfiguration $model) {
    $model->setTitle('Новини')->setAlias('news');
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->paginate(10);
        $display->setHtmlAttribute('class', 'table-info table-hover');
        $display->setColumns([
            AdminColumn::link('title')->setLabel('Заголовок')->setWidth('500px'),
            AdminColumn::image('main_img')->setLabel('Зображення')->setWidth('150px'),
            AdminColumn::datetime('created_at')->setLabel('Створений'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function($id = null) {
        $form = AdminForm::panel();
        $form->setItems(
            AdminFormElement::text('title', 'Заголовок'),
            AdminFormElement::image('main_img', 'Зображення'),
            AdminFormElement::wysiwyg('content', 'Текст')->setEditor('ckeditor'),
            AdminFormElement::textarea('custom_css', 'Власні CSS'),
            AdminFormElement::textarea('custom_js', 'Власні JavaScript')
        );
        $form
            ->getButtons()
            ->setSaveButtonText('Зберегти')
            ->setDeleteButtonText('Видалити')
            ->setCancelButtonText('Відмінити');
        return $form;
    });

    // Создание записи
    $model->setMessageOnCreate('Сторінка створена');

    // Редактирование записи
    $model->setMessageOnUpdate('Сторінка оновлена');

    // Удаление записи
    $model->setMessageOnDelete('Сторінка видалена');

    // Восстановление записи
    $model->setMessageOnRestore('Сторінка відновлена');


});