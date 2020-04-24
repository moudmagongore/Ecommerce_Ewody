@extends('templateadmin.layouts.app')

@section('content')

<div class="product-status mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Liste des Commandes</h4>
                        
                        <table>
                            <tr> 
                                <th>N° COMMANDE</th>
                                <th>Prenom && Nom</th>
                                <th>Voir</th>
                                <th>Date commande</th>
                                <th>Statut</th>
                                <th>Total</th>
                            </tr>
                            

                            @foreach ($commandes as $commande)
                                <tr>
                                    <td>
                                        <strong>
                                            {{$commande->commande_id}}
                                        </strong>
                                    </td>

                                    <td>
                                        {{$commande->prenom. ' ' .$commande->nom}}
                                    </td>

                                    <td>
                                        <a href=""  data-toggle="modal" data-target="#addfournisseurmodal{{$commande->id}}">
                                            
                                            <i class="fa fa-eye" aria-hidden="true" style="color:#25afd1;"></i>
                                        </a>
                                            
                                       
                                    </td>

                                    <td>
                                        {{$commande->created_at}}
                                    </td>



                                    <td>
                                        
                                        @if($commande->statut == 'En cours')
                                            <a href="" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#addcouponmodal{{$commande->id}}"><i class="fa fa-refresh fa-spin"></i>   En cours</a>
                                        @elseif($commande->statut == 'Emballé')
                                            
                                               <a href="" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#addcouponmodal{{$commande->id}}"><i class="fa fa-envelope-o" aria-hidden="true"></i>   Emballé</a> 
                                            
                                        @elseif($commande->statut == 'En route')
                                            
                                               <a href="" class="btn btn-primary btn-circle btn-sm" data-toggle="modal" data-target="#addcouponmodal{{$commande->id}}"><i class="fa fa-motorcycle" aria-hidden="true"></i>  En route</a> 
                                            
                                        @elseif($commande->statut == 'Livré')
                                            
                                               <a href="" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#addcouponmodal{{$commande->id}}"><i class="fa big-icon fa-check-circle icon-wrap"></i>  Livré</a> 
                                            
                                        @elseif($commande->statut == 'Annulé')
                                            
                                               <a href="" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#addcouponmodal{{$commande->id}}"><i class="fa fa-exclamation-triangle"></i>  Annulé</a> 
                                            
                                       @endif


                                          
                                       
                                    </td>



                                    <td>
                                        {{getprixminimumhelpers($commande->montant)}}
                                    </td>
                                </tr>
                            @endforeach

                        </table>

                        {{$commandes->appends(request()->input())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>








   
    @foreach ($commandes as $commande)
           <!-- Modal voir commande-->
    <div class="modal fade" id="addfournisseurmodal{{$commande->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">commande N°{{$commande->commande_id}}</h3>


                    <div style="margin-left: 32em; margin-top: -2em;">
                        @if($commande->statut == 'En cours')
                            <a class="btn btn-info btn-circle btn-sm" disabled><i class="fa fa-refresh fa-spin"></i>  En cours</a>
                        @elseif($commande->statut == 'Emballé')
                            
                               <a class="btn btn-success btn-circle btn-sm" disabled><i class="fa fa-envelope-o" aria-hidden="true"></i>  Emballé</a> 
                            
                        @elseif($commande->statut == 'En route')
                            
                               <a class="btn btn-primary btn-circle btn-sm" disabled><i class="fa fa-motorcycle" aria-hidden="true"></i>  En route</a> 
                            
                        @elseif($commande->statut == 'Livré')
                            
                               <a class="btn btn-warning btn-circle btn-sm" disabled><i class="fa big-icon fa-check-circle icon-wrap"></i>  Livré</a> 
                            
                        @elseif($commande->statut == 'Annulé')
                            
                               <a class="btn btn-danger btn-circle btn-sm" disabled><i class="fa fa-exclamation-triangle"></i>  Annulé</a> 
                            
                       @endif
 
                    </div>
                    

                    

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">  
                            <h4> Détails de facturation</h4><br>                             
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h5> Prénom</h5>
                                <p>
                                    {{$commande->prenom}}
                                </p>
                            </div> 

                            <div class="col-lg-4 col-md-4 col-sm-12">
                               <h5> Nom</h5>
                                <p>
                                    {{$commande->nom}}
                                </p>

                            </div> 
                        </div><br>


                        <div class="row">                               
                            <div class="col-lg-6 col-md-6 col-sm-12">
                             <h5> Adresse</h5>
                                <p>
                                    {{$commande->adresse}}
                                </p>

                            </div> 

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                 <h5> Téléphone</h5>
                                   <p>
                                        {{$commande->telephone}}
                                    </p>
                            </div> 
                        </div><br>


                        <div class="row">                               
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h5> Méthode de livraison</h5>
                                    <p>
                                        Gratuite
                                    </p>
                            </div> 

                            <div class="col-lg-4 col-md-4 col-sm-12">
                               <h5> Paiement via</h5>
                                    <p>
                                       Paiement à la livraison
                                    </p>
                            </div> 
                        </div><br>


                        <div>
                            <h5>Date de livraison</h5>
                             <p>
                                {{$commande->date_livraison}}
                             </p>
                        </div>
                    </div><br><br>



                        <!-- Tableau -->
                        <div class="sparkline8-graph">
                            <div class="static-table-list">
                            <table class="table">
                            <thead>
                            <tr>
                                <th>PRODUIT</th>
                                <th>NOM</th>
                                @if (unserialize($commande->produits) > 0)
                                   <th>TAILLE</th>
                                @endif
                                
                                <th>PRIX UNITAIRE</th>
                                <th>QUANTIÉ</th>                                            
                            </tr>
                            </thead>
                            <tbody>
                                @foreach (unserialize($commande->produits) as $produit)
                                    <tr>
                                        <td>
                                            <figure class="itemside">
                                                <div class="aside"><img src="{{ asset('storage/' . $produit[3]) }}" class="img-sm"></div>
                                            </figure>
                                        </td>

                                        <td>
                                            {{$produit[0]}}
                                        </td>

                                        <td>
                                           
                                                {{$produit[4]}}
                                        </td>

                                        <td>
                                            {{getprixminimumhelpers($produit[1])}}
                                        </td>

                                        <td>
                                            {{$produit[2]}}
                                        </td>
                                    </tr>
                                @endforeach                                       
                            </tbody>
                            </table>
                            </div>
                        </div>
                         <!-- End Tableau -->

                         <div>
                             <h5 class="text-center">PRIX TOTAL : <strong class="h4">{{getprixminimumhelpers($commande->montant)}} </strong></h5>
                         </div>
                         <hr>


                            <div>
                                  

                                            
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left: 36em;">Fermer</button>
                            </div>
                </div>

                 













               
                    
                
            </div>
        </div>
    </div>
    <!-- End Modal voir commande-->






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

                    <div class="text-center mt-4 h4">
                        <p>Voulez-vous modifiez le statut de la commande ?</p>
                    </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('modifier.statut', $commande->id) }}" method="POST">

                            @csrf





                            <div class="row">                                        
                                <select  type="text" class="form-control" name="statut"  autofocus>

                                        
                                         <option value="En cours" name="statut">
                                             En cours
                                         </option>

                                         <option value=" Emballé" name="statut">
                                             Emballé
                                         </option>

                                         <option value="En route" name="statut">
                                             En route
                                         </option>
                                
                                         <option value="Livré" name="statut">
                                             Livré
                                         </option>

                                         <option value="Annulé" name="statut">
                                             Annulé
                                         </option>
                                         
                                        
                                </select>
                                        
                            </div><br>
                                 
                     </div>

                            <div class="container row">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
   <!--  End Modal pour modifier statut -->


    @endforeach
  
    
    
@endsection