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
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
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
      <div class="hidden-xs col-sm-8 col-md-9">
          <div class="clearfix">
              <div class="col-sm-12 col-md-10 col-md-offset-2">
                  <div class="logo-title-container">
                  </div>
              </div>
          </div>
      </div>

        <div class="col-xs-12 col-sm-4 col-md-3 login-sidebar animated fadeIn">
          <p align="center">
            <img src="{{ asset('img/logo-top-left.png')}}" id="login-logo"/>
          </p>
            <div class="login-container animated fadeIn">

              @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @else
              <h2>Réinitialiser le mot de passe:</h2>
             @endif
                <form  method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{$token}}">
                    <div class="group">
                      <input type="text" name="email" value="{{ $email ?? old('email') }}" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label><i class="glyphicon glyphicon-user"></i><span class="span-input"> Adresse email</span></label>
                    </div>

                    <div class="group">
                      <input type="password" name="password" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label><i class="glyphicon glyphicon-lock"></i><span class="span-input"> Mot de passe</span></label>
                    </div>
                    <div class="group">
                      <input type="password" name="password_confirmation" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label><i class="glyphicon glyphicon-lock"></i><span class="span-input">Confirmer le mot de passe</span></label>
                    </div>

                          <button type="submit" class="btn btn-block login-button">
                              <span class="signingin hidden"><span class="glyphicon glyphicon-refresh"></span> Réinitialisation du mot de passe...</span>
                              <span class="signin">Réinitialiser</span>
                          </button>
                          <div class="col-md-1 col-md-offset-4">


                        </div>
                    </div>
                </form>

              @if(!$errors->isEmpty())
              <div class="alert alert-danger d-block">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
              </div>
              @endif

            </div> <!-- .login-container -->

        </div> <!-- .login-sidebar -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
<script>
    var btn = document.querySelector('button[type="submit"]');
    var form = document.forms[0];
    btn.addEventListener('click', function(ev){
        if (form.checkValidity()) {
            btn.querySelector('.signingin').className = 'signingin';
            btn.querySelector('.signin').className = 'signin hidden';
        } else {
            ev.preventDefault();
        }
    });
</script>
</body>
</html>
