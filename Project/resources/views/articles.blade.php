@extends('layouts.app')

@section('content')
    <main class="content" style="transform: none;">
        <div class="container" style="transform: none;">
            <div class="blog-posts-content" style="transform: none;">

                <div class="row" style="transform: none;">
                    
                    <div class="col-lg-12">
                        <div class="product-heading mb-3">
                            <div class="title">
                                <i class="fal fa-box"></i> مقالات
                            </div>
                        </div>
                        <div class="block-content-wrap">
                            <div class="row">
                                
                                @foreach (App\Models\Article::orderBy("id","DESC")->get() as $item)
                                   <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="item">
                                        <div class="item-area">
                                            <div class="post-image">
                                                <a href="{{route('articles.single',$item->id)}}">
                                                    <img src="{{$item->src}}"
                                                        alt="{{$item->title}}">
                                                </a>
                                            </div>
                                            <div class="post-detail">
                                                <h3 class="post-title">
                                                    <a href="{{route('articles.single',$item->id)}}{{route('articles.single',$item->id)}}">{{$item->title}}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                @endforeach

                                
                                
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            {{-- <div class="paginationMain">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">»</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> --}}
        </div>
    </main>
@endsection
