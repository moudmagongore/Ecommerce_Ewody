@extends('templateadmin.layouts.app')

@section('content')

<div class="product-status mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Liste des users</h4>
                        <div class="add-product">
                            <a href="{{route('adduser')}}">Ajouter un utilisateur</a>
                        </div>
                        <table>
                            <tr>
                                
                                <th>Nom</th>
                                <th>Prénoms</th>
                                <th>Login</th>
                                <th>Téléphone</th>
                                <th>Adresse</th>
                                <th>Rôles</th>                                
                                <th class="text-center">Action</th>

                            </tr>
                            @if (count($users)>0)

                            @foreach ($users as $user)
                                <tr>
                                    
                                    <td>{{$user->nom}}</td>
                                    <td>{{$user->prenom}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->telephone}}</td>                                   
                                    <td>{{$user->adresse}}</td>

                                    <td>
                                        {{implode(', ', $user->privilleges()->get()->pluck('designation_privillege')->toArray())}}
                                      </td>

                                    <td>
                                        <button  title="Detail" class="pd-setting-ed" data-toggle="modal" data-target="#detailmodal{{$user->id}}"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                        <button  title="Edit" class="pd-setting-ed" data-toggle="modal" data-target="#modelId{{$user->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>

                                        

                                        @if($user->statut == 1)
                                          <a href=" {{route('statut', $user->id)}} " class="btn btn-success btn-circle btn-sm"><i class="fa fa-check "></i></a>
                                          
                                        @else
                                          <a href="{{route('statut', $user->id)}}" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-exclamation-triangle"></i> </a>
                                        @endif

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

    @foreach ($users as $user)
         <!-- Modal detail-->
        <div class="modal fade" id="detailmodal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Détails d'un Utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    
                    <form class="form-details">
                        <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" disabled  value="{{$user->nom}}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" disabled  value="{{$user->prenom}}">
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <input type="text" class="form-control" disabled  value="{{$user->email}}">
                            </div>
                            <div class="col-md-6">
                            <input type="text" class="form-control" disabled  value="{{$user->telephone}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" disabled  value="{{$user->adresse}}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" disabled  value="{{$user->name}}">
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
        <div id="DangerModalalert{{$user->id}}" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                    <div class="modal-body">
                        <span class="adminpro-icon adminpro-danger-error modal-check-pro information-icon-pro"></span>
                        <h2>Attention!</h2>
                        <p>Êtes-vous sûr de vouloir Archiver ce Compte?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('archiveuser', $user->id)}}" method="POST">
                            @csrf
                            <a data-dismiss="modal" href="#">Annuler</a>
                            <input type="submit" value="Archiver" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Modification user -->

         
         <div class="modal fade" id="modelId{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                            <form action="{{route('updateuser', $user->id)}}" method="POST">
                                @csrf
                                <div class="row">                                        
                                    <div class="">
                                        <div class="form-group">
                                            <label for="name">Username</label>
                                            <input name="name" type="text" value="{{$user->name}}" class="form-control" placeholder="Nom d'utilisateur">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="nom">Nom</label>
                                                <input name="nom" type="text" value="{{$user->nom}}" class="form-control" placeholder="Nom">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="prenom">Prénom</label>
                                                <input name="prenom" type="text" value="{{$user->prenom}}" class="form-control" placeholder="Prénoms">
                                            </div>
                                        </div>
                                           
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="telephone">Téléphone</label>
                                                <input name="telephone" type="text" value="{{$user->telephone}}" class="form-control" placeholder="Numero Téléphone">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">Email</label>
                                                <input name="email" type="email" value="{{$user->email}}" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="adresse">Adresse</label>
                                                <input name="adresse" type="text" value="{{$user->adresse}}" class="form-control" placeholder="Adresse">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="status">Statut</label>
                                                <select class="form-control" name="status">
                                                    <option>{{$user->status}}</option>
                                                </select>
                                            </div>
                                        </div>    
                                            
                                           <!--  <div class="row">
                                               <div class="form-group col-md-6 ">
                                                   <label for="password">Mot de passe</label>
                                                   <input name="password" type="password"  class="form-control" placeholder="Mot de passe" value="{{old('password')}}">
                                           
                                                  
                                               </div>
                                           
                                           
                                           
                                               <div class="form-group col-md-6">
                                                   <label for="password_confirmation">Confirmation</label>
                                                   <input name="password_confirmation" type="password"  class="form-control" placeholder="Confirmation">
                                           
                                                   
                                               </div>
                                           </div>
                                            -->

                                 <!-- Pour recuperer les privilleges -->
                    @foreach($privilleges as $privillege)
                        <div class="form-group form-check row col-md-4 col-form-label text-md-right">
                            <input type="checkbox" class="form-check-input" name="privilleges[]" value="{{$privillege->id}}" id="{{$privillege->id}}"       @foreach ($user->privilleges as $userPrivillege)
                                @if ($userPrivillege->id === $privillege->id)
                                    checked 
                                @endif
                            @endforeach>

                            <label for="{{$privillege->id}}" class="form-check-label">
                                {{$privillege->designation_privillege}}
                            </label>
                        </div>
                    @endforeach

                                        
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