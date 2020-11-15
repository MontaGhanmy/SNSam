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
                <a class="navbar-brand" href="https://www.sanofi.ma/" target="_blank">
                    <img src="{{asset('img/logo-top-right.png')}}" height="50" alt="SANOFI">
                    <p class="header-text">Ce site est destiné aux professionnels de la santé marocains</p>
		                <img src="{{asset('img/logo-top-left.png')}}" class="header-image-left" height="50"><p class="header-text-left">SAnofi Medical Education Digital Initiative</p>
                </a>
            </nav>

        @yield('content')
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
