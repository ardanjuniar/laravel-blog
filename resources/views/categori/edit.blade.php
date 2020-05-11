@extends('layouts.app')

@section('title', 'Edit Categori')

@section('page-title', 'Edit Categori')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-fw fa-edit"></i> Edit Categori</h3>
            </div>
            <div class="box-body">
                <form action="{{ route('categori.update', $categori->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group @error('nama_kategori') {{'has-error'}} @enderror">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" id="nama_kategori"
                            placeholder="Nama Kategori" autocomplete="off" value="{{ $categori->nama_kategori }}">
                        @error('nama_kategori') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group @error('slug') {{'has-error'}} @enderror">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug"
                            autocomplete="off" value="{{ $categori->slug }}">
                        @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-edit"></i> Edit
                        Kategori</button>
                    <a href="{{ route('categori.index') }}" class="btn btn-warning"><i
                            class="fa fa-fw fa-arrow-left"></i> Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
