@extends('layouts.header')
@section('content')
@if (count($posts) > 0)

<div class="page-title-wrapper-page page-title-wrapper-{{$posts[0]->category->slug}}">
                <div class="page-title-wrapper-inner">
                    <div class="page-title-container">
                        <div class="inner page-title mt-4">
                            <h2 class="page-title-heading">Résultats de recherche</h2>
                        </div>
                    </div>
                </div>
            </div>
<div class="container my-5">
<div class="row">
                          @foreach ($posts as $item)
                          <div class="col-md-4 mt-5">
                            <article class="card post hentry">
                                <div class="st-post-thumb">
                                    <img class="card-img-top d-block img-fluid attachment-post-thumbnail size-post-thumbnail wp-post-image img-responsive" src="{{$item->getFirstMedia('banner')->getUrl()}}">
                                </div>
                            	<div class="card-block">
                                    <header class="entry-header">
                                        <a target="_blank" href="/post/{{$item->slug}}"><h1 class="entry-title card-title">{{$item->title}}</h1></a>
                                        <div class="entry-meta">
                                            <span class="posted-on meta-span"><i class="fa fa-calendar-check-o"></i><time class="entry-date published">{{$item->created_at->format('d/m/Y')}}</time></span>
                                        </div>
                                    </header>
                            		<p class="card-text">{{$item->excerpt}}</p>
                            		<a href="/post/{{$item->slug}}" class="btn btn-secondary btn-sm bg-primary">Voir plus</a>
                            	</div>
                            </article>
                          </div>
                            @endforeach
                        {{ ($posts->links()) }}
@else

<div class="col-md-12 mt-50">
  <article class="card post hentry pt-50 pb-50 pl-50 pr-50">
    <h3 class="entry-title text-center"> Il n'y a aucun résultat pour le terme recherché</h3>
  </article>
</div>
@endif
                    </div>
                  </div>
@endsection
