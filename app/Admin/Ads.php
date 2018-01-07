<?php
use App\Ads;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Ads::class, function (ModelConfiguration $model) {
    $model->setTitle('Ads')->setAlias('Ads');
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->paginate(10);
        $display->setHtmlAttribute('class', 'table-info table-hover');
        $display->setColumns([
            AdminColumn::link('title')->setLabel('Заголовок')->setWidth('300px'),
            AdminColumn::image('img_path')->setLabel('Зображення')->setWidth('100px'),
            AdminColumn::text('count_see')->setLabel('count_see')->setWidth('100px'),
            AdminColumn::text('count_click')->setLabel('count_click')->setWidth('100px'),
            AdminColumn::custom('действует', function(Ads $ads) {
                return $ads->end_date&&$ads->end_date_on ? \Carbon\Carbon::now()->diffInDays( \Carbon\Carbon::parse($ads->end_date), false).' days' : '';
            }),
            AdminColumn::custom('see', function(Ads $ads) {
                return (
                    (
                        ($ads->priority_end_date == 1 && $ads->end_date_on && $ads->end_date > Carbon\Carbon::now())
                        || ($ads->priority_see == 1 && $ads->see_on && $ads->count_see < $ads->see)
                        || ($ads->priority_click == 1 && $ads->click_on && $ads->count_click < $ads->click)
                    )
                    || (
                        ($ads->priority_end_date != 1 && $ads->priority_see != 1 && $ads->priority_click != 1)
                        && (
                            ($ads->end_date_on && $ads->end_date > Carbon\Carbon::now())
                            || ($ads->see_on && $ads->count_see < $ads->see)
                            || ($ads->click_on && $ads->count_click < $ads->click)
                        )
                    )
                )  ? '+' : '-';
            }),
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
            AdminFormElement::select('priority_end_date', 'priority_end_date', [1 => 1, 2 => 2]),
            AdminFormElement::checkbox('see_on', 'see_on'),
            AdminFormElement::number('see', 'see'),
            AdminFormElement::select('priority_see', 'priority_see',[1 => 1, 2 => 2]),
            AdminFormElement::checkbox('click_on', 'click_on'),
            AdminFormElement::number('click', 'click'),
            AdminFormElement::select('priority_click', 'priority_click', [1 => 1, 2 => 2])
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