@extends('templateadmin.layouts.app')

@section('content')

<!-- Single pro tab start-->
<div class="single-product-tab-area mg-tb-15">
<!-- Single pro tab review Start-->
<div class="single-pro-review-area">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="review-tab-pro-inner">
<ul id="myTab3" class="tab-review-design">
    <li class="active"><a href="#description"><i class="fa fa-pencil" aria-hidden="true"></i>Info Produit</a></li>
</ul>
<div id="myTabContent" class="tab-content custom-product-edit">
    <div class="product-tab-list tab-pane fade active in" id="description">
        <form action="{{route('storeproduit')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">                                        
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="review-content-section">



                        <div class="input-group mg-b-pro-edt ">
                            <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                            <select class="js-example-basic-multiple" id="categorie" type="text" name="categorie[]"  autofocus multiple="multiple" style="width: 455px">

                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}"> {{ $categorie->designation_categorie }}</option>
                                @endforeach

                              
                            </select>
                        </div>



                       





                        <div class="input-group mg-b-pro-edt {{$errors->has('nom') ? 'has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                            <input name="nom" type="text" class="form-control" value="{{old('nom')}}" placeholder="Nom du produit">

                            {!! $errors->first('nom', '<p id="error">:message</p>')!!}
                        </div>
                        <div class="input-group mg-b-pro-edt {{$errors->has('prix_maximum') ? 'has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                            <input name="prix_maximum" type="text" class="form-control" placeholder="Prix maximum" value="{{old('prix_maximum')}}">

                            {!! $errors->first('prix_maximum', '<p id="error">:message</p>')!!}
                        </div>
                        <div class="input-group mg-b-pro-edt {{$errors->has('marque') ? 'has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                            <input name="marque" type="text" class="form-control" placeholder="Fabriquant" value="{{old('marque')}}">

                            {!! $errors->first('marque', '<p id="error">:message</p>')!!}
                        </div>

                        <div class="input-group mg-b-pro-edt  {{$errors->has('fournisseur') ? 'has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                            <input name="fournisseur" type="text" class="form-control" placeholder="Fournisseur" value="{{old('fournisseur')}}">

                            {!! $errors->first('fournisseur', '<p id="error">:message</p>')!!}
                        </div>
                        <div class="input-group mg-b-pro-edt {{$errors->has('description') ? 'has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-ticket" aria-hidden="true"></i></span>
                           <textarea name="description" id="" cols="50" rows="5" class="form-control" placeholder="Description" value="{{old('description')}}"></textarea>

                           {!! $errors->first('description', '<p id="error">:message</p>')!!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="review-content-section">
                        
                        <div class="input-group mg-b-pro-edt {{$errors->has('marque') ? 'has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-ticket" aria-hidden="true"></i></span>
                            <input name="marque" type="text" class="form-control" placeholder="Marque" value="{{old('marque')}}">

                             {!! $errors->first('marque', '<p id="error">:message</p>')!!}
                        </div>
                        <div class="input-group mg-b-pro-edt {{$errors->has('prix_unitaire') ? 'has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                            <input name="prix_unitaire" type="text" class="form-control" placeholder="Prix minimum" value="{{old('prix_unitaire')}}">

                            {!! $errors->first('prix_unitaire', '<p id="error">:message</p>')!!}
                        </div>
                        <div class="input-group mg-b-pro-edt {{$errors->has('quantite') ? 'has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span>
                            <input name="quantite" type="number" class="form-control" placeholder="Quantité" value="{{old('quantite')}}">

                            {!! $errors->first('quantite', '<p id="error">:message</p>')!!}
                        </div>
                        <div class="input-group mg-b-pro-edt {{$errors->has('titre_video') ? 'has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                            <input name="titre_video" type="text" class="form-control" placeholder="Url de la video" value="{{old('titre_video')}}">

                            {!! $errors->first('titre_video', '<p id="error">:message</p>')!!}
                        </div>
                    </div>
                    <div class="input-group mg-b-pro-edt {{$errors->has('image') ? 'has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                        <input type="file" class="custom-file-input form-control" value="{{old('image')}}" id="customFile" name="image" value="{{old('image')}}">

                         {!! $errors->first('image', '<p id="error">:message</p>')!!}
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 5%;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="text-center mg-b-pro-edt custom-pro-edt-ds">
                        <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Save
                        </button>
                        <button type="button" class="btn btn-warning waves-effect waves-light">Discard
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    
</div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection


@section('select')
    <script>
        $(function()
        {
          $(".js-example-basic-multiple").select2();
        });
    </script>
@stop