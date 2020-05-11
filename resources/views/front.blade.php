@extends('templates.app')

@push('nav')
<ul class="nav-menu nav navbar-nav">
    <li class="cat-4">
        <a href="{{ route('index') }}">SEMUA ARTIKEL</a>
    </li>
    @foreach ($categories as $categori)
    <li class="cat-4">
        <a href="{{ route('article.categori', $categori->slug) }}">{{ strtoupper($categori->nama_kategori) }}</a>
    </li>
    @endforeach
</ul>
@endpush

@section('content')
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- post Atas -->
            @foreach ($articles as $article)
            <div class="col-md-6">
                <div class="post post-thumb">
                    <a class="post-img" href="{{ route('article.detail', $article->judul) }}"><img
                            src="{{asset('uploads/' . $article->gambar)}}" alt="" width="300" height="300"></a>
                    <div class="post-body">
                        <div class="post-meta">
                            <a class="post-category cat-2" href="">{{ $article->categori->nama_kategori }}</a>
                            <span class="post-date">{{ $article->created_at->diffForHumans() }}</span>
                        </div>
                        <h3 class="post-title"><a
                                href="{{ route('article.detail', $article->judul) }}">{{ $article->judul }}</a></h3>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /post Atas -->
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Recent Posts</h2>
                </div>
            </div>
            <div class="clearfix visible-md visible-lg"></div>
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="clearfix visible-md visible-lg"></div>

                    <!-- post Content-->
                    @foreach ($articleall as $all)
                    <div class="col-md-6">
                        <div class="post">
                            <a class="post-img" href="{{ route('article.detail', $all->judul) }}"><img
                                    src="{{asset('uploads/' . $all->gambar)}}" alt="" width="250" height="250"></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category cat-2" href="">{{ $all->categori->nama_kategori }}</a>
                                    <span class="post-date">{{ $all->created_at->diffForHumans() }}</span>
                                </div>
                                <h3 class="post-title">
                                    <a href="{{ route('article.detail', $all->judul) }}">
                                        {{ $all->judul }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /post Content -->

                    <div class="clearfix visible-md visible-lg"></div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- post widget Terkait -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Artikel Lainnya</h2>
                    </div>
                    @foreach ($articleterkait as $terkait)
                    <div class="post post-widget">
                        <a class="post-img" href="{{ route('article.detail', $terkait->judul) }}"><img
                                src="{{asset('uploads/' . $terkait->gambar)}}" alt="" width="70" height="70"></a>
                        <div class="post-body">
                            <h3 class="post-title"><a
                                    href="{{ route('article.detail', $terkait->judul) }}">{{ $terkait->judul }}</a></h3>
                            <small class="text-muted">{{ $terkait->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /row Terkait -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

@push('categoriFooter')
<div class="col-md-6">
    <div class="footer-widget">
        <h3 class="footer-title">Catagories</h3>
        <ul class="footer-links">
            @foreach ($categories as $categori)
            <li class="">
                <a href="{{ route('article.categori', $categori->slug) }}">{{ $categori->nama_kategori }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endpush

@endsection
