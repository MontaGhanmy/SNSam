@extends('layouts.header')
@section('content')
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
<div class="container">
<div class="row">
                        <div class="col-md-12 mt-50">
                          <div class="row">
                          @foreach ($posts as $item)
                          <div class="col-md-4">
                            <article class="card post hentry">
                              <div class="entry-meta post-date">
                                  <span class="posted-on meta-span"><i class="fa fa-calendar-check-o"></i><time class="entry-date published">{{$item->created_at->format('d/m/Y')}}</time></span>
                              </div>
                                <div class="st-post-thumb">
                                    <div class="card-img-top" style="background:url('{{ asset($item->getFirstMedia('banner')->getUrl()) }}') no-repeat center center;background-size: cover;height:340px;width:100%;z-index:-10"></div>
                                </div>
                            	<div class="card-block">
                                    <header class="entry-header">
                                        <a target="_blank" href="/post/{{$item->slug}}"><h1 class="entry-title card-title">{{$item->title}}</h1></a>

                                    </header>
                            		<p class="card-text">{{$item->summary}}</p>
                            		<a href="/post/{{$item->slug}}" class="btn btn-secondary btn-sm bg-primary">Voir plus</a>
                            	</div>
                            </article>
                          </div>
                            @endforeach
                          </div>
                        </div>
                        {{ ($posts->links()) }}
@else
<div class="col-md-12 mt-50">
  <article class="card post hentry pt-50 pb-50 pl-50 pr-50" style="height:70vh">
    <h3 class="entry-title text-center"> Il n'y a encore aucun article dans cette catégorie</h3>
  </article>
</div>
@endif
                    </div>
                  </div>
@endsection
