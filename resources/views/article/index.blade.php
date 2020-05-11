@extends('layouts.app')

@push('customcss')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush

@section('title', 'Articles')
@section('page-title', 'Articles');

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Sukses</h4>
    {{ session('success') }}
</div>
@endif


<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-fw fa-pencil"></i> Articles</h3>

        <div class="box-tools pull-right">
            <a href="{{ route('article.create') }}" class="btn btn-sm btn-flat btn-primary">Tambah Artikel</a>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responisve">
            <table class="table table-striped" id="tableArticle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Cateogri</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $article->judul }}</td>
                        <td>{{ $article->categori->nama_kategori }}</td>
                        <td>
                            <a href="{{ route('article.show', $article->id) }}" class="btn btn-sm btn-info btn-flat"><i
                                    class="fa fa-fw fa-eye"></i> Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@push('customscript')
<script src="{{ asset('vendor/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
@endpush
@push('myscript')
<script>
    $(function () {
        $('#tableArticle').DataTable()
    })

</script>
@endpush
@endsection
