@extends('templateclient.layouts.app')
    @section('content')

        <section class="section-content padding-y">
            <div class="container">
                <div class="row">
                    <aside class="col-md-3">
                        <ul class="list-group">
                            <a class="list-group-item active" href="{{route('moncompte')}}"> Mon compte  </a>
                            <a class="list-group-item" href="{{route('commandes')}}"> Mes commandes </a>
                            <a class="list-group-item" href="{{route('favoris')}}"> Mes favoris </a>
                            <a class="list-group-item" href="{{route('profile')}}"> Mon profile </a>
                        </ul>
                        <p class="mt-4">
                            <a class="btn btn-light btn-block" href="#">
                                <i class="fa fa-power-off"></i>
                                <span class="text">Déconnexion</span>
                            </a>
                        </p>
                    </aside>
                    <main class="col-md-9">
                        <article class="card mb-3">
                            <div class="card-body">
                                <figure class="icontext">
                                    <div class="icon">
                                        <img class="rounded-circle img-sm border" 
                                        src="{{ asset('storage/' . $user->photo) }}">
                                    </div>
                                    <div class="text">
                                        <p class="mb-2">
                                            <strong>{{-- {{$user->nom}} --}} {{$user->prenom}}</strong> <br>
                                            {{$user->email}}
                                        </p>
                                        <a href="{{route('profile')}}">Modifier <i class="fa fa-pen" style="font-size: .7em"></i></a>
                                    </div>
                                </figure>
                                <hr>
                                <p>
                                    <i class="fa fa-map-marker text-muted"></i> &nbsp;
                                    {{$user->adresse}}, {{$user->telephone}} 
                                </p>
                                <article class="card-group">
                                    <figure class="card bg">
                                        <div class="p-3">
                                            <h5 class="card-title">{{Auth()->user()->commandes->count()}}</h5>
                                            <span>Commandes</span>
                                        </div>
                                    </figure>
                                    <figure class="card bg">
                                        <div class="p-3">
                                            <h5 class="card-title">{{Auth()->user()->commandes->where('statut', 'Livré')->count()}}</h5>


                                            <span>Commandes livrées</span>
                                        </div>
                                    </figure>
                                    <figure class="card bg">
                                        <div class="p-3">
                                            <h5 class="card-title">{{Auth()->user()->commandes->where('statut', 'En cours')->count()}}</h5>
                                            <span>Commandes en cours</span>
                                        </div>
                                    </figure>
                                    <figure class="card bg">
                                        <div class="p-3">
                                            <h5 class="card-title">25</h5>
                                            <span>Favoris</span>
                                        </div>
                                    </figure>
                                </article>
                            </div>
                        </article>
                        <article class="card  mb-3">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Favoris </h5>

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
                                                    <a href="" class="btn btn-primary ml-1">
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
                                <a href="{{route('favoris')}}" class="btn btn-outline-primary"> Tous mes favoris </a>
                            </div>
                        </article>
                    </main>
                </div>
            </div>
        </section>
    
    @endsection
