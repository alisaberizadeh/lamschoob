@extends('layouts.app')

@section('content')
<main class="content">
    <div class="container">
        <div class="faq">
            <div class="product-heading">
                <div class="title">
                    <i class="fal fa-compress"></i>  سوالات متداول    
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                
                @foreach (App\Models\Question::orderBy("id", "DESC")->get() as $item)
                    <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-right collapsed" type="button" data-toggle="collapse" data-target="#collapse_{{$item->id}}" aria-expanded="false" aria-controls="collapseTwo">
                                {{$item->title}}
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_{{$item->id}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
                        <div class="card-body">
                            {{$item->text}}
                        </div>
                    </div>
                </div>
                 
                @endforeach

                
            </div>
        </div>
    </div>
</main>
@endsection
