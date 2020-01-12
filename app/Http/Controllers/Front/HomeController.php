<?php

namespace App\Http\Controllers\Front;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $search = $request->input('search');
            $articles = Article::where('is_publish', 1)
                ->where(function ($q) use ($search){
                    $q->where('title', 'LIKE', '%'.$search.'%')
                    ->orWhere('description', 'LIKE', '%'.$search.'%');
                })
                ->get();
        } else {
            $articles = Article::where('is_publish', 1)->get();
        }
        return view('front.front_index', compact('articles'));
    }

    public function showAboutUs()
    {
        return view('front.front_about_us');
    }

    public function showContactUs()
    {
        return view('front.front_contact_us');
    }
}
