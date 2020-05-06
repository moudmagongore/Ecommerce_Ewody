@extends('templateclient.layouts.app', ['title' => 'Chekout'])
@section('content')

	@if (count(session('cart')) > 0 )
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
                                            <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : '' }}" value="{{old('name')}}" name="name" placeholder="Prenom && nom">

                                            {!!$errors->first('name', '<div class="invalid-feedback">:message</div>')!!}

                                        </div>
                                    </div>

                                   

                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control {{$errors->has('telephone') ? 'is-invalid' : '' }}" value="{{old('telephone')}}" name="telephone" placeholder="Telephone">

                                            {!!$errors->first('telephone', '<div class="invalid-feedback">:message</div>')!!}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input id="myinputVille" type="text" class="form-control {{$errors->has('ville') ? 'is-invalid' : '' }}" value="{{old('ville')}}" name="ville" placeholder="ville">

                                                    {!!$errors->first('ville', '<div class="invalid-feedback">:message</div>')!!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input id="myinputQuartier" type="text" class="form-control {{$errors->has('quartier') ? 'is-invalid' : '' }}" value="{{old('quartier')}}" name="quartier" placeholder="quartier">

                                                    {!!$errors->first('quartier', '<div class="invalid-feedback">:message</div>')!!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input id="myinputLieu" type="text" class="form-control {{$errors->has('lieuProche') ? 'is-invalid' : '' }}" value="{{old('lieuProche')}}" name="lieuProche" placeholder="Lieu le plus proche">

                                                    {!!$errors->first('lieuProche', '<div class="invalid-feedback">:message</div>')!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                <div class="form-group container">
                    <h6>Quand voulez-vous la livraisson ?</h6>

                            
                       <!--  <input type="radio" name="aujour" value="aujour" class="form-check-input"><label for="aujour">Aujourd'hui</label>
                       
                       <input type="radio" name="aujour" value="aujour" class="form-check-input ml-4"><label for="aujour" class="ml-5">Demain</label> -->
                   

                                        <!-- <div class="input-group">       
                                            
                                        </div> -->

                                       <!-- 
                                            <label class="control-label">A une date ulterieur</label> -->
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

                                  <?php $total = 0 ?>

                                @foreach(session('cart') as $id => $details)
                                 

                                    <dl class="dlist-align">
                                        <dt><strong>{{$details['quantite']}}×</strong> {{$details['nom']}}</dt>
                                        <dd class="text-right  h6"><strong></strong>{{ getprixminimumhelpers( $details['prix_unitaire'] * $details['quantite'] ) }}</dd>
                                    </dl>
                                    <hr>
                                @endforeach
                                 

                                     <dl class="dlist-align">
                                    <dt>Sous-total:</dt>
                                    <dd class="text-right h5"><strong>{{ getprixminimumhelpers( $details['prix_unitaire'] * $details['quantite'] ) }}</strong></dd>
                                    </dl>
                                    <hr>

                                    <dl class="dlist-align">
                                        <dt>Montan à payer:</dt>
                                        <dd class="text-right  h5 text-danger"><strong>{{ getprixminimumhelpers( $details['prix_unitaire'] * $details['quantite'] ) }}</strong></dd>
                                    </dl>

                                
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


@section('autocompletion')
   <!--  Chargement de l'autocompletion -->
    <script src="{{ asset('assets/templatefront/js/autocompletion.js') }}"></script>
@stop