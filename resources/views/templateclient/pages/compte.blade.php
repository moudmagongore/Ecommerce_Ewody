@extends('templateclient.layouts.app', ['title' => 'Mon compte'])
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
                            <a class="btn btn-light btn-block" href="{{ route('deconnexion') }}">
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
                                        src="{{ asset('uploads/' . $user->photo) }}">
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
                                    {{$user->adresse}} {{$user->telephone}} 
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
                                            <h5 class="card-title">{{App\models\Favori::where('user_id', $user->id)->get()->count()}}</h5>
                                            <span>Favoris</span>
                                        </div>
                                    </figure>
                                </article>
                            </div>
                        </article>
                        <article class="card  mb-3">
                            <div class="card-body">
                                <h5 class="card-title mb-4 text-uppercase">Favoris </h5><hr>
                                

                                <div class="row">
                                
                                @if ($favoris->count() > 0 )
                                   @foreach ($favoris as $fav)
                                    <div class="col-md-3">
                                         <p class="ml-4">
                                            {{$fav->produit->nom}}
                                         </p>


                                        <figure class="itemside  mb-3">
                                            <div class="aside"><img src="{{ asset('uploads/' . $fav->produit->photo) }}" class="border img-sm"></div>
                                            <div class="">
                                                <div>
                                                   
                                                    <a href="{{route('details', $fav->produit->id)}}" class="btn btn-primary ml-1"> <i class="fa fa-search-plus"></i></a>
                                                   
                                                </div>
                                                <div class="mt-1 ml-1">
                                                    <form action=" {{ route('destroy.favoris', $fav->id) }} " method="POST" 
                                                    onsubmit = "return confirm('Êtes-vous sûr de vouloir rétirer ce favoris ?');"
                                                >
                                                    {{csrf_field()}}
                                                    
                                                

                                                    <button type="submit" name="Supprimer" value="Supprimer" class="btn btn-outline-danger ml-1"><i class="fa fa-times"></i>
                                            </form>
                                                </div>
                                            </div>
                                        </figure>
                                       
                                    </div> 
     
                                @endforeach
                                     </div>
                                            <a href="{{route('favoris')}}" class="btn btn-outline-primary mt-5"> Tous mes favoris </a>
                                        </div>
                                @else
                                    <div class="col-md-12">
                                        <h5>Votre liste de souhait est vide.</h5>
                                        <p>Mais vous pouvez visiter la <a href="{{ route('produits') }}" style="color: blue;">boutique</a> pour ajouter des souhaits.
                                        </p> <br><br>
                                    </div>
                                @endif
                                
                           
                        </article>
                    </main>
                </div>
            </div>
        </section>
    
    @endsection



<!-- Pour inclure les buttons en bas : home, favoris, compte ... -->
@section('buttonsEnBas')
     @include('templateclient.layouts.buttonsEnBas')
@stop