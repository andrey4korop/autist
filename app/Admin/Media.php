<?php
use App\Media;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Media::class, function (ModelConfiguration $model) {
    $model->setTitle('Відео')->setAlias('Media');
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->paginate(10);
        $display->setHtmlAttribute('class', 'table-info table-hover');
        $display->setColumns([
            AdminColumn::link('title')->setLabel('Заголовок')->setWidth('500px'),
            AdminColumn::image('youtube_img')->setLabel('Зображення')->setWidth('150px'),
            AdminColumn::datetime('created_at')->setLabel('Створений'),
            //AdminColumn::text('content')->setLabel('Текст')->setWidth('500px'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function($id = null) {
        $form = AdminForm::panel();
        $form->setItems(
            AdminFormElement::text('title', 'Заголовок'),
            AdminFormElement::text('youtube_url', 'Посилання на Youtube-відео')
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