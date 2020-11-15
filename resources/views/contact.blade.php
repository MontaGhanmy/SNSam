@extends('layouts.header')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <div class="card mb-50 pb-50 pt-50 mt-50">
        <div class="card-block">
          <h4 class="card-title">Nous contacter</h4>

          <p class="card-text pt-20 pb-20">Merci d'utiliser ce formulaire afin de nous envoyer toute question relative à la plateforme SAMEDI Program</p>

          <form action="/sendmessage" method="post" class="row">
            {{ csrf_field() }}
            <div class="col-md-12">
              <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" placeholder="Votre nom complet" required="">
              </div>
              <div class="form-group">
                <label for="email1">Adresse email</label>
                <input type="email" class="form-control" id="email1" placeholder="Votre adresse email" required="">
              </div>
              <div class="form-group">
                <label for="contact">Numéro de téléphone</label>
                <input type="text" class="form-control" id="contact" placeholder="Votre numéro">
              </div>
            </div>
            <!-- /.col-md-6 -->
            <div class="col-md-12">
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="7" placeholder="Entrez votre message ici..."></textarea>
              </div>
              <div class="text-right">
                <button id="button" type="submit" class="btn btn-success pl-4 pr-4">Envoyer le message</button>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </form>
    </div>

  </div>
  <!-- /.row -->
</div>
</div>
<!-- /.card -->

</div>
</div>
</div>
@endsection
