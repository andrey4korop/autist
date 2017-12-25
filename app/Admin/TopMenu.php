<?php
use App\TopMenu;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(TopMenu::class, function (ModelConfiguration $model) {
    $model->setTitle('TopMenu')->setAlias('TopMenu');
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
            AdminFormElement::select('page_id', 'page_id')->setModelForOptions(\App\Page::class, 'id')
                ->setDisplay('title')

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