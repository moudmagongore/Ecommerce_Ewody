@extends('templateadmin.layouts.app')

@section('content')
    <div class="product-status mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Liste des coupons</h4>
                        <div class="add-product">
                            <a href=""  data-toggle="modal" data-target="#addcouponmodal">Ajouter un coupon</a>
                        </div>
                        <table>
                            <tr>
                                <th>code</th>
                                <th>Remise en pourcentage</th>
                                <th>Actions</th>
                            </tr>
                        @if (count($coupons)>0)

                            @foreach ($coupons as $coupon)
                                <tr>
                                    
                                    <td>{{$coupon->code}}</td>
                                    <td>{{$coupon->remise_en_pourcentage}}% </td>
                                    
                                    
                                    <td>
                                        <button  title="Detail" class="pd-setting-ed" data-toggle="modal" data-target="#detailmodal{{$coupon->id}}"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>

                                        <button data-toggle="modal" data-target="#modelId{{$coupon->id}}" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>

                                        <button data-toggle="modal" data-target="#DangerModalalert{{$coupon->id}}" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>                                   
                                   
                                </tr>
                            
                            @endforeach

                        @else
                            <h6>La table est vide.</h6>
                        @endif

                            
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal ajout-->
    <div class="modal fade" id="addcouponmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Formulaire d'ajout d'un coupon</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{route('add-coupon')}}" method="POST">
                            @csrf
                            <div class="row">                                        
                                <div class="input-group mg-b-pro-edt {{$errors->has('code') ? 'has-error' : '' }}">
                                    <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>                                                
                                    <input name="code" type="text"  class="form-control" placeholder="Entrez le code">

                                    {!! $errors->first('code', '<p id="error">:message</p>')!!}
                                </div>



                                <div class="input-group mg-b-pro-edt {{$errors->has('remise_en_pourcentage') ? 'has-error' : '' }}">
                                    <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>                                                
                                    <input name="remise_en_pourcentage" type="number"  class="form-control" placeholder="Entrez la remise en pourcentage">

                                     {!! $errors->first('remise_en_pourcentage', '<p id="error">:message</p>')!!}
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
    <!-- End Modal Ajout  -->








    @foreach ($coupons as $coupon)
    
         <!-- Modal detail-->
        <div class="modal fade" id="detailmodal{{$coupon->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Détails d'un coupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    
                    <form class="form-details">
                        <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" disabled  value="{{$coupon->code}}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" disabled  value="{{$coupon->remise_en_pourcentage}}">
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
        <!-- End Modal detail-->






        <!-- Modal suppression -->
        <div id="DangerModalalert{{$coupon->id}}" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                    <div class="modal-body">
                        <span class="adminpro-icon adminpro-danger-error modal-check-pro information-icon-pro"></span>
                        <h2>Attention!</h2>
                        <p>Êtes-vous sûr de vouloir Supprimer ce coupon?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('destroy-coupon', $coupon->id)}}" method="POST">
                            @csrf
                            <a data-dismiss="modal" href="#">Annuler</a>
                            <input type="submit" value="Archiver" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modal suppression -->





        <!-- Modal Modification coupon --> 
         <div class="modal fade" id="modelId{{$coupon->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Formulaire de modification d'un coupon</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <form action="{{route('edit-coupon', $coupon->id)}}" method="POST">
                                    @csrf
                                    <div class="row">                                        
                                            <div class="row">
                                                <div class="form-group col-md-6 {{$errors->has('code') ? 'has-error' : '' }}">
                                                    <label for="code">Code</label>
                                                    <input name="code" type="text" value="{{$coupon->code}}" class="form-control">

                                                    {!! $errors->first('code', '<p id="error">:message</p>')!!}
                                                </div>
                                                 <div class="form-group col-md-6 {{$errors->has('remise_en_pourcentage') ? 'has-error' : '' }}">
                                                    <label for="remise_en_pourcentage">remise en pourcentage</label>
                                                    <input name="remise_en_pourcentage" type="number" value="{{$coupon->remise_en_pourcentage}}" class="form-control">

                                                    {!! $errors->first('remise_en_pourcentage', '<p id="error">:message</p>')!!}
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
         <!-- End Modal Modification coupon -->

    @endforeach

@stop