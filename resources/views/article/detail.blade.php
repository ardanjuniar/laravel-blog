@extends('layouts.app')

@section('title', 'Detail Artikel')
@section('page-title', 'Detail Artikel')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="img-responsive img-fluid" src="{{ asset('uploads/' . $article->gambar) }}"
                    alt="User profile picture" width="1000">

                <h3 class="profile-username">{{ $article->judul }}</h3>

                <p class="text-muted"><i class="fa fa-fw fa-tags"></i> {{ $article->categori->nama_kategori }}</p>

                <p class="card-text">{!! $article->body !!}</p>

                <a href="{{ route('article.index') }}" class="card-link"><i class="fa fa-fw fa-arrow-left"></i>
                    Kembali</a>

                <div class="pull-right">
                    <a href="{{ route('article.edit', $article->id) }}" class="btn btn-success btn-flat"><i
                            class="fa fa-fw fa-edit"></i> Edit</a>
                    <form action="{{ route('article.destroy', $article->id) }}" method="post" style="display: inline;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-flat"
                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');"><i
                                class="fa fa-fw fa-trash"></i>
                            Hapus</button>
                    </form>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@endsection
