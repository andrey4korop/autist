<?php
use App\Document;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Document::class, function (ModelConfiguration $model) {
    $model->setTitle('Документи')->setAlias('Document');
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
            AdminFormElement::select('category_type_id', 'Категорія')
                ->setModelForOptions(\App\DocumentType::class, 'title'),
            AdminFormElement::dependentselect('sub_category_type_id', 'Підкатегорія')
                ->setModelForOptions(\App\DocumentSubCategory::class, 'title')
                ->setDataDepends(['category_type_id'])
                ->setLoadOptionsQueryPreparer(function($item, $query) {
                    return $query->where('document_type_id', $item->getDependValue('category_type_id'));
                        }));
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