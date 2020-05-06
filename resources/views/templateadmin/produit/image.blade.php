@extends('templateadmin.layouts.app')

@section('content')
   


    <div class="single-product-tab-area mg-tb-15">
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <ul id="myTab3" class="tab-review-design">
                                <li><a class="active" href="#reviews"><i class="fa fa-file-image-o" aria-hidden="true"></i> Pictures</a></li>
                                <li><a href="#INFORMATION"><i class="fa fa-commenting" aria-hidden="true"></i> Caractéristiques </a></li>
                                <li><a href="#couleurs"><i class="fa fa-commenting" aria-hidden="true"></i> Couleurs </a></li>
                                <li><a href="#tailles"><i class="fa fa-commenting" aria-hidden="true"></i> Tailles </a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">




                            <!-- Couleurs -->
    <div class="product-status mg-tb-15 product-tab-list tab-pane fade" id="couleurs" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Liste des couleurs</h4>
                    <div class="add-product">
                        <a href=""  data-toggle="modal" data-target="#addcouponmodal">Ajouter une couleurs</a>
                    </div>
                    <table>

                        <tr>
                            
                            <th>Couleur</th>
                            <th>Image couleur</th>
                            <th>Produit</th>
                            <th>Actions</th>
                        </tr>
                   
                        @if ($couleurs->count() > 0)
                             @foreach ($couleurs as $couleur)
                           <tr>
                                
                                <td>{{$couleur->designation}}</td>
                                

                                <td>

                                    @foreach ($couleur->produits as $produit)
                                         <img src="{{ asset('uploads/' . $produit->pivot->images) }}" class="img-thumbnail">
                                    @endforeach
                               
                                </td>


                                <td>
                                    @foreach ($couleur->produits as $produit)
                                        {{$produit->nom}}{{$loop->last ? '' : ',  '}}
                                    @endforeach
                                </td>
                                
                                
                                <td>
                                    

                                    <button data-toggle="modal" data-target="#modelId{{$couleur->id}}" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>

                                    <button data-toggle="modal" data-target="#DangerModalalert{{$couleur->id}}" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </td>                                   
                               
                            </tr>
                        
                        @endforeach
                        @else
                        <p>Le tableau est vide.</p>
                        @endif
                        
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
                           <!--  End couleurs -->




   <!--  tailles -->
    <div class="product-status mg-tb-15 product-tab-list tab-pane fade" id="tailles" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Liste des tailles</h4>
                    <div class="add-product">
                        <a href=""  data-toggle="modal" data-target="#addtaillemodal">Ajouter une taille</a>
                    </div>
                    <table>

                        <tr>
                            
                            <th>Taille</th>
                            <th>Produit</th>
                            <th>Actions</th>
                        </tr>
                   
                        @if ($tailles->count() > 0)
                            @foreach ($tailles as $taille)
                             <tr>
                                
                                
                                <td>{{$taille->designation}}</td>

                                <td>
                                    @foreach ($taille->produits as $produit)
                                        {{$produit->nom}} {{$loop->last ? '' : ',  '}}
                                    @endforeach
                                </td>
                                
                                
                                <td>
                                    
                                    <button data-toggle="modal" data-target="#modelIdTaille{{$taille->id}}" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>

                                    <button data-toggle="modal" data-target="#DangerModalalertTaille{{$taille->id}}" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </td>                                   
                               
                            </tr>
                        
                       
                        @endforeach
                        @else
                            <p>Le tableau est vide.</p>
                        @endif
                          
                        
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
  <!--  End tailles -->





                                    
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="product-edt-remove">
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#modelId">Ajouter une photo
                                        </button>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                    <div class="row">
                                    @foreach ($images as $image)
                                    <div class="col-lg-4">
                                    <div class="pro-edt-img">
                                    <img src="{{ asset('uploads/' . $image->images) }}" alt="" style="height:100px; width:100px"/ class="img-thumbnail">
                                    </div>
                                        <p>Pour le produit : <strong>{{$image->produit->nom}}</strong></p>
                                    </div>
                                    @endforeach


</div>

</div>
</div>
</div>
</div>
<div class="product-tab-list tab-pane fade" id="INFORMATION">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="review-content-section">
<div class="row">

<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
<div class="sparkline11-list mg-tb-30" style="margin-left:90px;">

<div class="sparkline11-graph" style="margin-left:85px;">
<div class="input-knob-dial-wrap">
<div class="row">
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
    <div class="form-group row">
        <form action="" method="POST">
           <div class="col-md-3"><label >Catégorie</label></div> 
            <select class="select2_demo_2 form-control col-md-6" multiple="multiple" style="width: 350px">
                @foreach ($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->designation_categorie}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">OK</button>
        </form>
    </div>
    <div class="form-group row">
        <form action="" method="POST">
            <label class="col-md-3">Sous catégories</label>
            <select class="select2_demo_2 form-control col-md-6" multiple="multiple" style="width: 350px">
                @foreach ($sous_categories as $sous_categorie)
                    <option value="{{$sous_categorie->id}}">{{$sous_categorie->designation_s_categorie}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">OK</button>
        </form>
    </div>

    <div class="form-group row">
        <form action="" method="post">
            <label class="col-md-3">Caractéristiques</label>
            <select class="select2_demo_2 form-control col-md-6" multiple="multiple" style="width: 350px">
                @foreach ($caracteristiques as $caracteristique)
                    <option value="{{$caracteristique->id}}">{{$caracteristique->designation}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">OK</button>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            





       
            <!-- Modal ajout couleur-->
    <div class="modal fade" id="addcouponmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Formulaire d'ajout d'une couleur</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('couleurs') }}" method="POST"enctype="multipart/form-data">
                            @csrf
                            <div class="row">                                        
                                <div class="input-group mg-b-pro-edt ">
                                    <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>

                                    <select class="js-example-basic-multiple" id="produit" type="text" name="produit[]"  autofocus multiple="multiple" style="width: 527px">

                                        @foreach($produits as $produit)
                                            <option value="{{ $produit->id }}"> {{ $produit->nom }}</option>
                                        @endforeach

                                      
                                    </select>
                                </div>


                                <div class="input-group mg-b-pro-edt {{$errors->has('designation') ? 'has-error' : '' }}">
                                    <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>    

                                    <input name="designation" type="text"  class="form-control" placeholder="Entrez la couleur">

                                     {!! $errors->first('designation', '<p id="error">:message</p>')!!}
                               </div>


                                 <div class="form-group">
                                        <!-- <label for="image">Image</label> -->
                                        <input type="file" class="form-control-file" name="image" id="image" value="image">
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
    <!-- End Modal Ajout couleur  -->





    <!-- Modal ajout tailles -->
    <div class="modal fade" id="addtaillemodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Formulaire d'ajout d'une tailles</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('tailles') }}" method="POST">
                            @csrf
                            <div class="row">                                        
                                <div class="input-group mg-b-pro-edt ">
                                    <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>

                                    <select class="js-example-basic-multiple" id="produit" type="text" name="produit[]"  autofocus multiple="multiple" style="width: 527px">

                                        @foreach($produits as $produit)
                                            <option value="{{ $produit->id }}"> {{ $produit->nom }}</option>
                                        @endforeach

                                      
                                    </select>
                                </div>


                                <div class="input-group mg-b-pro-edt {{$errors->has('designation') ? 'has-error' : '' }}">
                                    <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>    

                                    <input name="designation" type="text"  class="form-control" placeholder="Entrez la Taille">

                                     {!! $errors->first('designation', '<p id="error">:message</p>')!!}
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
     <!-- Modal ajout tailles -->







     
      @foreach ($couleurs as $couleur)

             <!-- Modal modification couleurs-->
           <div class="modal fade" id="modelId{{$couleur->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Formulaire de modification de la couleur</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="{{route('couleurs.edit', $couleur->id)}}" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="row">                                        
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="">
                                            <div class="form-group">
                                                <label for="">Produits</label>

                                                <select class="js-example-basic-multiple" id="produit" type="text" name="produit[]"  autofocus multiple="multiple" style="width: 527px">

                                                    @foreach($produits as $produit)
                                                        <option value="{{ $produit->id }}"

                                                        {{in_array($produit->id, old('produit') ?: $couleur->produits->pluck('id')->toArray()) ? 'selected' : ''}}


                                                            > {{ $produit->nom }}</option>
                                                    @endforeach

                                                  
                                                </select>
                                                
                                             </div>


                                            <div class="form-group {{$errors->has('designation') ? 'has-error' : '' }}">
                                                <label for="">Couleurs</label>

                                               <input name="designation" type="text"  class="form-control" placeholder="Entrez la couleur" value="{{$couleur->designation}}"  style="width: 527px">

                                                    {!! $errors->first('designation', '<p id="error">:message</p>')!!}
                                                
                                            </div>


                                            <div class="form-group">
                                                <!-- <label for="image">Image</label> -->
                                                <input type="file" class="form-control-file" name="image" id="image" value="image">
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
        <!-- End modal modification couleur -->




        <!-- modal suppression couleur -->
        <div id="DangerModalalert{{$couleur->id}}" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                    <div class="modal-body">
                        <span class="adminpro-icon adminpro-danger-error modal-check-pro information-icon-pro"></span>
                        <h2>Attention!</h2>
                        <p>Êtes-vous sûr de vouloir supprimer cette couleur?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('destroy.couleur', $couleur->id)}}" method="POST">
                            @csrf
                            <a data-dismiss="modal" href="#">Annuler</a>
                            <input type="submit" value="Supprimer">
                        </form>
                    </div>
                </div>
            </div>
        </div>
       <!--  End modal suppression couleur-->
      @endforeach
       









    @foreach ($tailles as $taille)

             <!-- Modal modification tailles-->
           <div class="modal fade" id="modelIdTaille{{$taille->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Formulaire de modification de la taille</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="{{route('tailles.edit', $taille->id)}}" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="row">                                        
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="">
                                            <div class="form-group">
                                                <label for="">Produits</label>

                                                <select class="js-example-basic-multiple" id="produit" type="text" name="produit[]"  autofocus multiple="multiple" style="width: 527px">

                                                    @foreach($produits as $produit)
                                                        <option value="{{ $produit->id }}"
                                                            


                                                        {{in_array($produit->id, old('produit') ?: $taille->produits->pluck('id')->toArray()) ? 'selected' : ''}}



                                                            > {{ $produit->nom }}</option>
                                                    @endforeach

                                                  
                                                </select>
                                                
                                             </div>


                                            <div class="form-group {{$errors->has('designation') ? 'has-error' : '' }}">
                                                <label for="">Taille</label>

                                               <input name="designation" type="text"  class="form-control" placeholder="Entrez la couleur" value="{{$taille->designation}}"  style="width: 527px">

                                                    {!! $errors->first('designation', '<p id="error">:message</p>')!!}
                                                
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
        <!-- End modal modification tailles -->




        <!-- modal suppression tailles -->
        <div id="DangerModalalertTaille{{$taille->id}}" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                    <div class="modal-body">
                        <span class="adminpro-icon adminpro-danger-error modal-check-pro information-icon-pro"></span>
                        <h2>Attention!</h2>
                        <p>Êtes-vous sûr de vouloir supprimer cette taille?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('destroy.tailles', $taille->id)}}" method="POST">
                            @csrf
                            <a data-dismiss="modal" href="#">Annuler</a>
                            <input type="submit" value="Supprimer">
                        </form>
                    </div>
                </div>
            </div>
        </div>
       <!--  End modal suppression tailles-->
      @endforeach
       
















        @foreach ($produits as $produit)
            <!-- Modal pictures-->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter une image</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <form action="{{route('addphoto')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="">Produit</label>
                                          <select class="form-control" name="produits" id="">
                                           @foreach ($produits as $produit)
                                               <option value="{{$produit->id}}">{{$produit->nom}}</option>
                                           @endforeach
                                            
                                          </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control-file" name="image" id="image">
                                    </div>
                                    
                                    <!-- <div class="form-group">
                                        <label for="">Description</label>
                                        <input type="text" class="form-control" name="description" id="">
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <label for="">Code photo</label>
                                          <select class="form-control" name="code_photo" id="">
                                            <option>1</option>
                                            <option>0</option>
                                          </select>
                                    </div> -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        @endforeach

      
            
    </div>

@endsection



<!-- Pour charger les produits -->
@section('select')
    <script>
        $(function()
        {
          $(".js-example-basic-multiple").select2();
        });
    </script>
@stop