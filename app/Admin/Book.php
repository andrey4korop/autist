<?php
use App\Book;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Book::class, function (ModelConfiguration $model) {
    $model->setTitle('Підручники')->setAlias('Book');
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->paginate(10);
        $display->setHtmlAttribute('class', 'table-info table-hover');
        $display->setColumns([
            AdminColumn::link('title')->setLabel('Заголовок')->setWidth('500px'),
            AdminColumn::datetime('created_at')->setLabel('Створений'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function($id = null) {
        $form = AdminForm::panel();
        $form->setItems(
            AdminFormElement::text('title', 'Заголовок'),
            AdminFormElement::file('path_file', 'Файл'),
            AdminFormElement::select('category_id', 'Категорія')
                ->setModelForOptions('\App\CategoryBook')
                ->setDisplay('title')
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