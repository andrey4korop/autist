<?php
use App\Document;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Document::class, function (ModelConfiguration $model) {
    $model->setTitle('Document')->setAlias('Document');
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
            AdminFormElement::file('path_file', 'path_file'),
            AdminFormElement::select('category_type_id', 'category_type_id')
                ->setModelForOptions(\App\DocumentType::class, 'title'),
            AdminFormElement::dependentselect('sub_category_type_id', 'sub_category_type_id')
                ->setModelForOptions(\App\DocumentSubCategory::class, 'title')
                ->setDataDepends(['category_type_id'])
                ->setLoadOptionsQueryPreparer(function($item, $query) {
                    return $query->where('document_type_id', $item->getDependValue('category_type_id'));
                        }));
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