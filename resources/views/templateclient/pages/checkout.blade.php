@extends('templateclient.layouts.app')
@section('content')

	@if (Cart::count() > 0 )
        <section class="checkout container">

            <div class="row mt-4 justify-content-center">
                <div class="col-md-8">
                     <div class="card mb-3">
                            <div class="card-body">
                                <h5>Entrez vos informations pour la livraison</h5><br>
                                <form action="{{ route('checkout.store') }}" method="post" id="payment-form">

                                    @csrf


                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control {{$errors->has('nom') ? 'is-invalid' : '' }}" value="{{old('nom')}}" name="nom" placeholder="Nom">

                                            {!!$errors->first('nom', '<div class="invalid-feedback">:message</div>')!!}

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control {{$errors->has('prenom') ? 'is-invalid' : '' }}" value="{{old('prenom')}}" name="prenom" placeholder="Prenom">

                                             {!!$errors->first('prenom', '<div class="invalid-feedback">:message</div>')!!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control {{$errors->has('telephone') ? 'is-invalid' : '' }}" value="{{old('telephone')}}" name="telephone" placeholder="Telephone">

                                            {!!$errors->first('telephone', '<div class="invalid-feedback">:message</div>')!!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control {{$errors->has('adresse') ? 'is-invalid' : '' }}" value="{{old('adresse')}}" name="adresse" placeholder="Adresse">

                                            {!!$errors->first('adresse', '<div class="invalid-feedback">:message</div>')!!}
                                        </div>
                                    </div>

                <div class="form-group container">
                    <h6>Quand vous le vous la livraisson ?</h6>

                            
                        <input type="radio" name="aujour" value="aujour" class="form-check-input"><label for="aujour">Aujourd'hui</label>

                        <input type="radio" name="aujour" value="aujour" class="form-check-input ml-4"><label for="aujour" class="ml-5">Demain</label>
                   

                                        <div class="input-group">       
                                            
                                        </div>

                                       
                                            <label class="control-label">A une date ulterieur</label>
                                            <input type="date" class="form-control {{$errors->has('date') ? 'is-invalid' : '' }} " value="{{old('date')}}" name="date">

                                            {!!$errors->first('date', '<div class="invalid-feedback">:message</div>')!!}
                                       

                                    </div>


                                    <div class="for-group offset-md-5">
                                         <button class="btn btn-primary text-center">
                                                Valider la commande
                                         </button>
                                    </div>


                                    <div class="p-t-40 mt-4">
                                        <div class="flex-c-m images">
                                            <a href="#" class="m-all-1">
                                                <img src="{{ asset('assets/templatefront/images/icon-pay-01.png') }}" alt="ICON-PAY">
                                            </a>

                                            <a href="#" class="m-all-1">
                                                <img src="{{ asset('assets/templatefront/images/icon-pay-02.png') }}" alt="ICON-PAY">
                                            </a>

                                            <a href="#" class="m-all-1">
                                                <img src="{{ asset('assets/templatefront/images/icon-pay-03.png') }}" alt="ICON-PAY">
                                            </a>

                                        </div>
                                    </div>

                                    
                                </form>
                            </div>
                        </div>
                </div>

                <aside class="col-md-4">
                        
                        <div class="card">
                            <div class="card-body">
                                 <h6 class="text-center text-uppercase mb-4">votre commande</h6>
                                 <hr>
                                @foreach (Cart::content() as $produit)

                                    <dl class="dlist-align">
                                        <dt><strong>{{$produit->qty}}×</strong> {{$produit->model->nom}}</dt>
                                        <dd class="text-right  h6"><strong>{{getprixminimumhelpers($produit->subtotal())}}</strong></dd>
                                    </dl>
                                    <hr>
                                @endforeach

                                  @if (request()->session()->has('coupon'))

                                    <!--Pour calculer le nouveau sous totale c'et le subtotal - le coupon -->
                                        <dl class="dlist-align">
                                            <dt>N-sous-total:</dt>
                                            <dd class="text-right h5"><strong>{{getprixminimumhelpers(Cart::subtotal() - request()->session()->get('coupon')['remise_en_pourcentage'])}}</strong></dd>
                                        </dl>
                                        <hr>

                                        <dl class="dlist-align">
                                            <dt>Montan à payer:</dt>
                                            <dd class="text-right  h5"><strong>{{getprixminimumhelpers(Cart::subtotal() - request()->session()->get('coupon')['remise_en_pourcentage'])}}</strong></dd>
                                        </dl>
                                  @else

                                     <dl class="dlist-align">
                                    <dt>Sous-total:</dt>
                                    <dd class="text-right h5"><strong>{{getprixminimumhelpers(Cart::subtotal())}}</strong></dd>
                                    </dl>
                                    <hr>

                                    <dl class="dlist-align">
                                        <dt>Montan à payer:</dt>
                                        <dd class="text-right  h5"><strong>{{getprixminimumhelpers(Cart::total())}}</strong></dd>
                                    </dl>

                                 @endif
                                 <hr>
                                
                                
                                       <div class="d-inline-block">
                                            <input type="radio" checked> <h6 class="ml-4" style="margin-top: -22px;">Paiement à la livraison</h6>
                                       </div>
                                
                                    <p class="ml-4">
                                       Payer en argent comptant à la livraison.
                                    </p>

                                    <div>
                                        <p>Vos données personnelles seront utilisées pour le traitement de votre commande, vous accompagner au cours de votre visite du site web, et pour d’autres raisons décrites dans notre politique de confidentialité.</p>
                                    </div>
                            </div>
                        </div>
                    </aside>

            </div>
            
    </section>
    @else
        <div class="col-md-12">
            <h5>Vous devez ajouter des produits pour pouvoir accéder à cette page.</h5>
            <p>visiter la <a href="{{ route('produits') }}" style="color: blue;">boutique</a> pour faire votre shopping.
            </p> <br><br>
        </div>
    @endif

@stop