<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
return [
    [
        'title' => 'Контент',
        'icon' => 'fa fa-object-group',
        'pages' => [
            (new Page(\App\Page::class))
                ->setIcon('fa fa-file-text-o')
                ->setPriority(0),
            (new Page(\App\Blog::class))
                ->setIcon('fa fa-rss-square')
                ->setPriority(1),
            (new Page(\App\News::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(2),
            (new Page(\App\ThisInt::class))
                ->setIcon('fa fa-lightbulb-o')
                ->setPriority(3)
        ]
    ],
    [
        'title' => 'Меню',
        'icon' => 'fa fa-bars',
        'pages' => [
            (new Page(\App\LeftMenu::class))
                ->setIcon('fa fa-align-left')
                ->setPriority(0),
            (new Page(\App\TopMenu::class))
                ->setIcon('fa fa-chevron-up')
                ->setPriority(1),
            (new Page(\App\BottomMenu::class))
                ->setIcon('fa fa-chevron-down')
                ->setPriority(2)
        ]
    ],
    [
        'title' => 'Документи і медіа',
        'icon' => 'fa fa-bars',
        'pages' => [
            (new Page(\App\DocumentSubCategory::class))
                ->setIcon('fa fa-file')
                ->setPriority(0),
            (new Page(\App\Document::class))
                ->setIcon('fa fa-file-text')
                ->setPriority(1),
            (new Page(\App\Media::class))
                ->setIcon('fa fa-youtube')
                ->setPriority(2),
            (new Page(\App\Book::class))
                ->setIcon('fa fa-book')
                ->setPriority(3)
        ]
    ],
    [
        'title' => 'Календар',
        'icon' => 'fa fa-calendar',
        'pages' => [
            (new Page(\App\Event::class))
                ->setIcon('fa fa-calendar-plus-o')
                ->setPriority(0),

        ]
    ],
    [
        'title' => 'Форум',
        'icon' => 'fa fa-group',
        'pages' => [
            (new Page(\App\User::class))
                ->setIcon('fa fa-user')
                ->setPriority(0),
            (new Page(\App\Channel::class))
                ->setIcon('fa fa-group')
                ->setPriority(100)
        ]
    ],
    [
        'title' => 'ADS',
        'icon' => 'fa fa-group',
        'pages' => [
            (new Page(\App\Ads::class))
                ->setIcon('fa fa-user')
                ->setPriority(0)

        ]
]
];