<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=> 'articles'], function (){
    Route::get('/', function (){
        return Article::all();
    });
    Route::get('/{id}', function ($id){
        return Article::find($id);
    });
    Route::post('/', function (Request $request){
        return Article::create($request->all());
    });
    Route::put('/{id}', function (Request $request, $id){
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return Article::all();
    });
    Route::delete('/{id}', function ($id){
        Article::find($id)->delete();
        return 204;
    });
});

