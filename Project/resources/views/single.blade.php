@extends('layouts.app')

@section('content')
    <main class="content" style="transform: none;">
        <div class="container" style="transform: none;">
            <div class="blog-posts-content" style="transform: none;">
                <nav aria-label="breadcrumb" class="breadcrumb-nav mt-3">
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="/">صفحه نخست</a></li>
                        <li class="breadcrumb-item active" aria-current="page">مقالات</li>
                    </ol>
                </nav>
                <div class="row" style="transform: none;">
                    <div class="col-lg-9 col-md-9 col-xs-12">
                        <article class="post-wrapper">
                            <div class="blog-top">
                                <div class="blog-icon">
                                    <i class="fal fa-rss"></i>
                                </div>
                                <h1 class="blog-title">{{ $article->title }}</h1>
                            </div>

                            <div class="col-12 text-center post-wrapper-img py-3">
                                <img src="{{ $article->src }}" alt="{{ $article->title }}">

                            </div>
                            <div class="entry-content">
                                <p>
                                    {!! $article->text !!}
                                </p>
                            </div>

                            <div class="blog-bottom">
                                <div class="meta-items">
                                    <i class="fal fa-user"></i>
                                    مدیر سایت
                                </div>
                                <div class="meta-items">
                                    <i class="fal fa-clock"></i>
                                    <time> {{ $article->date }} </time>
                                </div>
                                <div class="blog-social">
                                    <i class="fal fa-share-alt"></i>
                                    <div class="blog-socials">
                                        <ul>
                                            <li class="social-item">
                                                <a href="#"><i class="fab fa-facebook"></i></a>
                                            </li>
                                            <li class="social-item">
                                                <a href="#"><i class="fab fa-fab fa-twitter"></i></a>
                                            </li>
                                            <li class="social-item">
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li class="social-item">
                                                <a href="#"><i class="fab fa-telegram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12 sticky-sidebar"
                        style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">


                        <div class="theiaStickySidebar"
                            style="padding-top: 1px; padding-bottom: 1px; position: static; transform: none;">

                            <div class="recent-comments">
                                <div class="widget-title">
                                    مطالب پیشنهادی
                                </div>
                                <div class="widget-content">

                                    @foreach (App\Models\Article::whereNotIn('id',[$article->id])->inRandomOrder()->limit(5)->get() as $item)
                                        <div class="post-with-thumb">
                                            <div class="post-thumb-img">
                                                <a href="{{route('articles.single',$item->id)}}">
                                                    <img src="{{$item->src}}" class="img-fluid"
                                                        alt="{{$item->title}}">
                                                </a>
                                            </div>
                                            <div class="inner">{{$item->title}}</div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
