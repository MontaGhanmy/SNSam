<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="{{settings('description')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ settings('title') }}</title>
    <link href="/favicon.png" type="image/png" rel="shortcut icon" />
    <link rel="stylesheet" href="{{ asset('css/login.min.css') }}">
    <style>
        body {
            background-image:url('{{ asset('img/bg-auth.png') }}');
            background-color: #FFF
        }
        .login-button, .bar:before, .bar:after{
            background:#154c93
        }

    </style>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ settings('ga_code') }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '{{ settings('ga_code') }}');
    </script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
      <div class="hidden-xs col-sm-6 col-md-7">
          <div class="clearfix">
              <div class="col-sm-12 col-md-10 col-md-offset-2">
                  <div class="logo-title-container">
                  </div> <!-- .logo-title-container -->
              </div>
          </div>
      </div>

        <div class="col-xs-12 col-sm-6 col-md-5 login-sidebar animated fadeIn">
          <p align="center">
            <img src="{{ asset('img/logo-top-left.png')}}" id="login-logo"/>
          </p>
            <div class="login-container animated fadeIn">

                <h2>Inscription:</h2>
                @if(!$errors->isEmpty())
                <div class="alert alert-danger">
                  <ul class="list-unstyled">
                      @foreach($errors->all() as $err)
                      <li>{{ $err }}</li>
                      @endforeach
                  </ul>
                </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="group{{ $errors->has('invitation_code') ? ' has-error' : '' }}">
                      <input type="text" name="invitation_code"  value="{{ old('invitation_code') }}" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label><i class="glyphicon glyphicon-plus"></i><span class="span-input"> Code d'invitation</span></label>
                    </div>
                    <div class="group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <input type="text" name="name" value="{{ old('name') }}" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label><i class="glyphicon glyphicon-user"></i><span class="span-input"> Prénom</span></label>
                    </div>
                    <div class="group{{ $errors->has('surname') ? ' has-error' : '' }}">
                      <input type="text" name="surname" value="{{ old('surname') }}" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label><i class="glyphicon glyphicon-user"></i><span class="span-input"> Nom de famille</span></label>
                    </div>
                    <div class="group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <input type="email" name="email" value="{{ old('email') }}" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label><i class="glyphicon glyphicon-envelope"></i><span class="span-input"> Adresse email</span></label>
                    </div>
                    <div class="group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <input type="password" name="password" value="{{ old('password') }}" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label><i class="glyphicon glyphicon-log-in"></i><span class="span-input"> Mot de passe</span></label>
                      <span id="helpBlock" class="help-block">Le mot de passe doit être formé d'au moins 8 caractères dont un chiffre et un caractère spécial</span>
                    </div>
                    <div class="group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                      <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label><i class="glyphicon glyphicon-log-in"></i><span class="span-input"> Confirmer le mot de passe</span></label>
                    </div>
                    <div class="group{{ $errors->has('phone') ? ' has-error' : '' }}">
                      <input type="text" name="phone" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label><i class="glyphicon glyphicon-phone"></i><span class="span-input"> Numéro de téléphone</span></label>
                      <span id="helpBlock" class="help-block">Veuillez saisir votre numéro de téléphone à 10 chiffres. Exemple: 05223-56050</span>
                    </div>
                    <div class="group{{ $errors->has('college_code') ? ' has-error' : '' }}">
                      <input type="text" name="college_code" value="{{ old('college_code') }}" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label><i class="glyphicon glyphicon-plus"></i><span class="span-input"> Numéro de l'ordre des médecins</span></label>
                      <span id="helpBlock" class="help-block">Veuillez saisir votre numéro de l'ordre des médecins à 5 chiffres</span>
                    </div>
                    <div class="group{{ $errors->has('photo') ? ' has-error' : '' }}">
                      <input type="file" name="photo" >
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label><i class="glyphicon glyphicon-picture"></i><span class="span-input"> Choisir une photo de profil</span></label>
                    </div>
                    <div class="form-group  {{ $errors->has('region') ? ' has-error' : '' }}">
                      <label for="region"><span class="d-block col-md-12 mb-5 span-input">Région</span></label>
                          <select class="form-control" name="region" required>
                            @foreach($regions as $region)
                            <option value="{{$region->region}}">{{$region->region}}</option>
                            @endforeach
                          </select>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                    </div>
                    <div class="form-group  {{ $errors->has('city') ? ' has-error' : '' }}">
                      <label for="city"><span class="d-block col-md-12 mb-5 span-input">Ville</span></label>
                          <select class="form-control" name="city" required>
                            @foreach($cities as $city)
                            <option value="{{$city->city}}">{{$city->city}}</option>
                            @endforeach
                          </select>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                    </div>
                    <div class="form-group {{ $errors->has('specialty') ? ' has-error' : '' }}">
                        <label for="specialty"><span class="d-block col-md-12 mb-5 span-input">Spécialité</span></label>
                          <select class="form-control" name="specialty" required>
                            @foreach($specialties as $specialty)
                            <option value="{{$specialty->specialty}}">{{$specialty->specialty}}</option>
                            @endforeach
                          </select>
                    </div>

                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="optin" name="optin" required>
                      <label class="form-check-label" for="optin"> J‘accepte de recevoir des communications de la part de Sanofi. <a href="#" data-toggle="modal" class="btn btn-link" data-target="#Disclaimer">+ de détails</a></label>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-block login-button">
                          <span class="signingin hidden"><span class="glyphicon glyphicon-refresh"></span> Inscription...</span>
                          <span class="signin">S'inscrire</span>
                      </button>
                    </div>
                </form>

                <div class="modal fade" id="Disclaimer" tabindex="-1" role="dialog" aria-labelledby="Disclaimer">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                          <p><span style="color: #7030a0;"><span><span style="font-size: medium;">Restons connect&eacute;s&nbsp;: </span></span></span></p>
                          <p><span style="color: #7030a0;"><span><br /> Dans un effort continu pour am&eacute;liorer la qualit&eacute; de ce service, Sanofi Aventis Maroc souhaite garder une trace du nombre d'interactions &agrave; distance effectu&eacute;es avec vous, ainsi que leur dur&eacute;e. </span></span></p>
                          <p><span style="color: #7030a0;"><span>De plus nous aimerions vous inviter &agrave; d&rsquo;autres interactions en ligne ou en pr&eacute;sentielles, telles que&nbsp;: </span></span></p>
                          <p><span style="color: #7030a0;"><span><strong>- R&eacute;ception r&eacute;guli&egrave;re des derni&egrave;res mises &agrave; jour et nouveaut&eacute;s scientifiques par mail</strong></span></span></p>
                          <p><span style="color: #7030a0;"><span><strong>- Invitation &agrave; nos conf&eacute;rences et formation m&eacute;dicales continues en ligne</strong></span></span></p>
                          <p><span style="color: #7030a0;"><span><strong>- Demande de RDV avec un visiteur m&eacute;dical si vous souhaitiez avoir une communication pathologie et/ou produit &agrave; distance &agrave; l&rsquo;heure qui vous convient le mieux</strong></span></span></p>
                          <p><span style="color: #7030a0;"><span><br /> Vous disposez d'un droit d'acc&egrave;s, de modification, de rectification et de suppression des donn&eacute;es qui vous concernent. Si vous d&eacute;cidez de mettre fin &agrave; votre participation ou exercez les droits susvis&eacute;s, il est important d&rsquo;en pr&eacute;venir Sanofi Aventis Maroc en contactant : &agrave; l&rsquo;adresse courriel suivante : <a href="mailto:Connect.Maroc@sanofi.com">Connect.Maroc@sanofi.com</a><br /> Tous les renseignements personnels vous concernant seront d&eacute;truits sans d&eacute;lai.<br /> <br /> </span></span><span style="color: #7030a0;"><span><span style="font-size: xx-small;"><em>CONFIDENTIALITE <br /> <br /> Sanofi Aventis Maroc est tenue d&rsquo;assurer la confidentialit&eacute; des donn&eacute;es des participants collect&eacute;s dans le cadre du projet. A cet &eacute;gard, voici les mesures qui seront appliqu&eacute;es dans le cadre du projet. <br /> <br /> &bull; Seule Sanofi Aventis Maroc aura acc&egrave;s &agrave; la liste contenant les noms, l&rsquo;adresse email, elle-m&ecirc;me conservera les donn&eacute;es et les formulaires de consentement ;<br /> &bull; Les donn&eacute;es en format num&eacute;rique seront, pour leur part, conserv&eacute;es dans des fichiers encrypt&eacute;es dont l&rsquo;acc&egrave;s sera prot&eacute;g&eacute; par l&rsquo;utilisation d&rsquo;un mot de passe en conformit&eacute; avec la r&eacute;glementation applicable.</em></span></span></span></p>
                      </div>
                    </div>
                  </div>
                </div>
            </div> <!-- .login-container -->

        </div> <!-- .login-sidebar -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/login.min.js') }}"></script>
<script>
    var btn = document.querySelector('button[type="submit"]');
    var form = document.forms[0];
    btn.addEventListener('click', function(ev){
        if (!form.checkValidity()) {
            btn.querySelector('.signin').className = 'signin hidden';
        } else {
          btn.querySelector('.signingin').className = 'signingin';
        }
    });
</script>
</body>
</html>
