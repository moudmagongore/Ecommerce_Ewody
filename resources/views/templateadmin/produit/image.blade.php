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
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">

                                    
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
                                    <img src="{{ URL::to('/') }}/image_produit/{{$image->nom}}" alt="" style="height:100px; width:100px"/>
                                    </div>
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




        @foreach ($produits as $produit)
            <!-- Modal -->
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
                                        <label for="">Image</label>
                                        <input type="file" class="form-control-file" name="file" id="file">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Produit</label>
                                        <input type="text" class="form-control" value="{{$produit->id}}" name="produit" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <input type="text" class="form-control" name="description" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Code photo</label>
                                          <select class="form-control" name="code_photo" id="">
                                            <option>1</option>
                                            <option>0</option>
                                          </select>
                                    </div>
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