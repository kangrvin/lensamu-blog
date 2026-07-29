<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
    $total_articles = Article::count();
    $total_categories = Category::count();
    $latest_article = Article::latest()->take(5)->get();
    $popular_article = Article::orderByDesc('views')->take(5)->get();

    return view('Back.dashboard.index', compact(
        'total_articles',
        'total_categories',
        'latest_article',
        'popular_article'
    ));

    }

}
