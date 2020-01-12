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
        $uploaded_detail['url'] = '';
        if(!is_null($request->file('image'))) {
            $file = $request->file('image');
            $file_name = time();
            $uploaded_detail = $this->upload_file($file, $file_name, 'articles');
        }

        $article = new Article([
            'title' => $request->input('title'),
            'code' => $request->input('code'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'pic_url' => $uploaded_detail['url'],
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
        $article->code = $request->input('code');
        $article->price = $request->input('price');
        $article->description = $request->input('description');
        $article->is_publish = $request->has('is_publish') ? 1 : 0;
        if(!is_null($request->file('image'))) {
            $file = $request->file('image');
            $file_name = time();
            $uploaded_detail = $this->upload_file($file, $file_name, 'articles');
            $article->pic_url = $uploaded_detail['url'];
        }

        $article->save();
        return redirect()->route('dashboard.articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('dashboard.articles.index');
    }

    private function upload_file($file, $new_file_name = null, $folder_name = '/')
    {
        $original_name = $file->getClientOriginalName();
        $original_extension = $file->getClientOriginalExtension();
        $file_size = $file->getSize();
        $file_mime_type = $file->getMimeType();

        $new_file_name = $new_file_name ?: time();
        $new_file_name .= '.' . $original_extension;

        $url = $file->storeAs($folder_name, $new_file_name);
        return [
            'original_name' => $original_name,
            'url' => $url,
            'size' => $file_size,
            'mime_type' => $file_mime_type,
        ];
    }
}
