<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaticPage;

class StaticPageController extends Controller
{
    public function  show($urlname){
        $page= StaticPage::where('urlname', '=', $urlname)->firstOrFail();
        return view($page->view, ['title'=> $page->title, 'content'=> $page->content]);
    }
}
