<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="{{settings('description')}}">
  <title>{{ settings('title') }}</title>
  <link href="/favicon.png" type="image/png" rel="shortcut icon" />
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" media="screen">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" media="screen">
  <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}" media="screen">
  <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" media="screen">
  <link rel="stylesheet" href="{{ asset('css/main.min.css') }}" media="screen">
  <script async src="https://www.googletagmanager.com/gtag/js?id={{ settings('ga_code') }}"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '{{ settings('ga_code') }}');
  </script>
</head>

<body class="wide">

  <div class="main-wrapper">
    <div class="main-wrapper-inner">
      <nav class="navbar navbar-toggleable-lg bg-white">
        <a class="navbar-brand" href="http://www.sanofi.ma/" target="_blank">
                    <img src="{{asset('img/logo-top-right.png')}}" height="50" alt="SANOFI">
                    <p class="header-text">Ce site est destiné aux professionnels de la santé marocains</p>
		    <img src="{{asset('img/logo-top-left.png')}}" class="header-image-left" height="50"><p class="header-text-left">SAnofi Medical Education Digital Initiative</p>
                </a>
      </nav>
      <div class="menu-bar navbar navbar-toggleable-lg navbar-inverse primary-on-scroll">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="fa fa-bars navbar-toggle-icon"></span>
                   </button>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
          @include('layouts.menu', $menu)
        </div>
      </div>
      @yield('content')
      <footer class="st-footer bg-black">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <nav class="nav  navbar-fixed-bottom" role="navigation">
                                <div class="mx-auto text-center">
                                  <ul class="nav mx-auto ml-auto">
                                    <div class="osw-container-container-content-top"><div class="osw-container-title"><h2 class="field-title">Sanofi Maroc</h2></div><div class="osw-container-maintext field-main-text" style="font-size: 0.75rem;">Route de Rabat RP 1 Ain Sebaa 20250 Casablanca Maroc  +212 5 22 66 90 00 </div><div class="osw-container-maintext field-main-text" style="font-size: 0.75rem;">Information Medicale <a href="mailto:Informed.maroc@sanofi.com">Informed.maroc@sanofi.com</a> - Tél: 0661 23 36 99</div></div>
                                    <li class="nav-item">
                                      <a class="nav-link" href="/page/plan">Plan du site</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="/page/mentions-legales">Mentions légales</a>
                                    </li>
                                  </ul>

                                </div>
                              </nav>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/tether.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/main.min.js') }}"></script>
  <script>
  $(document).ready(function(){
    $('.searchbar a').on('click', function(){
      window.location.href = "/recherche/"+ $.trim($('.searchbar .search').val());
    });
     $('.searchbar .search').keypress(function(e){
      if(e.which == 13){
          $('.searchbar a').click();
      }
  });
  });
  </script>
</body>

</html>
