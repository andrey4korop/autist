<?php
use App\LeftMenu;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(LeftMenu::class, function (ModelConfiguration $model) {
    $model->setTitle('LeftMenu')->setAlias('LeftMenu');
    $model->onDisplay(function () {
        $display = AdminDisplay::tree()->setValue('page_id')
            //->setParentField('parent_id')
            ->setReorderable(true)
            //->setOrderField('order');
            ;
      
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