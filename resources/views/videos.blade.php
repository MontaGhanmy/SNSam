@extends('layouts.header') @section('content')
@if (count($posts) > 0)
<div class="page-title-wrapper-page page-title-wrapper-{{$posts[0]->category->slug}}">
                <div class="page-title-wrapper-inner">
                    <div class="page-title-container">
                        <div class="inner page-title mt-4">
                            <h2 class="page-title-heading">{{$posts[0]->category->name}}</h2>
                        </div>
                    </div>
                </div>
            </div>
@endif
<div class="container-fluid blog-content">
  <div class="row">
    @if (count($posts) > 0)
    <div class="col-md-12 mt-50">
      @foreach ($posts as $item)
      <div class="col-md-3 mb-4 post-video">
        <a href="/video/{{$item->slug}}" class="video-link">
          <div class="card text-center">
            <img class="card-img-top d-block img-fluid" src="{{$item->getFirstMedia('banner')->getUrl()}}" alt="Card image">
            <div class="card-block">
              <h3 class="card-title">{{$item->title}}</h3>
              <a href="/video/{{$item->slug}}" class="btn btn-sm btn-primary bg-black"><i class="icon ion-play"></i></a>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
    {{ ($posts->links()) }} @else
    <div class="col-md-12 mt-50">
      <article class="card post hentry pt-50 pb-50 pl-50 pr-50">
        <h3 class="entry-title text-center"> Il n'y a encore aucun article dans cette catégorie</h3>
      </article>
    </div>
    @endif
  </div>
</div>
@endsection
