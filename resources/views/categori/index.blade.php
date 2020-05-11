@extends('layouts.app')

@push('customcss')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush

@section('title', 'List Categori')
@section('page-title', 'List Categori');

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
        <h3 class="box-title"><i class="fa fa-fw fa-tags"></i> List Categori</h3>

        <div class="box-tools pull-right">
            <a href="{{ route('categori.create') }}" class="btn btn-sm btn-flat btn-primary">Tambah Data</a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-striped" id="tableCategori">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $categori)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $categori->nama_kategori }}</td>
                        <td>{{ $categori->slug }}</td>
                        <td>
                            <a href="{{ route('categori.edit', $categori->id) }}"
                                class="btn btn-sm btn-success btn-flat"><i class="fa fa-fw fa-edit"></i> Edit</a>
                            <form action="{{ route('categori.destroy', $categori->id) }}" style="display: inline"
                                method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-flat btn-danger"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i
                                        class="fa fa-fw fa-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
</div>

@push('customscript')
<script src="{{ asset('vendor/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
@endpush
@push('myscript')
<script>
    $(function () {
        $('#tableCategori').DataTable()
    })

</script>
@endpush
@endsection
