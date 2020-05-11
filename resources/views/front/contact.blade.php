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
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <ul class="page-header-breadcrumb">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Contact</li>
                </ul>
                <h1>Contact</h1>
            </div>
        </div>
    </div>
</div>
<!-- /Page Header -->


<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-6">
                <div class="section-row">
                    <h3>Contact Information</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <ul class="list-style">
                        <li>
                            <p><strong>Email:</strong>
                                <a href="#">
                                    <span class="__cf_email__"
                                        data-cfemail="93c4f6f1fef2f4d3f6fef2faffbdf0fcfe">ardanjuniar3@gmail.com
                                    </span>
                                </a>
                            </p>
                        </li>
                        <li>
                            <p><strong>Phone:</strong> 0895-3307-22628</p>
                        </li>
                        <li>
                            <p><strong>Address:</strong> Jl. Sukamulya 1, Serua Indah, Ciputat</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <div class="section-row">
                    <h3>Send A Message</h3>
                    <ul class="footer-social">
                        <li>
                            <a href="https://www.facebook.com/ardanjuniar.7" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=62895330722628&text=Hello Ardan"
                                target="_blank"><i class="fa fa-whatsapp"></i></a>
                        </li>
                        <li>
                            <a href="https://t.me/ardanjuniar" target="_blank"><i class="fa fa-telegram"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/dannjr1806" target="_blank"><i
                                    class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
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
            <li class="">
                <a href="{{ route('article.categori', $categori->slug) }}">{{ $categori->nama_kategori }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endpush
@endsection
