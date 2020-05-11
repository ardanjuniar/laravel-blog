<?php

namespace App\Http\Controllers\Web;

use App\Article;
use App\Categori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Categori::all();
        $articles = Article::latest()->get()->random(2);
        $articleall = Article::latest()->get();
        $articleterkait = Article::latest()->limit(4)->get();

        return view('front', compact('categories', 'articles', 'articleall', 'articleterkait'));
    }

    public function about()
    {
        $categories = Categori::all();
        return view('front.about', compact('categories'));
    }

    public function contact()
    {
        $categories = Categori::all();
        return view('front.contact', compact('categories'));
    }

    public function show(Article $article)
    {
        $articleterkait = Article::latest()->get()->random(3);
        $categories = Categori::withCount('article')->get();
        return view('front.article_detail', compact('article', 'categories', 'articleterkait'));
    }

    public function article_categori(Categori $categori)
    {
        $categories = Categori::all();
        $articles = Article::latest()->get()->random(2);
        $articleall = $categori->article()->get();
        $articleterkait = Article::latest()->limit(4)->get();

        return view('front', compact('categories', 'articles', 'articleall', 'articleterkait'));
    }
}
