<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.article-list', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create-article');
    }

    public function store(Request $request)
    {
        $article = new Article([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'is_publish' => $request->has('is_publish') ? 1 : 0,
        ]);
        auth()->user()->articles()->save($article);
        return redirect()->route('dashboard.articles.index');
    }

    public function show(Article $article)
    {
        //
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit-article', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->is_publish = $request->has('is_publish') ? 1 : 0;
        $article->save();
        return redirect()->route('dashboard.articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('dashboard.articles.index');
    }
}
