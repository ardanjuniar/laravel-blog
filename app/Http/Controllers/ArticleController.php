<?php

namespace App\Http\Controllers;

use App\Article;
use App\Categori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categori::all();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png|max:1048',
            'categori' => 'required',
            'body' => 'required',
        ]);

        $gambar = $request->file('gambar')->store('article');

        Article::create([
            'judul' => Str::slug($request->judul, '-'),
            'body' => $request->body,
            'gambar' => $gambar,
            'categories_id' => $request->categori,
        ]);

        return redirect()->route('article.index')->with('success', 'Data artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('article.detail', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categori::all();
        $article = Article::find($id);

        return view('article.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);

        $request->validate([
            'judul' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png|max:1048',
            'categori' => 'required',
            'body' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $data = [
                'judul' => Str::slug($request->judul, '-'),
                'body' => $request->body,
                'gambar' => $request->file('gambar')->store('article'),
                'categories_id' => $request->categori,
            ];

            Storage::delete($article->gambar);
            $article->update($data);
        } else {
            $gambar_lama = $request->gambar_lama;

            $data = [
                'judul' => Str::slug($request->judul, '-'),
                'body' => $request->body,
                'gambar' => $gambar_lama,
                'categories_id' => $request->categori,
            ];

            $article->update($data);
        }

        return redirect()->route('article.index')->with('success', 'Data artikel berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        Storage::delete($article->gambar);
        $article->delete();

        return redirect()->route('article.index')->with('success', 'Data artikel berhasil dihapus');
    }
}
