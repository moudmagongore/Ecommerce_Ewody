
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


             <div class="ml-4">
                    Statut : 
                    @if($commande->statut == 'En cours')
                        <a href="" class="btn-info btn-circle btn-sm" data-toggle="modal" data-target="#addcouponmodal{{$commande->id}}">En cours</a>
                    @elseif($commande->statut == 'Emballé')
                        
                           <a href="{{ route('non.modif', $commande->id) }}" class="btn-success btn-circle btn-sm" >Emballé</a> 
                        
                    @elseif($commande->statut == 'En route')
                        
                           <a href="{{ route('non.modif', $commande->id) }}" class="btn-primary btn-circle btn-sm" > En route</a> 
                        
                    @elseif($commande->statut == 'Livré')
                        
                           <a href="{{ route('non.modif', $commande->id) }}" class=" btn-warning btn-circle btn-sm">Livré</a> 
                        
                    @elseif($commande->statut == 'Annulé')
                        
                        <a href="" class=" btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#addcouponmodal{{$commande->id}}">Annulé</a>

                   @endif
                </div><br>


                <div>
                 <h6 class="ml-4">N° commande: <strong >{{$commande->commande_id}} </strong></h6>

                </div>


            <h6 class="text-center h6 mb-0 ml-4 mt-4 mb-4">Produits commandés</h6>

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


@foreach (Auth()->user()->commandes as $commande)
   <!--  Modal pour modifier statut -->
   <div class="modal fade" id="addcouponmodal{{$commande->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Commande N°{{$commande->commande_id}}</h3>


                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                    <div class="text-center mt-4 h6">
                        <p>Voulez-vous modifiez le statut de la commande ?</p>
                    </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('modif.statut.commande.user', $commande->id) }}" method="POST">

                            @csrf





                            <div class="row">                                        
                                <select  type="text" class="form-control" name="statut"  autofocus>

                                        
                                         <option value="En cours" name="statut">
                                             En cours
                                         </option>

                                         

                                         <option value="Annulé" name="statut">
                                             Annulé
                                         </option>
                                         
                                        
                                </select>
                                        
                            </div><br>
                                 
                     </div>

                            <div class="">
                                    <button type="button" class=" btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class=" btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
   <!--  End Modal pour modifier statut -->
@endforeach
   
    
@endsection