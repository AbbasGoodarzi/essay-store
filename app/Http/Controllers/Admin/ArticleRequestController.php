<?php

namespace App\Http\Controllers\Admin;

use App\ArticleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleRequestController extends Controller
{
    public function index()
    {
        $articleRequests = ArticleRequest::all();
        return view('admin.articles.article-requests-list', compact('articleRequests'));
    }
}
