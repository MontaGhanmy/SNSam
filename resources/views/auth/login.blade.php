@extends('layouts.webinar')
@section('content')
<div class="container-fluid webinar">
  	<div class="wrapper">
  		<form action="/login" method="post" name="Login_Form" class="form-signin">
        {{ csrf_field() }}
        <img class="img-responsive logo-webinar" src="{{asset('img/logo-top-left.png')}}" />
  		    <h3 class="form-signin-heading">Veuillez vous connecter</h3>
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
  			  <input type="email" class="form-control" name="email" placeholder="Adresse email" required="" autofocus="" />
  			  <input type="password" class="form-control mt-2" name="password" placeholder="Mot de passe" required="" autofocus=""/>

  			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Connexion</button>
          <a class="btn btn-lg btn-secondary btn-block" href="/inscription">Inscription</a>
          <a class="btn btn-lg btn-link btn-block" href="/pass/reinit">Mot de passe oublié?</a>
  		</form>
  	</div>
</div>

@endsection
