@extends('layouts.webinarvideo')
@section('content')

<div class="container-fluid blog-content">

<div class="row">
<div class='col-md-2 col-sm-2 ad'>
</div>
<div class='col-md-6 col-sm-8'>
<img src="https://i.imgur.com/4j7UTjO.png"/>
</div>
<div class='col-md-3 col-sm-2 hidden-xs ad'>
</div>


</div>



  <div class="row">
    <div class="col-md-2 hidden-md-down">
	<img style="width:100%" src="https://i.imgur.com/dBBBHk4.jpg"/>
    </div> 
    <div class="col-md-8 my-5">
      <h1 class="text-center py-3">{{ settings('live_title') }}</h1>
        <div class="embed-responsive embed-responsive-16by9">
         <iframe width="1440" height="731" src="https://www.youtube.com/embed/I7pcTqnNgrA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
<div  style="border:1px solid rgba(0,0,0,.15); width: 80%; padding: 20px 10px; margin: 20px auto;max-height: 300px; overflow-y: scroll">
  @foreach($messages as $message)
      <p style="font-size:12px; margin-bottom: 6px; line-height: 14px;"> <b> {{$message->created_at->format('H:m') }} </b> : {{ $message->message }} </p>
  @endforeach
</div>
  <div class="form-group mx-auto" style="width: 80%;margin: 10px auto !important ">
    <label>Ajouter un message</label>
    <textarea id="message" class="form-control" rows="3"></textarea>
   <button id="send" class="btn-primary btn-block">Envoyer</button>
  </div>




</div>
    <div class="col-md-2 hidden-md-down">
      <img style="width:100%"  src="https://i.imgur.com/dBBBHk4.jpg"/>
    </div>
  </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

(function( $ ) {
	  $("#send").on('click', function() {
	  var message = $("#message").val(); 
	  $.post('/message', { message : message}).then(() => { $("#message").val(''); window.location.reload() });
	});
  })(jQuery);
</script>
@endsection   
