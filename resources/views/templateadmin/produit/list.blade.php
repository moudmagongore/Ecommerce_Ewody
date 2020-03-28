@extends('templateadmin.layouts.app')

@section('content')

<div class="product-status mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Liste des produits</h4>
                    <div class="add-product">
                        <a href="{{route('ajoutproduit')}}">Ajouter produit</a>
                    </div>

                    <table>
                        @php
                            $heads = ["#", "Image", "Nom", "Description", "Status",
                                     "Fabriquant", "Stock", "Prix minimum", 
                                    "Prix maximum", "Action"];
                        @endphp
                        <tr>
                            
                            
                            <th>Nom</th>
                            <th>Status</th>
                            <th>Marque</th>
                            <th>Stock</th>                                
                            <th>Prix minimum</th>
                            <th>Prix maximum</th>
                            <th>Action</th>

                        </tr>
                        @if (count($produits)>0)
                        
                            @foreach ($produits as $produit)
                                <tr>
                                    <td>{{$produit->nom}}</td>                                    
                                    <td>{{$produit->status}}</td>
                                    <td>{{$produit->fabricant}}</td>
                                    <td>{{$produit->quantite}}</td>
                                    <td>{{$produit->prix_unitaire}}</td>
                                    <td>{{$produit->prix_maximum}}</td>
                                    <td>
                                        <button  title="Detail" class="pd-setting-ed" data-toggle="modal" data-target="#detailmodal{{$produit->id}}"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                        <button  title="Edit" class="pd-setting-ed" data-toggle="modal" data-target="#modelId{{$produit->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button  title="Trash" class="pd-setting-ed" data-toggle="modal" data-target="#DangerModalalert{{$produit->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        <a  title="image" class="pd-setting-ed btn" href="{{route('addimage',$produit->id)}}" style="color:black;" ><i class="fa fa-file-image-o" aria-hidden="true"></i></a>
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




    @foreach ($produits as $produit)
    


        <!-- Modal -->
        <div class="modal fade" id="modelId{{$produit->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Formulaire de modification d'un produit</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="{{route('updateproduit', $produit->id)}}" method="POST">
                                @csrf
                                <div class="row">                                        
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="">
                                            <div class="form-group">
                                                <label for="">Nom du produit</label>
                                                <input name="nom" type="text" value="{{$produit->nom}}" class="form-control" placeholder="Nom du produit">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Prix maximum</label>
                                                <input name="prix_maximum" type="text" value="{{$produit->prix_maximum}}" class="form-control" placeholder="Prix maximum">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Marque</label>
                                                <input name="fabricant" type="text" value="{{$produit->fabricant}}" class="form-control" placeholder="Fabriquant">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Fournisseur</label>
                                                <input name="fournisseur" type="text" value="{{$produit->fournisseur_id}}" class="form-control" placeholder="Fournisseur">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Statut</label>
                                                <select class="form-control" name="status">
                                                    <option>Statut</option>
                                                    <option value="Actif">Actif</option>
                                                    <option value="Inactif">Inactif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="">
                                            <div class="form-group">
                                               <label for="">Prix minimum</label>
                                                <input name="prix_unitaire" type="text" value="{{$produit->prix_unitaire}}" class="form-control" placeholder="Prix minimum">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Stock</label>
                                            <input name="quantite" type="number" value="{{$produit->quantite}}" class="form-control" placeholder="Quantité">
                                            </div>
                                            <div class="form-group">
                                               <label for="">Url de la video</label>
                                                <input name="titre_video" type="text" value="{{$produit->titre_video}}" class="form-control" placeholder="Url de la video">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{$produit->description}}</textarea> 
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

        <script>
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM
                
            });
        </script>
        <div id="DangerModalalert{{$produit->id}}" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                    <div class="modal-body">
                        <span class="adminpro-icon adminpro-danger-error modal-check-pro information-icon-pro"></span>
                        <h2>Attention!</h2>
                        <p>Êtes-vous sûr de vouloir Archiver ce produit?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('deleteproduit', $produit->id)}}" method="POST">
                            @csrf
                            <a data-dismiss="modal" href="#">Annuler</a>
                            <input type="submit" value="Supprimer">
                        </form>
                    </div>
                </div>
            </div>
        </div>



         {{-- Modal Détails produit --}}

         
  
  <!-- Modal -->
<div class="modal fade" id="detailmodal{{$produit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Détails du produit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row image-produit">
                <div class="col-md-4">
                    
                </div>
                
            </div>

            <form class="form-detail">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" disabled  value="{{$produit->nom}}">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" disabled  value="{{$produit->fabricant}}">
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                      <input type="text" class="form-control" disabled  value="{{$produit->prix_unitaire}}">
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control" disabled  value="{{$produit->prix_maximum}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                      <input type="text" class="form-control" disabled  value="{{$produit->quantite}}">
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control" disabled  value="{{$produit->status}}">
                    </div>
                </div>

                <div class="">
                    <textarea name="description" id="" cols="6" rows="5" class="form-control">{{$produit->description}}</textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

    @endforeach
@endsection