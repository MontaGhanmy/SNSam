@extends('layouts.video') @section('content')
<div class="container blog-content ">
  <div class="row">
    <div class="col">
      <div class="card mb-50 mt-50">
        <div class="embed-responsive embed-responsive-16by9 rounded-top">
          <video id="player1" width="100%" height="100%" controls="controls" preload="none" class="embed-responsive-item">

          <source src="/storage/{{$post->video}}" type="video/mp4" />
          </video>        </div>
        <div class="card-img-overlay only-img rounded-top">
          <h4 class="card-title white-text">{{$post->title}}</h4>
        </div>
        <!-- /.row -->
      </div>
    </div>
  </div>
</div>
@endsection
