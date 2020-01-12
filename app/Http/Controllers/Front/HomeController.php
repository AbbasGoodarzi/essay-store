<?php

namespace App\Http\Controllers\Front;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::where('is_publish', 1)->get();
        return view('front.front_index', compact('articles'));
    }
}
