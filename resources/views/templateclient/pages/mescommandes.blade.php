
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
                            <h4 class="card-title mb-4">Mes commandes</h4>
                            <div class="collapse-wrapper center-block">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    
                                    
        

    @foreach (Auth()->user()->commandes as $commande)
        <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="h6 panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree{{$commande->id}}" aria-expanded="true" aria-controls="collapseThree">
               Commande passé le {{Carbon\Carbon::parse($commande->created_at)->format('d/m/Y à H:i')}} d'un montant de <strong>{{getprixminimumhelpers($commande->montant)}}
            </a>
        </h4>
    </div>
    <div id="collapseThree{{$commande->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
            <h6 class="h6 mb-0 ml-4">Produits commandés</h6>
            <hr>
            
            <table class="table table-borderless table-shopping-cart">
                <thead class="text-muted">
                    <tr class="small text-uppercase">
                        <th scope="col">Prduit</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix unitaire</th>
                        <th scope="col-fluid">Quantié</th>
                       
                    </tr>
                </thead>
                <tbody>

                    @foreach (unserialize($commande->produits) as $produit)
                            
                             <tr>
                        <td>
                            <div>
                                <figure class="itemside">
                                    <div class="aside"><img src="{{ asset('storage/' . $produit[3]) }}" class="img-sm"></div>
                                </figure>
                            </div>
                        </td>

                         <td class="prices">
                            <div>
                                <div class="price-wrap">
                                    <var class="price">{{$produit[0]}}</var>
                                </div>
                            </div>
                        </td>

                        <td class="prices">
                            <div>
                                <div class="price-wrap">
                                    <var class="price">{{getprixminimumhelpers($produit[1])}}</var>
                                    <small class="text-muted">148 000 / unité</small>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div>
                              {{$produit[2]}}
                            </div>
                        </td>
                        

                        
                    </tr>        
                        
                       
                    @endforeach
                   
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

    @endforeach






                                </div>
                            </div>
                        </div>
                    </article>
                </main>
    </div>
</div>
</section>
   
    
@endsection