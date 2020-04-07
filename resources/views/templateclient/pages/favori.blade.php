@extends('templateclient.layouts.app', ['title' => 'Mes favoris'])
@section('content')
    <section class="section-content padding-y">
        <div class="container">
            <div class="row">
                <aside class="col-md-3">
                    <ul class="list-group">
                        <a class="list-group-item active" href="{{route('moncompte')}}"> Mon compte  </a>
                            <a class="list-group-item" href="{{route('commandes')}}"> Mes commandes </a>
                            <a class="list-group-item" href="{{route('favoris')}}"> Mes favoris </a>
                            <a class="list-group-item" href="{{route('profile')}}"> Mon profil </a>
                    </ul>
                    <p class="mt-4">
                        <a class="btn btn-light btn-block" href="#">
                            <i class="fa fa-power-off"></i>
                            <span class="text">Déconnexion</span>
                        </a>
                    </p>
                </aside>
                <main class="col-md-9">
                    <article class="card  mb-3">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Mes favoris </h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <figure class="itemside  mb-3">
                                        <div class="aside"><img src="images/items/1.jpg" class="border img-sm"></div>
                                        <div class="">
                                            <div>
                                                <a href="#" class="btn btn-primary ml-1">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="mt-1 ml-1">
                                                <a href="#" class="btn btn-outline-danger ml-1">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <div class="col-md-3">
                                    <figure class="itemside  mb-3">
                                        <div class="aside"><img src="images/items/2.jpg" class="border img-sm"></div>
                                        <div class="">
                                            <div>
                                                <a href="#" class="btn btn-primary ml-1">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="mt-1 ml-1">
                                                <a href="#" class="btn btn-outline-danger ml-1">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <div class="col-md-3">
                                    <figure class="itemside mb-3">
                                        <div class="aside"><img src="images/items/3.jpg" class="border img-sm"></div>
                                        <div class="">
                                            <div>
                                                <a href="#" class="btn btn-primary ml-1">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="mt-1 ml-1">
                                                <a href="#" class="btn btn-outline-danger ml-1">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <div class="col-md-3">
                                    <figure class="itemside  mb-3">
                                        <div class="aside"><img src="images/items/1.jpg" class="border img-sm"></div>
                                        <div class="">
                                            <div>
                                                <a href="#" class="btn btn-primary ml-1">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="mt-1 ml-1">
                                                <a href="#" class="btn btn-outline-danger ml-1">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <div class="col-md-3">
                                    <figure class="itemside  mb-3">
                                        <div class="aside"><img src="images/items/2.jpg" class="border img-sm"></div>
                                        <div class="">
                                            <div>
                                                <a href="#" class="btn btn-primary ml-1">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="mt-1 ml-1">
                                                <a href="#" class="btn btn-outline-danger ml-1">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <div class="col-md-3">
                                    <figure class="itemside mb-3">
                                        <div class="aside"><img src="images/items/3.jpg" class="border img-sm"></div>
                                        <div class="">
                                            <div>
                                                <a href="#" class="btn btn-primary ml-1">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="mt-1 ml-1">
                                                <a href="#" class="btn btn-outline-danger ml-1">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <div class="col-md-3">
                                    <figure class="itemside  mb-3">
                                        <div class="aside"><img src="images/items/1.jpg" class="border img-sm"></div>
                                        <div class="">
                                            <div>
                                                <a href="#" class="btn btn-primary ml-1">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="mt-1 ml-1">
                                                <a href="#" class="btn btn-outline-danger ml-1">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <div class="col-md-3">
                                    <figure class="itemside  mb-3">
                                        <div class="aside"><img src="images/items/2.jpg" class="border img-sm"></div>
                                        <div class="">
                                            <div>
                                                <a href="#" class="btn btn-primary ml-1">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="mt-1 ml-1">
                                                <a href="#" class="btn btn-outline-danger ml-1">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <div class="col-md-3">
                                    <figure class="itemside mb-3">
                                        <div class="aside"><img src="images/items/3.jpg" class="border img-sm"></div>
                                        <div class="">
                                            <div>
                                                <a href="#" class="btn btn-primary ml-1">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="mt-1 ml-1">
                                                <a href="#" class="btn btn-outline-danger ml-1">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <div class="col-md-3">
                                    <figure class="itemside  mb-3">
                                        <div class="aside"><img src="images/items/1.jpg" class="border img-sm"></div>
                                        <div class="">
                                            <div>
                                                <a href="#" class="btn btn-primary ml-1">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="mt-1 ml-1">
                                                <a href="#" class="btn btn-outline-danger ml-1">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <div class="col-md-3">
                                    <figure class="itemside  mb-3">
                                        <div class="aside"><img src="images/items/2.jpg" class="border img-sm"></div>
                                        <div class="">
                                            <div>
                                                <a href="#" class="btn btn-primary ml-1">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="mt-1 ml-1">
                                                <a href="#" class="btn btn-outline-danger ml-1">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <div class="col-md-3">
                                    <figure class="itemside mb-3">
                                        <div class="aside"><img src="images/items/3.jpg" class="border img-sm"></div>
                                        <div class="">
                                            <div>
                                                <a href="#" class="btn btn-primary ml-1">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="mt-1 ml-1">
                                                <a href="#" class="btn btn-outline-danger ml-1">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </article>
                </main>
            </div>
        </div>
    </section>
@endsection
    