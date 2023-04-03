<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    //
    function index()
    {
        return Article::all();
    }
    function show(Article $article)
    {
        return $article;
    }
    function store(Request $request)
    {
        $article =  Article::create($request->all());
        return response()->json($article, 201);
    }
    function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return response()->json($article, 200);
    }
    function delete(Request $request, Article $article)
    {
        Article::find($id)->delete();
        return response()->json(null, 204);
    }
}
