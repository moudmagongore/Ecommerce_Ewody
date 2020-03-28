@extends('templateadmin.layouts.app')

@section('content')

<div class="product-status mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Liste des fournisseurs</h4>
                        <div class="add-product">
                            <a href=""  data-toggle="modal" data-target="#addfournisseurmodal">Ajouter Founisseur</a>
                        </div>
                        <table>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Adresse</th>
                                <th>Type</th>
                            </tr>
                            @if (count($fournisseurs)>0)

                            @foreach ($fournisseurs as $fournisseur)
                                <tr>
                                    
                                    <td>{{$fournisseur->nom}}</td>
                                    <td>{{$fournisseur->email}}</td>
                                    <td>{{$fournisseur->telephone}}</td>
                                    <td>{{$fournisseur->adresse}}</td>
                                    <td>{{$fournisseur->type}}</td>
                                    
                                    <td>
                                        <button  title="Detail" class="pd-setting-ed" data-toggle="modal" data-target="#detailmodal{{$fournisseur->id}}"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                        <button data-toggle="modal" data-target="#modelId{{$fournisseur->id}}" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="modal" data-target="#DangerModalalert{{$fournisseur->id}}" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>                                   
                                   
                                </tr>
                            
                            @endforeach
                        @endif
                            
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="addfournisseurmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Formulaire d'ajout d'un fournisseur</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{route('storefournisseur')}}" method="POST">
                            @csrf
                            <div class="row">                                        
                                <div class="input-group mg-b-pro-edt {{$errors->has('nom') ? 'has-error' : '' }}">
                                    <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>                                                
                                    <input name="nom" type="text"  class="form-control" placeholder="Nom du fournisseur">

                                    {!! $errors->first('nom', '<p id="error">:message</p>')!!}
                                </div>

                                <div class="input-group mg-b-pro-edt {{$errors->has('prenom') ? 'has-error' : '' }}">
                                    <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>                                                
                                    <input name="prenom" type="text"  class="form-control" placeholder="Prenom du fournisseur">

                                     {!! $errors->first('prenom', '<p id="error">:message</p>')!!}
                                </div>

                                <div class="input-group mg-b-pro-edt {{$errors->has('email') ? 'has-error' : '' }}">
                                    <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>                                               
                                    <input name="email" type="text"  class="form-control" placeholder="Email" >

                                    {!! $errors->first('email', '<p id="error">:message</p>')!!}
                                </div>

                                <div class="input-group mg-b-pro-edt {{$errors->has('telephone') ? 'has-error' : '' }}">
                                    <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>                                               
                                    <input name="telephone" type="text"  class="form-control" placeholder="Téléphone">

                                    {!! $errors->first('telephone', '<p id="error">:message</p>')!!}
                                </div>

                                <div class="input-group mg-b-pro-edt {{$errors->has('adresse') ? 'has-error' : '' }}">
                                    <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>                                               
                                    <input name="adresse" type="text"  class="form-control" placeholder="Adresse">

                                     {!! $errors->first('adresse', '<p id="error">:message</p>')!!}
                                </div>

                                <div class="input-group mg-b-pro-edt {{$errors->has('password') ? 'has-error' : '' }}">
                                    <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>                                                
                                    <input name="password" type="password"  class="form-control" placeholder="password">

                                    {!! $errors->first('password', '<p id="error">:message</p>')!!}
                                </div>

                                <div class="input-group mg-b-pro-edt {{$errors->has('password_confirmation') ? 'has-error' : '' }}">
                                    <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>                                                
                                    <input name="password_confirmation" type="password"  class="form-control" placeholder="password_confirmation" >

                                    {!! $errors->first('password_confirmation', '<p id="error">:message</p>')!!}
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
    

    @foreach ($fournisseurs as $fournisseur)
         <!-- Modal detail-->
        <div class="modal fade" id="detailmodal{{$fournisseur->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Détails d'un Fournisseur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    
                    <form class="form-details">
                        <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" disabled  value="{{$fournisseur->nom}}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" disabled  value="{{$fournisseur->type}}">
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <input type="text" class="form-control" disabled  value="{{$fournisseur->email}}">
                            </div>
                            <div class="col-md-6">
                            <input type="text" class="form-control" disabled  value="{{$fournisseur->telephone}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" disabled  value="{{$fournisseur->adresse}}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" disabled  value="{{$fournisseur->status}}">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>

        <!-- Modal suppression -->
        <div id="DangerModalalert{{$fournisseur->id}}" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                    <div class="modal-body">
                        <span class="adminpro-icon adminpro-danger-error modal-check-pro information-icon-pro"></span>
                        <h2>Attention!</h2>
                        <p>Êtes-vous sûr de vouloir Supprimer ce fournisseur?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('archivefournisseur', $fournisseur->id)}}" method="POST">
                            @csrf
                            <a data-dismiss="modal" href="#">Annuler</a>
                            <input type="submit" value="Archiver" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Modification fournisseur -->

         
         <div class="modal fade" id="modelId{{$fournisseur->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Formulaire de modification d'un utilisateur</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="{{route('updatefournisseur', $fournisseur->id)}}" method="POST">
                                @csrf
                                <div class="row">                                        
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="nom">Nom</label>
                                                <input name="nom" type="text" value="{{$fournisseur->nom}}" class="form-control" placeholder="Nom d'utilisateur">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="adresse">Adresse</label>
                                                <input name="adresse" type="text" value="{{$fournisseur->adresse}}" class="form-control" placeholder="Adresse">
                                            </div>
                                        </div>
                                        
                                           
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="telephone">Téléphone</label>
                                                <input name="telephone" type="text" value="{{$fournisseur->telephone}}" class="form-control" placeholder="Numero Téléphone">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">Email</label>
                                                <input name="email" type="email" value="{{$fournisseur->email}}" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="type">Type</label>
                                                <select class="form-control" name="type">
                                                    <option>{{$fournisseur->type}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="status">Statut</label>
                                                <select class="form-control" name="status">
                                                    <option>{{$fournisseur->status}}</option>
                                                </select>
                                            </div>
                                        </div>    
                                            
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="motdepass">Mot de passe</label>
                                                    <input name="motdepass" type="password"  class="form-control" placeholder="Mot de passe">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="motdepassconfirm">Confirm</label>
                                                    <input name="motdepassconfirm" type="password"  class="form-control" placeholder="Confirmation">
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

    @endforeach
    
@endsection