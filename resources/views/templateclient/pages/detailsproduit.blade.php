@extends('templateclient.layouts.app', ['title' => 'Détails d\'un produit'])

@section('extra-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('assets/templatefront/css/imagedetails.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('content')


        <section class="section-name padding-y-sm mb-4">
            <div class="card mb-5" style="margin-top: -15px;">
                <div class="card-body">
                    <ol class="breadcrumb float-left">
                        <li class="breadcrumb-item"><a href="{{ route('acceuil') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('produits') }}" >Tous nos produits</a></li>
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

                                    

                                   <!-- Debut de l'affichage du produit -->
                                    <article class="gallery-wrap ">
                                     <!-- Pour Ordi -->
                                        <!-- img-big-wrap -->
                                    <div class=" wm-zoom-container my-zoom-1" id="pourordi">
                                         <!-- image principale -->
                                       <div class="wm-zoom-box">
                                           <a class="zomImg"><img src="{{ asset('uploads/' . $produits->photo) }}" class="imagePricipale wm-zoom-default-img" alt="alternative text" data-hight-src="{{ asset('uploads/' . $produits->photo) }}" data-loader-src="{{ asset('assets/templatefront/images/loader.gif') }}"></a>
                                       </div>


                                       <!--  SousImage -->
                                        <div class="thumbs-wrap mt-4">
                                                <!-- pour recuperer l'image principale -->
                                                <a class="item-thumb"><img src="{{ asset('uploads/' . $produits->photo) }}" height="60px" width="60px;" class="sousImage"></a>


                                                @foreach ($images as $image)
                                                    <a  class="item-thumb"><img src="{{ asset('uploads/' . $image->images) }}" height="60px" width="60px;" class="sousImage" ></a>
                                                @endforeach   
                                        </div>
                                        <!--End  SousImage -->
                                   </div>
                                    <!-- Pour Ordi -->





                                        <!-- Pour telephone -->
                                      <div class="" id="pourtelephone">
                                        <!--Librairy defiler image-->
                                            <div class="slider-wrapper" id="slider">
                                                <ul class="slider-img">
                                                  <li>
                                                   
                                                  <div>
                                                    <!-- image principale -->
                                                    <a class="reduireImage">
                                                        <img class="myImg" src="{{ asset('uploads/' . $produits->photo) }}" alt="" class="imagePricipaletelephonemodal" title="voir plus">
                                                    </a>
                                                  </div>
                                               
                                                  </li>

                                                    <!-- sous image qui s'affiche au meme nivo que l'image principale -->
                                                    @foreach ($images as $image)
                                                    <li>
                                                        <img class="myImg" src="{{ asset('uploads/' . $image->images) }}"class="" alt="">
                                                    </li>
                                                    @endforeach
                                                </ul>
                                              </div>
                                        <!-- End Librairy defiler image -->
                                      </div>
                                       <!-- Pour telephone -->

                                    </article>
                                     <!-- Debut de l'affichage du produit -->
                                </div>
                            </aside>
                            <main class="col-md-8">
                                <article class="product-info-aside">
                                    <h3 class="title mt-3" id="titleResponsive">{{$produits->nom}}
                                    </h3>

                                    <p class="text-left mr-4">

                                        <!-- Pour afficher le stock -->
                                        @if ($quantites === 'Disponible')
                                            <span class="badge badge-pill btn-warning">
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

                                             

                                        </div>
                                        <div class="form-group col-md">
                                           
                                                <form action="{{ route('cart.store') }}" method="POST" class="d-inline" enctype="multipart/form-data">
    
                                                @csrf

                                                <input type="hidden" name="produits_id" value="{{$produits->id}}">

                                        <div class="row">

                                            <div class="col-md-2">
                                                <label> <strong>Quantité</strong></label>
                                                 <input name="quantites" type="number" class="form-control qtte-val" name="qty" id="qty" data-id="" data-quantite="" value="1" min="1" max="50" style="width: 60px;" >
                                            </div>  


                                            <div class="col-md-3" id="tailleResponsive">
                                                
                                                    @if ($tailles->count() > 0)
                                                <div>
                                                    <label><strong>Tailles : </strong></label>
                                                </div>
                                                    <select name="tailles" id="tailles" class=" form-control col-md-10 mb-4">

                                                    <option disabled="" selected>Selectionnez</option>

                                                       
                                                        @foreach ($tailles as $taille)
                                                        
                                                        @if ($taille->pivot->quantite > 0)
                                                             <option >{{$taille->designation}}</option>
                                                        @endif
                                                        
                                                          
                                                        @endforeach
                                                    </select>
                                                
                                            @endif
                                           
                                            </div> 
                                            
                                            
                                            <div class="col-md-4" id="couleurResponsive">
                                           
                                                @if ($couleurs->count() > 0)
                                                <div id="couleurResponsive">
                                                    <h6>Couleur : </h6>
                                               </div>
                                               <div class="thumbs-wrap mb-4">
                                               
                                                @foreach ($couleurs as $couleur)

                                                    @if ($couleur->pivot->quantite > 0)
                                                      <label for="couleurs">
                                                        <a class="item-thumb"><img src="{{ asset('uploads/' . $couleur->pivot->images ? $couleur->pivot->images : '') }}" height="60px" width="45px;" class="sousImage sousImageCouleur img-thumbnail" title="Clique" alt="Une couleur" ></a>
                                                        </label>
                                                 
                                                  @endif

                                                @endforeach
                                                
                                            <!-- input en dehors du boucle -->
                                                <input type="hidden" name="couleurs" id="couleurs">

                                                <!-- select -->
                                            </div>
                                            @endif
                                           
                                            </div>


                                        </div>
                                        <hr> 
                                            
                                           


                                        
                                            <button type="submit" class="btn  btn-primary mt-4 buttonPanierResponsive" id="buttonPanier">
                                                <i class="fas fa-shopping-cart"></i>
                                                <span class="text">Ajouter  panier</span>
                                            </button>
                                        

                                           


                                            <!-- <button type="text" class="btn btn-success mt-4">
                                                <i class="fas fa-heart"></i>
                                                <span class="text">Achêter maintenant</span>
                                            </button> -->
                                            </form>
                                           
                                            
                                           <!-- <a href="{{ route('favoris.store', $produits->id) }}" class="btn btn-light mt-4">
                                               <i class="fas fa-heart"></i>
                                               <span class="text">Ajouter aux favoris</span>
                                           </a> -->

                                       

                                           <form action="{{ route('acheter') }}" method="POST" class="d-inline" enctype="multipart/form-data">

                                                @csrf

                                                <input type="hidden" name="produits_id" value="{{$produits->id}}">

                                                <!-- Pour la quantité  -->
                                                <input type="hidden" name="quantitesAchat" class="qtyAchat" value="1">

                                                <!-- Pour la couleur  -->
                                                <input type="hidden" name="couleurAchat" class="couleurAchat">

                                                <!-- Pour la taille  -->
                                                <input type="hidden" name="tailleAchat" class="tailleAchat">


                                            @if ($quantites === 'Disponible')
                                               @guest

                                                    <button type ="button" class="btn btn-success buttonAchatResponsive mt-4" data-toggle="modal" data-target="#addAchatModal" id="buttonAchat">
                                                    <i class="achatResp fa  fa-play-circle" aria-hidden="true"></i>
                                                    <span class="text ">Achêter maintenant</span>
                                                    </button>
                                               @else
                                                    <button type="text" class="btn btn-success mt-4" id="buttonAchat">
                                                    <i class="achatResp fa fa-play-circle" aria-hidden="true"></i>
                                                    <span class="text">Achêter maintenant</span>
                                                    </button>
                                               @endguest
                                            @endif

            <!--  Modal pour inviter -->
           <div class="modal fade" id="addAchatModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" style="margin-left: 6em;">Faites un choix !</h4>


                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                            <div class="text-center mt-4 h6 ">

                                    <button type="text" class="btn btn-success mt-4" id="buttonAchat">
                                    
                                    <span class="text">Voulez-vous achêter en tant qu'invité ? </span>
                                    </button>   
                               
                                     <hr>

                                <a href="{{ route('inscrire') }}"> <p>Ou créer un compte avant d'achêtez ?</p></a>

                            </div>
                           
                        <div class="modal-body">
                            <div class="container-fluid">
                                
                        </div>
                        
                    </div>
                </div>
            </div>
           <!--  End Modal pour invité -->

           
                                           </form>
                                       
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
                    

               <!--  Produit similaire -->
                    <section class="section-name padding-y-sm mt-5">
                        <div class="container">

                           <header class="section-heading heading-line">
                                <h4 class="title-section text-uppercase">Produits similaire</h4>
                            </header>


                            <div class="row owl-carousel owl-theme">
                               
                               @foreach ($produitSimilaire as $prod)
                                   <div class="">
                                        <figure class="card card-product-grid rounded shadow-sm"
                                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="50">
                                            <div class="img-wrap">
                                               <a href="{{route('details', $prod->id)}}">
                                                    <img src="{{ asset('uploads/' . $prod->photo) }}">
                                               </a>
                                                <span class="topbar">
                                                    <a href="{{ route('favoris.store', $prod->id) }}" class="float-right"><i class="fa fa-heart"></i></a>
                                                </span>
                                                <a class="btn-overlay" href="{{route('details', $prod->id)}}"><i class="fa fa-search-plus"></i>  Aperçu</a>
                                            </div>
                                                <figcaption class="info-wrap border-top">
                                                    <a href="{{route('details', $prod->id)}}" class="title">{{$prod->nom}}</a>
                                                    <div class="price mt-2">{{$prod->getprixminimum()}}</div>
                                                </figcaption>
                                        </figure>
                                    </div>
                               @endforeach   
                            </div>  
                        </div>
                    </section>
               <!-- End produit similaire -->





                </section>

            </div>
        </section>







            
        <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01 ml-2">
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
                    <div class="tab-content p-t-43 " style="margin-top: 3em; margin-bottom: 3em;">
                        <!-- - -->
                        <div class="tab-pane fade show active " id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md  text-center">
                                <p class=" col-lg-8 text-justify">
                                    Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus interdum. Morbi elementum sapien rhoncus pretium maximus. Nulla lectus enim, cursus et elementum sed, sodales vitae eros. Ut ex quam, porta consequat interdum in, faucibus eu velit. Quisque rhoncus ex ac libero varius molestie. Aenean tempor sit amet orci nec iaculis. Cras sit amet nulla libero. Curabitur dignissim, nunc nec laoreet consequat, purus nunc porta lacus, vel efficitur tellus augue in ipsum. Cras in arcu sed metus rutrum iaculis. Nulla non tempor erat. Duis in egestas nunc.
                                </p>
                            </div>
                            <hr>



                            <!-- copie color taille -->
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                  
                                  <ul class="p-lr-28 p-lr-15-sm">

                                        <li class="flex-w flex-t p-b-7 mt-3">
                                            <span class="stext-102 cl3 size-205">
                                               <strong> Nom : </strong>
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                               
                                            {{$produits->nom}}
                                               
                                                
                                            </span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7 mt-3">
                                            <span class="stext-102 cl3 size-205">
                                               <strong> Marque :</strong> 
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                               
                                            {{$produits->marque}}
                                               
                                                
                                            </span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7 mt-3">
                                            <span class="stext-102 cl3 size-205">
                                                <strong>Prix unitaire :</strong> 
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                               
                                            {{getprixminimumhelpers($produits->prix_unitaire)}}
                                               
                                                
                                            </span>
                                        </li>
                                      

                                        @if ($couleurs->count() > 0)
                                            <li class="flex-w flex-t p-b-7 mt-3">
                                            <span class="stext-102 cl3 size-205">
                                               <strong>Color : </strong>
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                @foreach ($couleurs as $couleur)
                                                    {{$couleur->designation}}{{$loop->last ? '' : ', '}}
                                                @endforeach
                                                
                                            </span>
                                        </li>
                                        @endif

                                        @if ($tailles->count() > 0)
                                           <li class="flex-w flex-t p-b-7 mt-3">
                                            <span class="stext-102 cl3 size-205">
                                               <strong> Size : </strong>
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                @foreach ($tailles as $taille)
                                                    {{$taille->designation}}{{$loop->last ? '' : ', '}}
                                                @endforeach
                                            </span>
                                        </li>
                                        @endif
                                    </ul>

                                </div>

                                
                            </div>
                              <!-- End copie color taille -->


                              <hr>
                              <!-- copie commentaire -->
                                <div class="row">
                                <div class="col-sm-10 col-md-6 col-lg-6 m-lr-auto">
                                    <div class="p-b-30 m-lr-15-sm">
                                        <!-- Review -->
                                        <div class="flex-w flex-t p-b-68">

                                            <div class="icon">
                                                @foreach ($avis as $avi)
                                                    <img class="rounded-circle img-sm border mt-5" 
                                                src="{{ asset('uploads/' . $avi->user->photo) }}" alt="AVATAR">

                                                    <span class="ml-3 mb-4">
                                                        <strong>
                                                          {{$avi->user->name}}  
                                                        </strong>
                                                    </span>

                                                    <p style="margin-left: 6em; margin-top: -2em;">
                                                            {{$avi->commentaire}}
                                                     </p>

                                                     <p style="margin-left: 6em; color:#888;">{{$avi->created_at}}</p>
                                                     <hr>
                                                    
                                                @endforeach

                                            </div>
                                            
                                    
                                        </div>
                                        
                                        
                                    </div>
                                </div>


                                <div class="col-sm-12 col-md-6 col-lg-6  text-center" style="margin-top: -5em;">
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
                                                <button type="submit" class="btn btn-primary btn-block">Poster &raquo;</button>

                                                <!-- btn btn-outline-primary btn-block -->
                                            </div>
                                        </form>
                                </div>
                            </div>
                              <!-- copie commentaire -->
                              

                        </div>

                        <!-- - -->
                        <div class="tab-pane fade" id="information" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                  
                                  <ul class="p-lr-28 p-lr-15-sm">

                                        <li class="flex-w flex-t p-b-7 mt-3">
                                            <span class="stext-102 cl3 size-205">
                                               <strong> Nom : </strong>
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                               
                                            {{$produits->nom}}
                                               
                                                
                                            </span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7 mt-3">
                                            <span class="stext-102 cl3 size-205">
                                               <strong> Marque :</strong> 
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                               
                                            {{$produits->marque}}
                                               
                                                
                                            </span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7 mt-3">
                                            <span class="stext-102 cl3 size-205">
                                                <strong>Prix unitaire :</strong> 
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                               
                                            {{getprixminimumhelpers($produits->prix_unitaire)}}
                                               
                                                
                                            </span>
                                        </li>
                                      

                                        @if ($couleurs->count() > 0)
                                            <li class="flex-w flex-t p-b-7 mt-3">
                                            <span class="stext-102 cl3 size-205">
                                               <strong>Color : </strong>
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                @foreach ($couleurs as $couleur)
                                                
                                                    {{$couleur->designation}}{{$loop->last ? '' : ', '}}
                                                
                                                @endforeach
                                                
                                            </span>
                                        </li>
                                        @endif

                                        @if ($tailles->count() > 0)
                                           <li class="flex-w flex-t p-b-7 mt-3">
                                            <span class="stext-102 cl3 size-205">
                                               <strong> Size : </strong>
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                @foreach ($tailles as $taille)
                                                    {{$taille->designation}}{{$loop->last ? '' : ', '}}
                                                @endforeach
                                            </span>
                                        </li>
                                        @endif
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
                                                src="{{ asset('uploads/' . $avi->user->photo) }}" alt="AVATAR">

                                                    <span class="ml-3 mb-4">
                                                        <strong>
                                                          {{$avi->user->name}}  
                                                        </strong>
                                                    </span>

                                                    <p style="margin-left: 6em; margin-top: -2em;">
                                                            {{$avi->commentaire}}
                                                     </p>

                                                     <p style="margin-left: 6em; color:#888;">{{$avi->created_at}}</p>
                                                     <hr>
                                                    
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
                                                <button type="submit" class="btn btn-primary btn-block">Poster &raquo;</button>


                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




  <!-- The Modal -->
<div id="myModal" class="modal modarestelephone">

  <!-- The Close Button -->
  <span id="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>

        

        
@endsection

@section('sousImage')
    <script>
        var imagePrincipale = document.querySelector('.imagePricipale');
        var imagePricipaletelephonemodal = document.querySelector('.imagePricipaletelephonemodal');
        var sousImage = document.querySelectorAll('.sousImage');
        var sousImageCouleur = document.querySelectorAll('.sousImageCouleur');

       //Pour selectionner la quantité du premier formulaire pour le second formulaire
        $("#qty").bind('keyup mouseup', function () {
            document.querySelector('.qtyAchat').value = this.value;
        });


    

          @if (/*$couleurs->count() > 0 ||*/ $tailles->count() > 0)

                /*Pour selectionner une couleur par defaut qui est l'img 0*/
                @if ($couleurs->count() > 0)
                    document.querySelector('#couleurs').value = sousImageCouleur[0].src;

                    /*Pour selectionner une couleur par defaut qui est l'img 0 pour le 2eme formulaire*/
                    document.querySelector('.couleurAchat').value = sousImageCouleur[0].src;

                @endif

                /*Pour selectionner une quantite par defaut pour le second formulaire qui est 1*/
                /*document.querySelector('.qtyAchat').value = 1;*/


               


               
               
                /*Pour rendre le button ajouter panier et acheter maintenant disabled tant qu'on ne click pas sur la taille*/
               var tailles = document.querySelector('#tailles');
               var buttonPanier = document.querySelector('#buttonPanier');
               var buttonAchat = document.querySelector('#buttonAchat');
               
            

               buttonPanier.disabled = true;
               buttonAchat.disabled = true;

             
               tailles.onchange = function(){
                   if(tailles.value)
                   {
                        buttonPanier.disabled = false;
                        buttonAchat.disabled = false;
                       
                   }

                  

                   //Pour selectionner la taille du premier formulaire pour le second formulaire
                    document.querySelector('.tailleAchat').value = this.value;



               }

          @endif


         

        sousImage.forEach((element) => element.addEventListener('click', changeImage));

        function changeImage(e)
        {
            //Tu charge  la source de l'image principale par la source de l'image qu'on as cliqué nivo ordi
            imagePrincipale.src = this.src;

             //Tu charge  la source de l'image principale par la source de l'image qu'on as cliqué nivo telephone
            imagePricipaletelephonemodal.src = this.src;

           /* Pour changez l'image hover*/
            imagePrincipale.dataset.hightSrc = this.src; 
           /* $('.imagePrincipale').attr('data-hight-src', this.src); */

        }

        sousImageCouleur.forEach((element) => element.addEventListener('click', changeCouleur));

        function changeCouleur(element){

             /*On recupere le name de l'input on remplace par l'image */
             document.querySelector('#couleurs').value = this.src;

             //Pour selectionner la couleur du premier formulaire pour le second formulaire
             document.querySelector('.couleurAchat').value = this.src;

        }





    </script>


@stop






@section('modalimage')
    <script src="{{ asset('assets/templatefront/js/modalimage.js') }}"></script>
@stop


@section('zoom')
     <!--  Pour le chargement du zoom -->
    <script src="{{asset('assets/templatefront/js/jquery-1.11.1.js')}}"></script>
    <script src="{{asset('assets/templatefront/js/jquery.wm-zoom-1.0.min.js')}}"></script>
    <!--  End Pour le chargement du zoom -->

     <script src="{{asset('assets/templatefront/js/imagedetails.js')}}"></script>


    <script type="text/javascript">

       $(document).ready(function(){
            $('.my-zoom-1').WMZoom();

            $('.my-zoom-2').WMZoom({

                config : {inner : true}
            });
        });
    </script>


   

@stop






