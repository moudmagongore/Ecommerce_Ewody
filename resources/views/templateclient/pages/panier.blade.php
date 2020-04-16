@extends('templateclient.layouts.app', ['title' => 'Mon panier'])

@section('extra-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
       @if (Cart::count() > 0 )
           <section class="section-content padding-y">
            <div class="container">
                <div class="row">
                    <main class="col-md-8">
                        <div class="card">
                            <table class="table table-borderless table-shopping-cart">
                                <thead class="text-muted">
                                    <tr class="small text-uppercase">
                                        <th scope="col">Produit</th>
                                        <th scope="col">Nom</th>
                                        
                                        <th scope="col">Prix (GNF)</th>

                                        <th scope="col-fluid">Quantié</th>
                                         <th scope="col-fluid">Total</th>
                                        <th scope="col" class="text-right"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach (Cart::content() as $produit)
                                       <tr>
                                        <td>
                                            <div>
                                                <figure class="itemside">
                                                    <div class="aside"><img src="{{ asset('storage/' . $produit->model->photo) }}"></div>
                                                </figure>
                                            </div>
                                        </td>

                                        <td class="prices">
                                            <div>
                                                <div class="price-wrap">
                                                    <var class="price">{{$produit->model->nom}}</var>
                                                </div>
                                            </div>
                                        </td>

                                        
                                        <td class="prices">
                                            <div>
                                                <div class="price-wrap">
                                                    <var class="price">{{$produit->model->getprixminimum()}}</var>
                                                    <!-- <small class="text-muted">148 000 / unité</small> -->
                                                </div>
                                            </div>
                                        </td>

                                        <td>

                                            <div>

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
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>

                            <div class="card-body border-top">
                                <a href="{{route('checkout')}}" class="btn btn-primary float-md-right"> Valider la commande <i class="fa fa-chevron-right"></i> </a>
                                <a href="{{route('acceuil')}}" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continuer mes achats </a>
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

   