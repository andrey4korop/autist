<?php
use App\DocumentSubCategory;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(DocumentSubCategory::class, function (ModelConfiguration $model) {
    $model->setTitle('Підкатегорії')->setAlias('DocumentSubCategory');
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->paginate(10);
        $display->setHtmlAttribute('class', 'table-info table-hover');
        $display->setColumns([
            AdminColumn::link('title')->setLabel('Заголовок'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function($id = null) {
        $form = AdminForm::panel();
        $form->setItems(
            AdminFormElement::text('title', 'Заголовок')
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