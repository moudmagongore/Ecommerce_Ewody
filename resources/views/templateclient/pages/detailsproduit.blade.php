@extends('templateclient.layouts.app', ['title' => 'Détails d\'un produit'])

@section('extra-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

    @section('content')


        <section class="section-name padding-y-sm">
            <div class="card mb-3">
                <div class="card-body">
                    <ol class="breadcrumb float-left">
                        <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="all-categories.html">Tous nos produits</a></li>
                        <li class="breadcrumb-item">Catégorie</li>
                        @foreach ($produits->categories as $categorie)
                           <li class="breadcrumb-item">{{$categorie->designation_categorie}}</li>
                        @endforeach
                    </ol>
                </div>
            </div>
            <div class="container">
                <section class="section-content bg-white padding-y">
                    <div class="container">
                        <div class="row">
                            <aside class="col-md-4">
                                <div class="card">
                                   
                                        
                                   
                                    <article class="gallery-wrap">

                                        <div class="img-big-wrap">
                                            <div><a ><img id="myImg" src="{{ asset('storage/' . $produits->photo) }}" class="imagePricipale" title="voir plus"></a>
    

                                            </div>

                                        </div>


                                        <div class="thumbs-wrap mt-4">
                                            <!-- pour recuperer l'image principale -->
                                            <a class="item-thumb"><img src="{{ asset('storage/' . $produits->photo) }}" height="60px" width="60px;" class="sousImage"></a>


                                            @foreach ($images as $image)
                                                <a  class="item-thumb"><img src="{{ asset('storage/' . $image->images) }}" height="60px" width="60px;" class="sousImage"></a>
                                            @endforeach
                                        </div>
                                    </article>
                                </div>
                            </aside>
                            <main class="col-md-8">
                                <article class="product-info-aside">
                                    <h2 class="title mt-3">{{$produits->nom}}
                                    </h2>

                                    <p class="text-left mr-4">

                                        <!-- Pour afficher le stock -->
                                        @if ($quantites === 'Disponible')
                                            <span class="badge badge-pill badge-success">
                                            {{$quantites}}
                                        </span>

                                        @else
                                            <span class="badge badge-pill badge-danger">
                                            {{$quantites}}
                                        </span>

                                        @endif


                                       

                                    </p>
                                    <div class="mb-3">
                                        <var class="price h4">{{$produits->getprixminimum()}} </var>
                                    </div>
                                    <p>{{$produits->description}}</p>
                                    <ul class="list-check">
                                        @foreach ($caracteristiques as $cara)
                                            <li><span style="font-weight:bold">{{$cara->designation}}: </span>{{$cara->valeur}}</li>
                                        @endforeach
                                        
                                        
                                    </ul>

                                     
                                        

                                    <div class="form-row mt-4 qtte-block">
                                        <div class="form-group col-md flex-grow-0">   
                                            <!-- <div class="input-group mb-3 input-spinner quantity-manager">

                                                
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-light button-plus" type="button"> + </button>
                                                </div>
                                                <input type="text" class="form-control quantity" value="1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-light button-minus" type="button"> − </button>
                                                </div>
                                            </div> -->

                                             <!-- <input type="number" class="form-control qtte-val" name="qty" id="qty"
                                             @foreach (Cart::content() as $produit)
                                                 data-id="{{$produit->rowId}}" data-quantite="{{$produit->model->quantite}}" value="{{$produit->qty}}" min="1" 
                                             @endforeach
                                              style="width: 60px;" min="1"> -->

                                        </div>
                                        <div class="form-group col-md">
                                            @if ($quantites === 'Disponible')
                                                <form action="{{ route('cart.store') }}" method="POST" class="d-inline" enctype="multipart/form-data">
    
                                                @csrf

                                                <input type="hidden" name="produits_id" value="{{$produits->id}}">

                                        <div class="row">
                                            <div class="col-md-4">
                                                    @if ($tailles->count() > 0)
                                                <div>
                                                    <label><strong>Tailles : </strong></label>
                                                </div>
                                                    <select name="tailles" id="tailles" class=" form-control col-md-7 mt-4">

                                                    <option disabled="" selected>Selectionnez</option>

                                                       
                                                        @foreach ($tailles as $taille)
                                                        
                                                           <option >{{$taille->designation}}</option>
                                                        @endforeach
                                                    </select>
                                                
                                            @endif
                                            </div>

                                            
                                            <div class="col-md-6">
                                                @if ($couleurs->count() > 0)
                                                <div>
                                                    <h6>Couleur : </h6>
                                               </div>
                                               <div class="thumbs-wrap mt-4">
                                               
                                                @foreach ($couleurs as $couleur)

                                                    

                                                    <label for="couleurs">
                                                        <a class="item-thumb"><img src="{{ asset('storage/' . $couleur->pivot->images) }}" height="60px" width="60px;" class="sousImage img-thumbnail" title="Clique" alt="Une couleur" id="sousImageCouleur"></a>
                                                    </label>
                                                @endforeach

                                                <input type="hidden" name="couleurs" id="couleurs">

                                                <!-- select -->
                                            </div>
                                            @endif
                                            </div>
                                        </div>
                                        <hr>    

                                            <button type="submit" class="btn  btn-primary mt-4" id="buttonPanier" title="Veuillez selectionner une taille">
                                                <i class="fas fa-shopping-cart"></i>
                                                <span class="text">Ajouter au panier</span>
                                            </button>
                                            </form>
                                            @endif
                                            
                                            <a href="{{ route('favoris.store', $produits->id) }}" class="btn btn-light mt-4">
                                                <i class="fas fa-heart"></i>
                                                <span class="text">Ajouter aux favoris</span>
                                            </a>
                                        </div>
                                    </div>
                                   

                                    
                                    <!-- <div class="form-row total">
                                        <div class="form-group col-md">
                                            <h5 class="price total h4 text-right">120 000 </h5>
                                        </div>
                                    </div> -->
                                </article>
                               
                            </main>
                        </div>
                    </div>
                </section>
               
            </div>
        </section>







            
        <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01 ml-4">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                        </li>

                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#information" role="tab">Information suplementaire</a>
                        </li>

                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Avis (<strong>{{$avis->count()}}</strong>)</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43 ml-5" style="margin-top: 3em; margin-bottom: 3em;">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class=" col-lg-8 text-justify">
                                    Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus interdum. Morbi elementum sapien rhoncus pretium maximus. Nulla lectus enim, cursus et elementum sed, sodales vitae eros. Ut ex quam, porta consequat interdum in, faucibus eu velit. Quisque rhoncus ex ac libero varius molestie. Aenean tempor sit amet orci nec iaculis. Cras sit amet nulla libero. Curabitur dignissim, nunc nec laoreet consequat, purus nunc porta lacus, vel efficitur tellus augue in ipsum. Cras in arcu sed metus rutrum iaculis. Nulla non tempor erat. Duis in egestas nunc.
                                </p>
                            </div>
                        </div>

                        <!-- - -->
                        <div class="tab-pane fade" id="information" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                  
                                  <ul class="p-lr-28 p-lr-15-sm">
                                      

                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Color : 
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                @foreach ($couleurs as $couleur)
                                                    {{$couleur->designation}}{{$loop->last ? '' : ', '}}
                                                @endforeach
                                                
                                            </span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Size : 
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                @foreach ($tailles as $taille)
                                                    {{$taille->designation}}{{$loop->last ? '' : ', '}}
                                                @endforeach
                                            </span>
                                        </li>
                                    </ul>

                                </div>

                                
                            </div>
                        </div>

                        <!-- - -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-6 col-lg-6 m-lr-auto">
                                    <div class="p-b-30 m-lr-15-sm">
                                        <!-- Review -->
                                        <div class="flex-w flex-t p-b-68">

                                            <div class="icon">
                                                @foreach ($avis as $avi)
                                                    <img class="rounded-circle img-sm border mt-5" 
                                                src="{{ asset('storage/' . $avi->user->photo) }}" alt="AVATAR">

                                                    <span class="ml-3 mb-4">
                                                        <strong>
                                                          {{$avi->user->name}}  
                                                        </strong>
                                                    </span>

                                                    <p style="margin-left: 6em; margin-top: -2em;">
                                                            {{$avi->commentaire}}
                                                     </p>

                                                     <p style="margin-left: 6em; color:#888;">{{$avi->created_at}}</p>
                                                    
                                                @endforeach

                                            </div>
                                            
                                    
                                        </div>
                                        
                                        
                                    </div>
                                </div>


                                <div class="col-sm-10 col-md-6 col-lg-6 " style="margin-top: -5em;">
                                    <!-- Add review -->
                                        <form action="{{ route('store.avis', $produits->id) }}" method="POST" class="w-full" style="margin-top: 7em;">

                                            @csrf


                                            @if ($avis->count() > 0)
                                                <h4 class="mtext-108 cl2 p-b-7">
                                                Ajouter un avis sur cet produit
                                                </h4>
                                            @else
                                                <h4 class="mtext-108 cl2 p-b-7">
                                                Soyez le premier à ajouter un avis sur cet produit
                                                </h4>
                                            @endif

                                            

                                            <div class="row p-b-25">
                                                <div class="col-12 p-b-5 mt-5">
                                                    <label class="stext-102 cl3" for="message">Votre avis</label>
                                                    <textarea class="form-control {{$errors->has('message') ? 'is-invalid' : '' }}" rows="10" cols="5" name="message">{{old('message')}}</textarea>

                                                    {!!$errors->first('message', '<div class="invalid-feedback">:message</div>')!!}
                                                </div>
                                            </div>

                                            <div class="form-group mt-4">
                                                <button type="submit" class="btn btn-outline-primary">Poster &raquo;</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




<!-- The Modal -->
<div id="myModal" class="modal">

      <!-- The Close Button -->
      <span class="close">&times;</span>

      <!-- Modal Content (The Image) -->
      <img class="modal-content" id="img01">

      <!-- Modal Caption (Image Text) -->
      <div id="caption"></div>
</div>







    @endsection

@section('sousImage')
    <script>
        var imagePrincipale = document.querySelector('.imagePricipale');
        var sousImage = document.querySelectorAll('.sousImage');
        var sousImageCouleur = document.querySelectorAll('#sousImageCouleur');


          /*imagePrincipale.src = sousImageCouleur[0].src; */
          @if ($couleurs->count() > 0 || $tailles->count() > 0)

                /*Pour selectionner une couleur par defaut qui est l'img 0*/
                @if ($couleurs->count() > 0)
                    document.querySelector('#couleurs').value = sousImageCouleur[0].src;

                @endif
               
                /*Pour rendre le button ajouter panier disabled tant qu'on ne click pas sur la taille*/
               var tailles = document.querySelector('#tailles');
               var buttonPanier = document.querySelector('#buttonPanier');
               buttonPanier.disabled = true;
               tailles.onchange = function(){
                   if(tailles.value)
                   {
                       buttonPanier.disabled = false;
                   }

               }

          @endif
         

        sousImage.forEach((element) => element.addEventListener('click', changeImage));

        function changeImage(e)
        {
            //Tu charge  la source de l'image principale par la source de l'image qu'on as cliqué
            imagePrincipale.src = this.src;

            /*On recupere le name de l'input on remplace par l'image */
            document.querySelector('#couleurs').value = imagePrincipale.src;
        }



    </script>
@stop





@section('quantite')
    <script src="{{ asset('assets/templatefront/js/misajourquantite.js') }}"></script>
@stop


@section('quantite')
    <script src="{{ asset('assets/templatefront/js/misajourquantite.js') }}"></script>
@stop



@section('modalimage')
    <script src="{{ asset('assets/templatefront/js/modalimage.js') }}"></script>
@stop






