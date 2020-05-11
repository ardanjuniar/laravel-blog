<?php

namespace App\Http\Controllers;

use App\Categori;
use Illuminate\Http\Request;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categori::latest()->get();
        return view('categori.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categori.create');
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
            'nama_kategori' => 'required',
            'slug' => 'required',
        ]);

        Categori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => $request->slug
        ]);

        return redirect()->route('categori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categori = Categori::find($id);
        return view('categori.edit', compact('categori'));
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
        $request->validate([
            'nama_kategori' => 'required',
            'slug' => 'required',
        ]);

        Categori::where('id', $id)->update([
            'nama_kategori' => $request->nama_kategori,
            'slug' => $request->slug,
        ]);

        return redirect()->route('categori.index')->with('success', 'Kategori berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categori = Categori::find($id);
        $categori->delete();

        return redirect()->route('categori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
