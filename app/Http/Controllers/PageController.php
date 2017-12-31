<?php

namespace App\Http\Controllers;

use App\Blog;
use App\CategoryBook;
use App\Channel;
use App\DocumentSubCategory;
use App\Event;
use App\Media;
use App\News;
use App\ThisInt;
use Illuminate\Http\Request;
use App\Page;
use App\LeftMenu;
use App\DocumentType;
use Falur\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function __construct()
    {
        $this->breadcrumbs = new Breadcrumbs();
        $this->breadcrumbs->add('Главная', '/');

    }
    public function index(){
        $data['page'] = Page::first();
        $data['title'] = $data['page']->title;
        $data['blogs'] = Blog::limit(6)->orderBy('created_at','desc')->get();
        $data['news'] = News::limit(4)->orderBy('created_at','desc')->get();
        $data['ThisInt'] = ThisInt::limit(1)->orderBy('created_at','desc')->first();
        $data['Channels'] = Channel::all();
        $data['Medias'] = Media::all();
        $data['CategoryBook'] = CategoryBook::all();
        $events = Event::all();
        $data['calendar'] = \Calendar::addEvents($events);
        return view('main', $data);
    }

    public function page(Request $request){
        $data['page'] = Page::where('url', $request->url)->first();
        $data['title'] = $data['page']->title;
        return view('page', $data);
    }
    public function register_please(){
        $data['title'] = 'Зареєструйтеся будь ласка';
        return view('unlogin', $data);
    }
    public function document(){
        $data['title'] = 'Доступ до документiв та матерiалiв';
        $this->breadcrumbs->add($data['title'], route('document'));
        $data['content']['t1']['title'] = DocumentType::find(1)->title;
        $data['content']['t1']['url'] = route('documenttt', [DocumentType::find(1)]);
        $data['content']['t2']['title'] = 'Відео';
        $data['content']['t2']['url'] = route('mediaAll');
        $data['content']['t3']['title'] = DocumentType::find(2)->title;
        $data['content']['t3']['url'] = route('documenttt', [DocumentType::find(2)]);
        $data['t2'] = DocumentType::find(2);
        $data['breadcrumbs'] = $this->breadcrumbs;
        return view('documentCategory', $data);
    }
    public function documenttt(DocumentType $Category, DocumentSubCategory $subCategory = null){
        $data['title'] = 'Доступ до документiв та матерiалiв';
        $this->breadcrumbs->add('Доступ до документiв та матерiалiв', route('document'));
        $this->breadcrumbs->add($Category->title, route('documenttt', ['Category' => $Category]));
        if($subCategory){
            $this->breadcrumbs->add($subCategory->title, route('documenttt', ['Category' => $Category,  'subCategory' => $subCategory]));
            $data['content'] = $subCategory;
            $data['breadcrumbs'] = $this->breadcrumbs;
            return view('document', $data);
        }
        if($Category->subCategory->isEmpty()) {
            $data['content'] = $Category;
            $data['breadcrumbs'] = $this->breadcrumbs;
            return view('document', $data);
        }
        else{
            foreach ($Category->subCategory as $cat){
                $t['title'] = $cat->title;
                $t['url'] = route('documenttt', ['Category' => $Category, 'subCategory' => $cat]);;
                $data['content'][] = $t;
            }
            $data['breadcrumbs'] = $this->breadcrumbs;
            return view('documentCategory', $data);
        }
    }
}
