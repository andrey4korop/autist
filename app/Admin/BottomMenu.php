<?php
use App\BottomMenu;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(BottomMenu::class, function (ModelConfiguration $model) {
    $model->setTitle('Нижнє меню')->setAlias('BottomMenu');
    $model->onDisplay(function () {
        $display = AdminDisplay::tree();
        //$display->with('title');
        $display->setValue('title');
            //->setParentField('parent_id')
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