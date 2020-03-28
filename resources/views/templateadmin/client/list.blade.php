@extends('templateadmin.layouts.app')

@section('content')

<div class="product-status mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Liste des clients</h4>
                        <div class="add-product">
                            
                        </div>
                        <table>
                            <tr>
                                <th>Nom</th>
                                <th>Prénoms</th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th>Adresse</th>                                
                                <th>Action</th>

                            </tr>
                            @if (count($clients)>0)

                            @foreach ($clients as $client)
                                <tr>                            
                                    <td>{{$client->nom}}</td>
                                    <td>{{$client->prenom}}</td>
                                    <td>{{$client->telephone}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->adresse}}</td>
                                    <td>
                                        <button  title="Detail" class="pd-setting-ed" data-toggle="modal" data-target="#detailmodal{{$client->id}}"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                        <button data-toggle="modal" data-target="#DangerModalalert{{$client->id}}" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>    
                                    </td>                                   
                                </tr>
                                <div id="DangerModalalert{{$client->id}}" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-close-area modal-close-df">
                                                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                            </div>
                                            <div class="modal-body">
                                                <span class="adminpro-icon adminpro-danger-error modal-check-pro information-icon-pro"></span>
                                                <h2>Attention!</h2>
                                                <p>Êtes-vous sûr de vouloir supprimer ce client?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('deleteclient', $client->id)}}" method="POST">
                                                    @csrf
                                                    <a data-dismiss="modal" href="#">Annuler</a>
                                                    <input type="submit" value="Supprimer">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!-- Modal -->
                                <div class="modal fade" id="detailmodal{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Détails d'un client</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row image-produit">
                                                <div class="col-md-4" style="width:100px; height:100px;">
                                                    
                                                </div>
                                                
                                            </div>
                                            <form class="form-details">
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" disabled  value="{{$client->nom}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" disabled  value="{{$client->prenom}}">
                                                </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                    <input type="text" class="form-control" disabled  value="{{$client->email}}">
                                                    </div>
                                                    <div class="col-md-6">
                                                    <input type="text" class="form-control" disabled  value="{{$client->teephone}}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" disabled  value="{{$client->adresse}}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" disabled  value="{{$client->login}}">
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
                            @endforeach
                        @endif
                            
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection