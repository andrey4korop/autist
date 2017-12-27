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
 AdminSection::addMenuPage(\App\Page::class)->setIcon('fa fa-newspaper-o');
 AdminSection::addMenuPage(\App\Blog::class)->setIcon('fa fa-newspaper-o');
 AdminSection::addMenuPage(\App\News::class)->setIcon('fa fa-newspaper-o');
 AdminSection::addMenuPage(\App\ThisInt::class)->setIcon('fa fa-newspaper-o');
 AdminSection::addMenuPage(\App\LeftMenu::class)->setIcon('fa fa-newspaper-o');
 AdminSection::addMenuPage(\App\TopMenu::class)->setIcon('fa fa-newspaper-o');
 AdminSection::addMenuPage(\App\BottomMenu::class)->setIcon('fa fa-newspaper-o');
 AdminSection::addMenuPage(\App\Media::class)->setIcon('fa fa-newspaper-o');
 AdminSection::addMenuPage(\App\Book::class)->setIcon('fa fa-newspaper-o');

return [
    [
        'title' => 'forum',
        'icon' => 'fa fa-group',
        'pages' => [
            (new Page(\App\User::class))
                ->setIcon('fa fa-user')
                ->setPriority(0),
            (new Page(\App\Channel::class))
                ->setIcon('fa fa-group')
                ->setPriority(100)
        ]
    ]
];