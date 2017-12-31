<?php
use App\LeftMenu;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(LeftMenu::class, function (ModelConfiguration $model) {
    $model->setTitle('Ліве меню')->setAlias('LeftMenu');
    $model->onDisplay(function () {
        $display = AdminDisplay::tree();
        $display->setValue('title');
            //->setParentField('parent_id')
        $display->setReorderable(true);
            //->setOrderField('order');
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function($id = null) {
        $form = AdminForm::panel();
        $form->setItems(
            AdminFormElement::select('page_id', 'Сторінка')->setModelForOptions(\App\Page::class, 'id')
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