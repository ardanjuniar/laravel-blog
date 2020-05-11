@extends('layouts.app')

@push('customcss')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endpush

@section('title', 'Edit Artikel')
@section('page-title', 'Edit Artikel')

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-fw fa-plus"></i> Edit Artikel</h3>
    </div>
    <div class="box-body">
        <form action="{{ route('article.update', $article->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group @error('judul') {{'has-error'}} @enderror">
                <label for="judul">Judul Artikel</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul"
                    autocomplete="off" value="{{ $article->judul }}">
                @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group @error('gambar') {{'has-error'}} @enderror">
                <label for="gambar">Gambar</label>
                <input type="hidden" name="gambar_lama" value="{{ $article->gambar }}">
                <br>
                <img src="{{ asset('uploads/' . $article->gambar) }}" alt="Gambar Artikel" width="200">
                <br>
                <br>
                <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Masukkan Gambar"
                    autocomplete="off" value="{{ old('gambar') }}">
                @error('gambar') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group @error('categori') {{'has-error'}} @enderror">
                <label for="categori">Categori</label>
                <select class="form-control" name="categori" id="categori">
                    <option value="">-- Pilih Categori --</option>
                    @foreach ($categories as $categori)
                    <option value="{{ $categori->id }}"
                        {{ $article->categories_id == $categori->id ? 'selected' : '' }}>
                        {{ $categori->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('categori') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group @error('body') {{'has-error'}} @enderror">
                <label for="body">Body</label>
                <textarea class="textarea" placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                    name="body" id="body">{{ $article->body }}</textarea>
                @error('body') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <a href="{{ route('article.show', $article->id) }}"><i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
            <div class="pull-right">
                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-fw fa-edit"></i> Update
                    Artikel</button>
            </div>
        </form>
    </div>
</div>
@push('customscript')
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
@endpush
@push('myscript')
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        // CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })

</script>
@endpush
@endsection
