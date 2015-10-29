<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Article;
use Carbon\Carbon;
use App\Http\Requests\CreateArticleRequest;


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
    
    public function store(Request $request)
    {
        $this->validate($request, ['title'=>'required', 'body'=>'required']);
        $input = $request->all();
        Article::create($input);
        return redirect('articles');
    }
    
    public function show($id){
        $article = Article::findOrFail($id);
        return view('articles.show',  compact($article));
    }
}
