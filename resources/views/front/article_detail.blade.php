@extends('templates.app')
@section('content')

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Post content -->
            <div class="col-md-8">
                <div class="section-row sticky-container">
                    <div class="main-post">
                        <h3>{{ $article->judul }}</h3>
                        <figure class="figure-img">
                            <img class="img-responsive" src="{{asset('uploads/' . $article->gambar)}}"
                                alt="Gambar Artikel" height="700" width="700">
                            <figcaption><i class="fa fa-tags"></i> {{ $article->categori->nama_kategori }}</figcaption>
                        </figure>
                        <div class="text-justify">
                            {!! $article->body !!}
                        </div>
                    </div>
                    <div class="post-shares sticky-shares">
                        <a href="https://www.facebook.com/ardanjuniar.7" class="share-facebook" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                        <a href="https://www.instagram.com/dannjr1806" class="share-pinterest" target="_blank"><i
                                class="fa fa-instagram"></i></a>
                        <a href="https://t.me/ardanjuniar" class="share-facebook" target="_blank"><i
                                class="fa fa-telegram"></i></a>
                        <a href="mailto:ardanjuniar3@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a>
                    </div>
                </div>
            </div>
            <!-- /Post content -->

            <!-- aside -->
            <div class="col-md-4">
                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Featured Posts</h2>
                    </div>

                    @foreach ($articleterkait as $terkait)
                    <div class="post post-thumb">
                        <a class="post-img" href="{{ route('article.detail', $terkait->judul) }}">
                            <img src="{{asset('uploads/' . $terkait->gambar)}}" alt="Gambar Artikel" height="250">
                        </a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-3" href="">{{ $terkait->categori->nama_kategori }}</a>
                                <span class="post-date">{{ $terkait->created_at->diffForHumans() }}</span>
                            </div>
                            <h3 class="post-title"><a
                                    href="{{ route('article.detail', $terkait->judul) }}">{{ $terkait->judul }}</a>
                            </h3>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /post widget -->

                <!-- catagories -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Catagories</h2>
                    </div>
                    <div class="category-widget">
                        <ul>
                            @foreach ($categories as $categori)
                            <li>
                                <a href="{{ route('article.categori', $categori->slug) }}" class="cat-4">
                                    {{ strtoupper($categori->nama_kategori) }}<span>{{ $categori->article_count }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /catagories -->
            </div>
            <!-- /aside -->
        </div>
        <!-- /row -->
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
            <li><a href="{{ route('article.categori', $categori->slug) }}">{{ $categori->nama_kategori }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
@endpush

@endsection
