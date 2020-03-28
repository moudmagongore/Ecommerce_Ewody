@extends('templateadmin.layouts.app')

@section('content')
    
   

        <!-- Static Table Start -->
        <div class="static-table-area mg-t-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="sparkline8-list">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd" id="entetetab">
                                    <h1>Liste des catégories</h1>   
                                    <button class="btn" data-toggle="modal" data-target="#modalcategorie">Ajouter</button>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="static-table-list">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Designation</th>
                                                <th>Action</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($categories)>0)
                                                @foreach ($categories as $categorie)
                                                    <tr>
                                                        <td>{{$categorie->id}}</td>
                                                        <td>{{$categorie->designation_categorie}}</td>
                                                        <td>
                                                            <button  title="Edit" class="pd-setting-ed" data-toggle="modal" data-target="#modalcat{{$categorie->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                            <button  title="Trash" class="pd-setting-ed" data-toggle="modal" data-target="#DangerModalcategorie{{$categorie->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                        </td>   
                                                    </tr>
                                                    <!-- Modal  Modification  categorie-->
                                                    <div class="modal fade" id="modalcat{{$categorie->id}}" tabindex="-1" role="dialog" aria-labelledby="modaltypelabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="modaltypelabel">Modification de la sous catégorie</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('updatecategorie', $categorie->id)}}" method="POST">
                                                                    @csrf
                                                                        <div class="form-group">
                                                                            <label for="nom_type">Nom</label>
                                                                            <input name="designation_categorie" type="text" value="{{$categorie->designation_categorie}}" class="form-control" id="nom_type">
                                                                        </div>
                                                                                            
                                                                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal" aria-label="Close">Annuler</button>
                                                                        <button type="submit" class="btn btn-primary float-right">Modifier</button>
                                                                    </form>
                                                                        
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal  suppression sous categorie-->
                                                    <div id="DangerModalcategorie{{$categorie->id}}" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-close-area modal-close-df">
                                                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <span class="adminpro-icon adminpro-danger-error modal-check-pro information-icon-pro"></span>
                                                                    <h2>Attention!</h2>
                                                                    <p>Êtes-vous sûr de vouloir supprimer cette categorie?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{route('deletecategorie', $categorie->id)}}" method="POST">
                                                                        @csrf
                                                                        <a data-dismiss="modal" href="#">Annuler</a>
                                                                        <input type="submit" value="Supprimer">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            
                                                                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="sparkline12-list mg-b-15">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd" id="entetetab">
                                    <h1>Liste des sous-catégories</h1>
                                    <button class="btn" data-toggle="modal" data-target="#modaltype">Ajouter</button>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="static-table-list">
                                    <table class="table hover-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Designation</th>
                                                <th>Catégorie</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($sous_categories)>0)
                                                @foreach ($sous_categories as $sous_categorie)
                                                    <tr>
                                                        <td>{{$sous_categorie->id}}</td>
                                                        <td>{{$sous_categorie->designation_s_categorie}}</td>
                                                        <td>{{$sous_categorie->categories['designation_categorie']}}</td>
                                                        <td>
                                                            <button  title="Edit" class="pd-setting-ed" data-toggle="modal" data-target="#modalsous{{$sous_categorie->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                            <button  title="Trash" class="pd-setting-ed" data-toggle="modal" data-target="#DangerModalalert{{$sous_categorie->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                        </td>   
                                                    </tr>

                                                    <!-- Modal  Modification sous categorie-->
                                                    <div class="modal fade" id="modalsous{{$sous_categorie->id}}" tabindex="-1" role="dialog" aria-labelledby="modaltypelabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="modaltypelabel">Modification de la sous catégorie</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('updatetype', $sous_categorie->id)}}" method="POST">
                                                                    @csrf
                                                                        <div class="form-group">
                                                                            <label for="nom_type">Nom</label>
                                                                        <input name="designation_type" type="text" value="{{$sous_categorie->designation_s_categorie}}" class="form-control" id="nom_type">
                                                                        </div>
                                                                        <div class="chosen-select-single mg-b-20 form-group">
                                                                            <label>Nom de la catégorie</label>
                                                                            <select name="designation_categorie" value="{{$sous_categorie->categories['designation_categorie']}}" data-placeholder="Choisi une categorie" class="chosen-select form-control" tabindex="-2">
                                                                                @foreach ($categories as $categorie)
                                                                                    <option value="{{$categorie->id}}">{{$categorie->designation_categorie}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>                    
                                                                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal" aria-label="Close">Annuler</button>
                                                                        <button type="submit" class="btn btn-primary float-right">Modifier</button>
                                                                    </form>
                                                                        
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal  suppression sous categorie-->
                                                    <div id="DangerModalalert{{$sous_categorie->id}}" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-close-area modal-close-df">
                                                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <span class="adminpro-icon adminpro-danger-error modal-check-pro information-icon-pro"></span>
                                                                    <h2>Attention!</h2>
                                                                    <p>Êtes-vous sûr de vouloir supprimer cette sous_categorie?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{route('deletetype', $sous_categorie->id)}}" method="POST">
                                                                        @csrf
                                                                        <a data-dismiss="modal" href="#">Annuler</a>
                                                                        <input type="submit" value="Supprimer">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif                               
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="sparkline10-list mt-b-30">
                            <div class="sparkline10-hd">
                                <div class="main-sparkline10-hd" id="entetetab">
                                    <h1>Liste des caracteristiques</h1>
                                    <button  class="btn" data-toggle="modal" data-target="#modalcaracteristique">Ajouter</button>
                                </div>
                            </div>
                            <div class="sparkline10-graph">
                                <div class="static-table-list">
                                    <table class="table border-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Designation</th>
                                                <th>Valeur</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($caracteristiques)>0)
                                                @foreach ($caracteristiques as $caracteristique)
                                                    <tr>
                                                        <td>{{$caracteristique->id}}</td>
                                                        <td>{{$caracteristique->designation}}</td>
                                                        <td>{{$caracteristique->valeur}}</td>
                                                        <td>
                                                            <button  title="Edit" class="pd-setting-ed" data-toggle="modal" data-target="#modalcar{{$caracteristique->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                            <button  title="Trash" class="pd-setting-ed" data-toggle="modal" data-target="#DangerModalcaracteristique{{$caracteristique->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                        </td>   
                                                    </tr>
                                                    <!-- Modal  Modification  caracteristique-->
                                                    <div class="modal fade" id="modalcar{{$caracteristique->id}}" tabindex="-1" role="dialog" aria-labelledby="modaltypelabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="modaltypelabel">Modification de la caractéristique</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('updatecaracteristique', $caracteristique->id)}}" method="POST">
                                                                    @csrf
                                                                        <div class="form-group">
                                                                            <label for="nom_type">Nom</label>
                                                                            <input name="designation_caracteristique" type="text" value="{{$caracteristique->designation}}" class="form-control" id="nom_type">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="nom_type">Valeur</label>
                                                                            <input name="valeur_caracteristique" type="text" value="{{$caracteristique->valeur}}" class="form-control" id="nom_type">
                                                                        </div>
                                                                                            
                                                                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal" aria-label="Close">Annuler</button>
                                                                        <button type="submit" class="btn btn-primary float-right">Modifier</button>
                                                                    </form>
                                                                        
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal  suppression  caracteristique-->
                                                    <div id="DangerModalcaracteristique{{$caracteristique->id}}" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-close-area modal-close-df">
                                                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <span class="adminpro-icon adminpro-danger-error modal-check-pro information-icon-pro"></span>
                                                                    <h2>Attention!</h2>
                                                                    <p>Êtes-vous sûr de vouloir supprimer cette caracteristique?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{route('deletecaracteristique', $caracteristique->id)}}" method="POST">
                                                                        @csrf
                                                                        <a data-dismiss="modal" href="#">Annuler</a>
                                                                        <input type="submit" value="Supprimer">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif        
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="sparkline10-list mt-b-30">
                            <div class="sparkline10-hd">
                                <div class="main-sparkline10-hd" id="entetetab">
                                    <h1>Liste des industries</h1>
                                    <button  class="btn" data-toggle="modal" data-target="#modalindustrie">Ajouter</button>
                                </div>
                            </div>
                            <div class="sparkline10-graph">
                                <div class="static-table-list">
                                    <table class="table border-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Designation</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($industries)>0)
                                                @foreach ($industries as $industrie)
                                                    <tr>
                                                        <td>{{$industrie->id}}</td>
                                                        <td>{{$industrie->designation_industrie}}</td>
                                                        <td>
                                                            <button  title="Edit" class="pd-setting-ed" data-toggle="modal" data-target="#modalcar{{$industrie->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                            <button  title="Trash" class="pd-setting-ed" data-toggle="modal" data-target="#DangerModalindustrie{{$industrie->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                        </td>   
                                                    </tr>
                                                    <!-- Modal  Modification  caracteristique-->
                                                    <div class="modal fade" id="modalcar{{$industrie->id}}" tabindex="-1" role="dialog" aria-labelledby="modaltypelabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="modaltypelabel">Modification d'une industrie</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('updatecaracteristique', $industrie->id)}}" method="POST">
                                                                    @csrf
                                                                        <div class="form-group">
                                                                            <label for="nom_type">Nom</label>
                                                                            <input name="designation_industrie" type="text" value="{{$industrie->designation_industrie}}" class="form-control" id="nom_type">
                                                                        </div>
                                                                                            
                                                                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal" aria-label="Close">Annuler</button>
                                                                        <button type="submit" class="btn btn-primary float-right">Modifier</button>
                                                                    </form>
                                                                        
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal  suppression  industrie-->
                                                    <div id="DangerModalindustrie{{$industrie->id}}" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-close-area modal-close-df">
                                                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <span class="adminpro-icon adminpro-danger-error modal-check-pro information-icon-pro"></span>
                                                                    <h2>Attention!</h2>
                                                                    <p>Êtes-vous sûr de vouloir supprimer cette industrie?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{route('deleteindustrie', $industrie->id)}}" method="POST">
                                                                        @csrf
                                                                        <a data-dismiss="modal" href="#">Annuler</a>
                                                                        <input type="submit" value="Supprimer">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif        
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>                  
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="sparkline10-list mt-b-30">
                            <div class="sparkline10-hd">
                                <div class="main-sparkline10-hd" id="entetetab">
                                    <h1>Liste des services</h1>
                                    <button  class="btn" data-toggle="modal" data-target="#modalservice">Ajouter</button>
                                </div>
                            </div>
                            <div class="sparkline10-graph">
                                <div class="static-table-list">
                                    <table class="table border-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Designation</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($services)>0)
                                                @foreach ($services as $service)
                                                    <tr>
                                                        <td>{{$service->id}}</td>
                                                        <td>{{$service->designation}}</td>
                                                        <td>{{$service->description}}</td>
                                                        <td>
                                                            <button  title="Edit" class="pd-setting-ed" data-toggle="modal" data-target="#modalcar{{$service->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                            <button  title="Trash" class="pd-setting-ed" data-toggle="modal" data-target="#DangerModalindustrie{{$industrie->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                        </td>   
                                                    </tr>
                                                    <!-- Modal  Modification  service-->
                                                    <div class="modal fade" id="modalcar{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="modaltypelabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="modaltypelabel">Modification d'une service</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('updateservice', $service->id)}}" method="POST">
                                                                    @csrf
                                                                        <div class="form-group">
                                                                            <label for="nom_type">Nom</label>
                                                                            <input name="designation_service" type="text" value="{{$service->designation_service}}" class="form-control" id="nom_type">
                                                                        </div>
                                                                                            
                                                                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal" aria-label="Close">Annuler</button>
                                                                        <button type="submit" class="btn btn-primary float-right">Modifier</button>
                                                                    </form>
                                                                        
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal  suppression  service-->
                                                    <div id="DangerModalservice{{$service->id}}" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-close-area modal-close-df">
                                                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <span class="adminpro-icon adminpro-danger-error modal-check-pro information-icon-pro"></span>
                                                                    <h2>Attention!</h2>
                                                                    <p>Êtes-vous sûr de vouloir supprimer cet service?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{route('deleteservice', $service->id)}}" method="POST">
                                                                        @csrf
                                                                        <a data-dismiss="modal" href="#">Annuler</a>
                                                                        <input type="submit" value="Supprimer">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif        
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                    
            </div>
        </div>

       
  
        @include('templateadmin.produit.modalproduit')
        
        <!-- Modal  type-->
       <div class="modal fade" id="modaltype" tabindex="-1" role="dialog" aria-labelledby="modaltypelabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modaltypelabel">Ajouter un nouvelle sous catégorie de produit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('storetype')}}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="nom_type">Nom</label>
                                <input name="designation_type" type="text" class="form-control" id="nom_type">
                            </div>
                            <div class="chosen-select-single mg-b-20 form-group">
                                <label>Nom de la catégorie</label>
                                <select name="designation_categorie" data-placeholder="Choisi une categorie" class="chosen-select form-control" tabindex="-2">
                                    @foreach ($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->designation_categorie}}</option>
                                    @endforeach
                                </select>
                            </div>                    
                            <button type="button" class="btn btn-danger float-right" data-dismiss="modal" aria-label="Close">Annuler</button>
                            <button type="submit" class="btn btn-primary float-right">Ajouter</button>
                        </form>
                            
                    </div>
                    
                </div>
            </div>
        </div> 


       {{--  <!-- Modal  Modification sous categorie-->
        <div class="modal fade" id="modaltype{{$sous_categorie->id}}" tabindex="-1" role="dialog" aria-labelledby="modaltypelabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modaltypelabel">Modification de la sous catégorie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('storetype')}}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="nom_type">Nom</label>
                            <input name="designation_type" type="text" value="{{$sous_categorie->nom}}" class="form-control" id="nom_type">
                            </div>
                            <div class="chosen-select-single mg-b-20 form-group">
                                <label>Nom de la catégorie</label>
                                <select name="designation_categorie" value="{{$sous_categorie->categories->designation_categorie}}" data-placeholder="Choisi une categorie" class="chosen-select form-control" tabindex="-2">
                                    @foreach ($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->designation_categorie}}</option>
                                    @endforeach
                                </select>
                            </div>                    
                            <button type="button" class="btn btn-danger float-right" data-dismiss="modal" aria-label="Close">Annuler</button>
                            <button type="submit" class="btn btn-primary float-right">Ajouter</button>
                        </form>
                            
                    </div>
                    
                </div>
            </div>
        </div>  --}}
    @endsection