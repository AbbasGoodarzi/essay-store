<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\ArticleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function show(Article $article, Request $request)
    {
        $success = $request->has('success');
        return view('front.front_article_single', compact('article', 'success'));
    }

    public function storeRequest(Article $article, Request $request)
    {
        $articleRequest = new ArticleRequest([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
        ]);
        $articleRequest->save();
        return redirect()->route('front.articles.show', ['article' => $article->id, 'success' => 1]);
    }
}
