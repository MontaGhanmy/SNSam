@extends('layouts.home')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <div class="menu-bar navbar navbar-toggleable-lg navbar-inverse primary-on-scroll">
           <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="fa fa-bars navbar-toggle-icon"></span>
           </button>
           <div class="navbar-collapse collapse" id="navbarSupportedContent">
             @include('layouts.menu', $menu)
           </div>
       </div>
     </div>
   </div>
 </div>
<div id="Carousel" class="carousel slide banner-carousel" data-ride="carousel" data-interval="2500">
  <ol class="carousel-indicators">
  <li data-target="#Carousel" data-slide-to="0" class="active"></li>
  <li data-target="#Carousel" data-slide-to="1"></li>
 <li data-target="#Carousel" data-slide-to="2"></li>
<li data-target="#Carousel" data-slide-to="3"></li>
<li data-target="#Carousel" data-slide-to="4"></li>
<li data-target="#Carousel" data-slide-to="5"></li>
</ol>
               <div class="carousel-inner" role="listbox">
                   <div class="carousel-item active">
                     <div class="tp-dottedoverlay"></div>
                       <div class="second-slide" style="background: url('/slider/background-1.jpg') no-repeat;background-size:cover;height:100%;width:100%">
                         <div class="carousel-caption d-none d-md-block">
                           <h4>SANOFI MEDICAL EDUCATION DIGITAL INITIATIVE Program</h4>
                        </div>
                   </div>
               </div>
           <div class="carousel-item">
               <div class="third-slide" style="background: url('/slider/background-3.jpg') no-repeat;background-size:cover;height:100%;width:100%">
           </div>
       </div>
<div class="carousel-item">
               <div class="third-slide" style="background: url('https://i.imgur.com/CySmRWc.png') no-repeat;background-size:cover;height:100%;width:100%">
           </div>

</div>

<div class="carousel-item">
               <div class="third-slide" style="background: url('https://i.imgur.com/kxh71Dp.png') no-repeat;background-size:cover;height:100%;width:100%">
           </div>

</div>    

<div class="carousel-item">
               <div class="third-slide" style="background: url('https://i.imgur.com/rgLf9g2.png') no-repeat;background-size:cover;height:100%;width:100%">
           </div>

</div>

    
<div class="carousel-item">
               <div class="third-slide" style="background: url('https://i.imgur.com/Ayv6Pjv.png') no-repeat;background-size:cover;height:100%;width:100%">
           </div>

</div>


           </div>
           <a class="carousel-control-prev" href="#Carousel" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Précédent</span>
</a>
<a class="carousel-control-next" href="#Carousel" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Suivant</span>
</a>
         </div>

              <section class="cards-section">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                        <h2 class="text-center title">Articles les plus récents</h2>
                      </div>
                      @foreach ($latest as $item)
                        <div class="col-lg-3 col-md-4 col-sm-12 mb-2">
                            <div class="card card-shadow">
                            	<div class="card-img-top" style="background:url('{{ asset($item->getFirstMedia('banner')->getUrl())}}') no-repeat center center;background-size: cover;height:340px;width:100%"></div>
                            	<div class="card-block">
                                <span class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i><small> {{$item->created_at ? $item->created_at->format('d/m/Y') : null}}</small></span>
                            		<h4 class="card-title">{{$item->title}}</h4>
                            		<p class="card-text">{{$item->summary}}</p>
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
                                  <span class="float-right"><i class="fa fa-tags" aria-hidden="true"></i> <small><a href="/{{str_replace('article-','article/',$item->category->slug)}}">{{$item->category->name}}</a></small></span>
                              </div>
                            </div>
                        </div>
                         @endforeach
                            <div class="col-md-12">
                              <h2 class="text-center title">Les prochains Rendez-vous</h2>
                            </div>
                            @foreach ($events as $item)
                              <div class="col-lg-3 col-md-4 col-sm-12 mb-2">
                                  <div class="card card-shadow">
                                   <div class="card-img-top" style="background:url('{{ asset($item->getFirstMedia('banner')->getUrl())}}') no-repeat center center;background-size: cover;height:340px;width:100%"></div>
                                   <div class="card-block">
                                      <span class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i><small> {{$item->from ? $item->from->format('Y-m-d') : null}} {{$item->to ? $item->to->format('Y-m-d') : null}}</small></span>
                                     <h4 class="card-title">{{$item->title}}</h4>
                                     <p class="card-text">{{$item->summary}}</p>
               @if(explode('-' ,$item->category->slug)[0] === 'video')
                                                      <a href="/video/{{$item->slug}}" class="btn btn-primary btn-sm btn-more">Voir plus &raquo;</a>
               @else
                                       <a href="/post/{{$item->slug}}" class="btn btn-primary btn-sm btn-more">Lire la suite &raquo;</a>
                                              @endif
                                   </div>
                                  </div>
                              </div>
                               @endforeach

                    </div>
                </div>
            </section>
            <script>
            function urlBase64ToUint8Array(base64String) {
  var padding = '='.repeat((4 - base64String.length % 4) % 4);
  var base64 = (base64String + padding)
    .replace(/\-/g, '+')
    .replace(/_/g, '/');

  var rawData = window.atob(base64);
  var outputArray = new Uint8Array(rawData.length);

  for (var i = 0; i < rawData.length; ++i) {
    outputArray[i] = rawData.charCodeAt(i);
  }
  return outputArray;
}
navigator.serviceWorker.register('ServiceWorker.js')
  .then(function (registration) {
    return registration.pushManager.getSubscription()
      .then(function (subscription) {
        if (subscription) {
          return;
        } else {
          return registration.pushManager.subscribe({
      userVisibleOnly: true,
      applicationServerKey: urlBase64ToUint8Array('BM61JDhT7ZS8AgUrZoKCJTw7bc5gyf_X9ILxL9SPguLcJwLIrEeUKw44wmKz5zjumHiKdnDy67yysbSYtfBQjLA'),
    })
    .then(function (subscription) {
      var sub = subscription.toJSON();
      $.post('/api/webpush', {
        endpoint: subscription.endpoint,
        auth: sub.keys.auth,
        p256dh: sub.keys.p256dh,
      } );
    });
        }
      });
  });
</script>
@endsection
