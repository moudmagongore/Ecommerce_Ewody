@extends('templateadmin.layouts.app')

@section('content')

<div class="product-status mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Liste des livraisons</h4>
                        <div class="add-product">
                            <a href="" data-toggle="modal" data-target="#addlivraisonmodal">Ajouter livraison</a>
                        </div>
                        <table>
                            <tr>
                                
                                <th>#</th>
                                <th>Date livraison</th>
                                <th>Montant</th>
                                <th>Quantite</th>
                                <th>Code commande</th>
                                <th>Produit</th>
                                <th>Action</th>

                            </tr>
                            @if (count($livraisons)>0)

                            @foreach ($livraisons as $livraison)
                                <tr>
                                    <td>{{$livraison->id}}</td>
                                    
                                    <td>{{$livraison->date_livraison_reelle}}</td>
                                    <td>{{$livraison->montant}}</td>
                                    <td>{{$livraison->quantite}}</td>
                                    <td>{{$livraison->commande_id}}</td>
                                    <td>{{$livraison->produit_id}}</td>
                                    <td>
                                            <button  title="Edit" class="pd-setting-ed" data-toggle="modal" data-target="#modelId{{$livraison->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            <button  title="Trash" class="pd-setting-ed" data-toggle="modal" data-target="#DangerModalalert{{$livraison->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>                                   
                                </tr>
                            
                            @endforeach
                        @endif
                            
                        </table>
                        <div class="custom-pagination">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Precedent</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @foreach ($livraisons as $livraison)
    


        <!-- Modal -->
        <div class="modal fade" id="modelId{{$livraison->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Formulaire de modification d'une livraison</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="{{route('updatelivraison', $livraison->id)}}" method="POST">
                                @csrf
                                <div class="row">                                        
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="remontantview-content-section">
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                <label for="date_livraison">Date de livraison</label>
                                                <input name="date_livraison" type="date" value="{{$livraison->date_livraison_reelle}}" class="form-control">
                                            </div>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                <label for="montant">Montant</label>
                                                <input name="montant" type="text" value="{{$livraison->montant}}" class="form-control">
                                            </div>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                                                <label for="quantite">Quantité</label>
                                                <input name="quantite" type="text" value="{{$livraison->quantite}}" class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                                                <label for="commande">Commande</label>
                                                <input name="commande" type="text" value="{{$livraison->commande_id}}" class="form-control">
                                            </div>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-ticket" aria-hidden="true"></i></span>
                                                <label for="produit">Produit</label>
                                                <input name="produit" type="text" value="{{$livraison->produit_id}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

        
        <div id="DangerModalalert{{$livraison->id}}" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                    <div class="modal-body">
                        <span class="adminpro-icon adminpro-danger-error modal-check-pro information-icon-pro"></span>
                        <h2>Attention!</h2>
                        <p>Êtes-vous sûr de vouloir supprimer cette livraison?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('deletelivraison', $livraison->id)}}" method="POST">
                            @csrf
                            <a data-dismiss="modal" href="#">Annuler</a>
                            <input type="submit" value="Supprimer">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
     <!-- Modal -->
     <div class="modal fade" id="addlivraisonmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Formulaire d'ajout d'une livraison</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{route('storelivraison')}}" method="POST">
                            @csrf
                            <div class="row">                                        
                                <div class="input-group mg-b-pro-edt">
                                    <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>                                                
                                    <input name="date_livraison" type="date"  class="form-control" placeholder="Date de la livraison">
                                </div>
                                <div class="input-group mg-b-pro-edt">
                                    <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>                                               
                                    <input name="montant" type="text"  class="form-control" placeholder="Montant livraison">
                                </div>
                                <div class="input-group mg-b-pro-edt">
                                    <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>                                               
                                    <input name="quantite" type="text"  class="form-control" placeholder="Quantité livrée">
                                </div>
                                <div class="input-group mg-b-pro-edt">
                                    <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>                                               
                                    <input name="commande" type="text"  class="form-control" placeholder="Identifiant commande">
                                </div>
                                <div class="input-group mg-b-pro-edt">
                                    <span class="input-group-addon"><i class="fa fa-ticket" aria-hidden="true"></i></span>                                               
                                    <input name="produit" type="text"  class="form-control" placeholder="identifiant produit">
                                </div>   
                            </div>
                            <div class="row">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
@endsection