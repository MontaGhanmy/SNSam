@extends('layouts.header') @section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-50 mb-50 col-md-10 mx-auto">
        <div class="card-img-top" style="background:url('{{asset($post->getFirstMedia('banner')->getUrl())}}') no-repeat center center;background-size: cover;height:340px;width:100%;z-index:5"></div>
        <div class="p">
          <h1 class="card-title black-text display-4 my-2">{{$post->title}}</h1>
        </div>
        <div class="card-block">
          <div class="entry-meta card-footer">
              <span class="posted-on meta-span">
              <small>  <i class="fa fa-calendar-check-o"></i><time class="entry-date published"> {{$post->created_at->format('d/m/Y')}}</time> </small>
              </span>
              <span class="meta-span"><i class="fa fa-tags" aria-hidden="true"></i> <small><a href="/{{str_replace('-','/',$post->category->slug)}}">{{$post->category->name}}</a></small></span>
              <span class="meta-span"><i class="fa fa-eye" aria-hidden="true"></i> <small>{{ $post->views}} Vues</small></span>
              <span class="meta-span"><i class="fa fa-user" aria-hidden="true"></i> <small> Auteur: {{$post->author->name}}  {{$post->author->surname}}</small></span>
          </div>
        @if($post->getFirstMedia('file') && $post->getFirstMedia('file')->getUrl())
        <div class="d-block mx-auto" style="height:600px">
          <iframe src="{{asset($post->getFirstMedia('file')->getUrl())}}" width="100%" height="100%">
        <a href="{{asset($post->getFirstMedia('file')->getUrl())}}">Télécharger Document</a></iframe>
        </div>
        @endif
            <?php echo $post->body; ?>
        </div>
      </div>
    </div>

  </div>
</div>
@if($related)
<div class="container">
  <div class="row p-5 mx-auto">
    <div class="col-md-12">
      <h2 class="text-center title display-5">Articles relatifs</h2>
    </div>
@foreach ($related as $item)
  <div class="col-md-4 mb-2 mx-auto my-5">
      <div class="card card-shadow">
        <div class="card-img-top" style="background:url('{{$item->getFirstMedia('banner')->getUrl()}}') no-repeat center center;background-size: cover;height:340px;width:100%"></div>
        <div class="card-block">
          <span class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i><small> {{$item->created_at->format('d/m/Y')}}</small></span>
          <h4 class="card-title">{{$item->title}}</h4>
          <p class="card-text">{{$item->content}}</p>
@if(explode('-' ,$item->category->slug)[0] === 'video')
                          <a href="/video/{{$item->slug}}" class="btn btn-primary btn-sm btn-more">Voir plus &raquo;</a>
@else
@if(strpos($item->slug,'ttps'))
                      <a href="{{$item->slug}}" class="btn btn-primary btn-sm btn-more">Lire la suite &raquo;</a>
                              @else
                      <a href="/post/{{$item->slug}}" class="btn btn-primary btn-sm btn-more">Lire la suite &raquo;</a>
@endif
                  @endif
        </div>
        <div class="card-footer">
            <span class="float-right"><i class="fa fa-tags" aria-hidden="true"></i> <small><a href="/{{str_replace('-','/',$item->category->slug)}}">{{$item->category->name}}</a></small></span>
        </div>
      </div>
  </div>
   @endforeach
 </div>
 </div>
 @endif
@endsection
