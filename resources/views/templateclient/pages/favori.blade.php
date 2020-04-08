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
                            <h4 class="card-title mb-4 text-uppercase">Mes favoris </h4>
                            <hr>
                            <div class="row">
                                
                                @if ($favoris->count() > 0)
                                    @foreach ($favoris as $fav)
                                    <div class="col-md-3">
                                        <p class="ml-4">
                                            {{$fav->produit->nom}}
                                        </p>
                                        <figure class="itemside  mb-3">

                                            <div class="aside"><img src="{{ asset('storage/' . $fav->produit->photo) }}" class="border img-sm">
                                            </div>
                                            <div class="">
                                                <div>
                                                    <form action="{{ route('cart.store') }}" method="post">

                                                        @csrf

                                                        <input type="hidden" name="produits_id" value="{{$fav->produit->id}}">

                                                        <button type="submit" class="btn btn-primary ml-1"> <i class="fa fa-shopping-cart"></i></button>
                                                    </form>
                                                    
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
                                        <hr>
                    
                                    </div>

                                            
                                @endforeach
                                @else
                                    <div class="col-md-12">
                                        <h5>Votre liste de souhait est vide.</h5>
                                        <p>Mais vous pouvez visiter la <a href="{{ route('produits') }}" style="color: blue;">boutique</a> pour ajouter des souhaits.
                                        </p> <br><br>
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                    </article>
                </main>
            </div>
        </div>
    </section>
@endsection
    