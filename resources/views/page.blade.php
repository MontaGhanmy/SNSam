@extends('layouts.header')

@section('content')
<section class="content-section mt-20 mb-20 pt-2">
                <div class="container">

                    <div class="row">
                        <div class="col">

                            <div class="card">
                            	<div class="card-block">
									<h1 class="card-title text-center page-title-heading">{{$page->title}}</h1>
									<h6 class="card-subtitle mb-2 text-muted mb-4">Dernière màj: {{$page->updated_at ? $page->updated_at->format('d/m/Y') : null}}</h6>

									<p class="card-text">
                      <?php echo $page->body; ?>
								</div>
                            </div>
                            <!-- /.card -->

                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->
            </section>
@endsection
