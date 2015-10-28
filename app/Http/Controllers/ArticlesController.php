<?php namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Article;
use Carbon\Carbon;

class ArticlesController extends Controller
{
       
    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();
        //$articles = Article::latest('published_at')->unpublished()->get();
        
        return view('articles.articles_list', ['articles' => $articles]);
    }
    
    public function create()
    {
        return view('articles.create_form');
    }
    
    public function store()
    {
        $input = Request::all();
        Article::create($input);
        return redirect('articles');
    }
    
    public function show($id){
        $article = Article::findOrFail($id);
        return view('articles.show',  compact($article));
    }
}
