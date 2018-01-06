<?php
use App\Ads;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Ads::class, function (ModelConfiguration $model) {
    $model->setTitle('Ads')->setAlias('Ads');
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->paginate(10);
        $display->setHtmlAttribute('class', 'table-info table-hover');
        $display->setColumns([
            AdminColumn::link('title')->setLabel('Заголовок')->setWidth('500px'),
            AdminColumn::image('img_path')->setLabel('Зображення')->setWidth('150px'),
            AdminColumn::text('count_see')->setLabel('count_see')->setWidth('150px'),
            AdminColumn::text('count_click')->setLabel('count_click')->setWidth('150px'),
            AdminColumn::datetime('created_at')->setLabel('Створений'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function($id = null) {
        $form = AdminForm::panel();
        $form->setItems(
            AdminFormElement::text('title', 'Заголовок'),
            AdminFormElement::image('img_path', 'Зображення'),
            AdminFormElement::text('url', 'url'),
            AdminFormElement::checkbox('end_date_on', 'end_date_on'),
            AdminFormElement::date('end_date', 'end_date'),
            AdminFormElement::checkbox('see_on', 'see_on'),
            AdminFormElement::number('see', 'see'),
            AdminFormElement::checkbox('click_on', 'click_on'),
            AdminFormElement::number('click', 'click')
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