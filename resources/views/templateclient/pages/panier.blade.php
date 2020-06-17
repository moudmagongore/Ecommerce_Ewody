@extends('templateclient.layouts.app', ['title' => 'Mon panier'])

@section('extra-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
       @if (Cart::count() > 0 )
           <section class="section-content padding-y">
            <div class="container">
                <div class="row">
                    <main class="col-md-8 mb-4">
                        <div class="cardpanier card">
                            <!--Panier Pour ordi-->
                            <table class="table table-borderless table-shopping-cart">
                                <thead class="text-muted">
                                    <tr class="small text-uppercase">
                                        <th scope="col">Produit</th>
                                       
                                        <th scope="col" id="nomP">Nom</th>

                                         <th scope="col">Tailles</th>
                                        
                                        <th scope="col">Prix</th>

                                        <th scope="col">Quantié</th>
                                         <th scope="col">Total</th>
                                        <th scope="col" id="actionsP" > Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach (Cart::content() as $produit)
                                       <tr id="contenueTableau">
                                        <td>
                                            <div>

                                            @if ($produit->options->couleur)
                                               <figure class="itemside">
                                                    <div class="aside"><img src="{{ asset('uploads/' . $produit->options->has('couleur') ? $produit->options->couleur : '') }}"></div>


                                                </figure>
                                            @else
                                                <figure class="itemside">
                                                    <div class="aside"><img src="{{ asset('uploads/' . $produit->model->photo) }}"></div>
                                                </figure>
                                            @endif
                                            </div>
                                        </td>

                                        

                                        <td class="prices">
                                            <div>
                                                <div class="price-wrap">
                                                    <var class="price">{{$produit->model->nom}}</var>
                                                </div>
                                            </div>
                                        </td>

                                        @if ($produit->options->taille)
                                            <td>
                                            {{$produit->options->has('taille') ? $produit->options->taille : ''}}
                                            </td>
                                        @else
                                            <td>Vide</td>
                                        @endif
                                        

                                        
                                        <td class="prices">
                                            <div>
                                                <div class="price-wrap">
                                                    <var class="price">{{$produit->model->getprixminimum()}}</var>
                                                    <!-- <small class="text-muted">148 000 / unité</small> -->
                                                </div>
                                            </div>
                                        </td>

                                        <td>

                                            <div >

                                                <input type="number" class="form-control qtte-val" name="qty" id="qty" data-id="{{$produit->rowId}}" data-quantite="{{$produit->model->quantite}}" value="{{$produit->qty}}" min="1">

                                                

                                                <!-- <select name="qty" id="qty" class="custom-select" data-id="{{$produit->rowId}}" data-quantite="{{$produit->model->quantite}}">
                                                    @for ($i = 1; $i <= 50 ; $i++)
                                                        <option value="{{ $i }}" {{$i == $produit->qty ? 'selected' : ''}}>{{$i}}</option>
                                                    @endfor
                                                </select> -->
                                            </div>

                                        </td>

                                        <td class="prices">
                                            <div>
                                                <div class="price-wrap">
                                                    <var class="price">{{getprixminimumhelpers($produit->subtotal())}}</var>
                                                    <small class="text-muted">{{$produit->model->getprixminimum()}} / unité</small>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-right">
                                            <div>
                                                <form action="{{ route('cart.destroy', $produit->rowId) }}" method="post"
                                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet produit ?')" 
                                                    >

                                                    @csrf

                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-light"> <i class="fa fa-trash"></i></button>
                                                    
                                                </form>

                                                <a href="{{ route('details', $produit->id) }}" class="btn btn-light ml-2"> <i class="fa fa-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            <!--End Panier Pour ordi-->





                              <!--Panier Pour mobile-->
                            <div class="row container" id="panierMobile">
                             @foreach (Cart::content() as $produit)
                               <aside class="col-md col-6 ">
                                    <h6 class="title">Produit</h6>
                                    <h6 class="title mt-5">Nom</h6>
                                    <h6 class="title mt-5">Taille</h6>
                                    <h6 class="title mt-5">Prix</h6>
                                    <h6 class="title mt-5">Quantité</h6>
                                    <h6 class="title mt-5 ">Total</h6>
                                    <h6 class="title mt-5">Actions</h6>
                                    <hr style="margin-top: 60px;">
                                   
                                    
                                </aside>
                               

                                
                                    <aside class="col-md col-6">
                                       
                                            @if ($produit->options->couleur)
                                               
                                            
                                                <p class="title titleImg mt-5">
                                                    <img src="{{ asset('uploads/' . $produit->options->has('couleur') ? $produit->options->couleur : '') }}">
                                                </p>

                                                
                                            @else
                                                
                                                <p class="title titleImg  mt-5">
                                                    <img src="{{ asset('uploads/' . $produit->model->photo) }}">
                                                </p>
                                                
                                            @endif


                                        <p class="title mt-3 ">
                                            {{$produit->model->nom}}
                                        </p>

                                        <p class="title mt-5">
                                            @if ($produit->options->taille)
                                                <p>
                                                    {{$produit->options->has('taille') ? $produit->options->taille : ''}}
                                                </p>
                                            @else
                                                <p>Null</p>
                                            @endif
                                        </p>

                                        <p class="title mt-5">
                                            {{$produit->model->getprixminimum()}}
                                        </p>

                                        <p class="title mt-5">
                                            <input type="number" class="form-control qtte-val" name="qty" id="qty" data-id="{{$produit->rowId}}" data-quantite="{{$produit->model->quantite}}" value="{{$produit->qty}}" min="1" style="width: 70px; margin-top: -18px;">
                                        </p>

                                        <p class="title" style="margin-top: 35px;">
                                            {{getprixminimumhelpers($produit->subtotal())}}
                                        </p>

                                        <p class="title" style="margin-top: 35px;">
                                            <form action="{{ route('cart.destroy', $produit->rowId) }}" method="post"
                                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet produit ?')" 
                                                    >

                                                    @csrf

                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-light"> <i class="fa fa-trash"></i></button>
                                                    
                                                </form>

                                                <a href="{{ route('details', $produit->id) }}" class="btn btn-light ml-2" style="margin-left: 50px !important; margin-top:-60px;"> <i class="fa fa-edit"></i></a>
                                                 

                                        </p>

                                    </aside>
                                @endforeach
                                 <hr>
                            </div>
                           <!--End Panier Pour mobile-->

                           
                            <div class="card-body border-top">
                                @guest
                               
                                    @if ($produit->model->quantite == 0)

                                        <a href="{{ route('produit-non-existe') }}" class="btn btn-danger float-md-right"> Valider la commande <i class="fa fa-chevron-right"></i> </a>
                                    <!--Pour la couleur et taille -->  
                                    @elseif($coulProdNotExist || $tailleProdNotExist)

                                        @if ($coulProdNotExist->quantite == 0 || $tailleProdNotExist->quantite == 0)
                                            <a href="{{ route('produit-non-existe') }}" class="btn btn-danger float-md-right"> Valider la commande <i class="fa fa-chevron-right"></i> </a>
                                        @else
                                            <a href="" class="btn btn-primary float-md-right" data-toggle="modal" data-target="#addcouponmodal"> Valider la commande <i class="fa fa-chevron-right"></i> </a> 
                                        @endif
                                        <!--Pour la couleur et taille --> 
                                    @else
                                        <a href="" class="btn btn-primary float-md-right" data-toggle="modal" data-target="#addcouponmodal"> Valider la commande <i class="fa fa-chevron-right"></i> </a>   
                                    @endif

                                @else



                                   @if ($produit->model->quantite == 0)

                                        <a href="{{ route('produit-non-existe') }}" class="btn btn-danger float-md-right"> Valider la commande <i class="fa fa-chevron-right"></i> </a>

                                    <!--Pour la couleur et taille -->
                                    @elseif($coulProdNotExist || $tailleProdNotExist)

                                        @if ($coulProdNotExist->quantite == 0 || $tailleProdNotExist->quantite == 0)
                                            <a href="{{ route('produit-non-existe') }}" class="btn btn-danger float-md-right"> Valider la commande <i class="fa fa-chevron-right"></i> </a>
                                        @else
                                            <a href="{{route('checkout')}}" class="btn btn-primary float-md-right"> Valider la commande <i class="fa fa-chevron-right"></i> </a>
                                        @endif
                                        <!--End Pour la couleur et taille -->
                                    @else
                                        <a href="{{route('checkout')}}" class="btn btn-primary float-md-right"> Valider la commande <i class="fa fa-chevron-right"></i> </a> 
                                    @endif

                                @endguest
                                <a href="{{route('acceuil')}}" id="buttonContinuerAchat" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continuer mes achats </a>


    <!--  Modal pour modifier statut -->
   <div class="modal fade" id="addcouponmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="margin-left: 6em;">Faites un choix !</h4>


                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                    <div class="text-center mt-4 h6 ">
                       <a href="{{route('checkout.invite')}}"> <p>Voulez-vous achêtez en tant qu'invitez ?</p></a><hr>

                        <a href="{{ route('inscrire') }}"> <p>Ou créer un compte avant d'achêtez ?</p></a>
                    </div>
                   
                <div class="modal-body">
                    <div class="container-fluid">
                        
                </div>
                
            </div>
        </div>
    </div>
   <!--  End Modal pour modifier statut -->
                            </div>
                        </div>
                    </main>
                    <aside class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">

                                <!-- si dans la requet on as une session qui as coupon on affiche le formulaire  ou bien si on as pas de coupon propose le formulaire-->
                                @if (!request()->session()->has('coupon'))
                                    <form action="{{ route('cart.store.coupon') }}" method="POST">

                                        @csrf

                                        <div class="form-group">
                                            <label>Avez-vous un coupon de réduction? Entrez-le dans le champ ci-dessous</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="code" placeholder="Entrez votre code ici">
                                                <span class="input-group-append"> 
                                                    <button type="submit" class="btn btn-primary">Valider</button>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <h6>Un coupon est déjà appliqué.</h6>
                                @endif
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                               
                                <dl class="dlist-align">
                                <dt>Sous-total:</dt>
                                <dd class="text-right"><strong>{{getprixminimumhelpers(Cart::subtotal())}}</strong></dd>
                                </dl>
                                <hr>
                              


                            {{-- On recupere le nom du coupon --}}
                            @if (request()->session()->has('coupon'))
                                <dl class="dlist-align">
                                <dt>Coupon
                                    <form action="{{ route('cart.destroy.coupon') }}" method="post" class="d-inline-block">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                    
                                    </form> : 
                                </dt>


                                <dd class="text-right"><strong>{{request()->session()->get('coupon')['code']}}</strong></dd>
                            </dl>
                            <hr>


                                {{-- On recupere la remise du coupon --}}
                               <dl class="dlist-align">
                                <dt>Réduction:</dt>
                                <dd class="text-right"><strong>{{getprixminimumhelpers(request()->session()->get('coupon')['remise_en_pourcentage'])}}</strong></dd>
                                </dl>
                               <hr>


                                                            
                                <!--Pour calculer le nouveau sous totale c'et le subtotal - le coupon -->
                                <dl class="dlist-align">
                                    <dt>N-sous-total:</dt>
                                    <dd class="text-right "><strong>{{getprixminimumhelpers(Cart::subtotal() - request()->session()->get('coupon')['remise_en_pourcentage'])}}</strong></dd>
                                </dl>
                                <hr>

                                 <dl class="dlist-align">
                                    <dt>Montan à payer:</dt>
                                    <dd class="text-right  h5"><strong>{{getprixminimumhelpers(Cart::subtotal() - request()->session()->get('coupon')['remise_en_pourcentage'])}}</strong></dd>
                                </dl>
                                <hr>
                            @endif
                        
                           

                                

                                @if(!request()->session()->has('coupon'))
                                    <dl class="dlist-align">
                                    <dt>Montan à payer:</dt>
                                    <dd class="text-right  h5 text-danger"><strong>{{getprixminimumhelpers(Cart::total())}}</strong></dd>
                                </dl>
                                <hr>
                                @endif
                                
                                <p class="text-center mb-3">
                                    <img src="{{ asset('assets/templatefront/images/misc/payments.png') }}" height="26" class="no-loader">
                                </p>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        @else
        <div class="col-md-12">
            <h5>Votre panier est vide pour le moment.</h5>
            <p>Mais vous pouvez visiter la <a href="{{ route('produits') }}" style="color: blue;">boutique</a> pour faire votre shopping.
            </p> <br><br>
        </div>
       @endif




     

@endsection   



@section('quantite')
    <script src="{{ asset('assets/templatefront/js/misajourquantite.js') }}"></script>
@stop

   