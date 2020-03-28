@extends('templateclient.layouts.app')
@section('content')

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
                        <div class="card mb-3">
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <h6>votre commande</h6>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <dl class="dlist-align">
                                    <dt>Prix Total:</dt>
                                    <dd class="text-right"><strong>*</strong></dd>
                                </dl>
                                <hr>
                                <dl class="dlist-align">
                                    <dt>Réduction:</dt>
                                    <dd class="text-right"></dd>
                                </dl>
                                <hr>

                                 <dl class="dlist-align">
                                    <dt>Taxe:</dt>
                                    <dd class="text-right"><strong></strong></dd>
                                </dl>
                                <hr>

                                <dl class="dlist-align">
                                    <dt>Montan à payer:</dt>
                                    <dd class="text-right  h5"><strong></strong></dd>
                                </dl>
                                <hr>
                                <p class="text-center mb-3">
                                    <img src="" height="26" class="no-loader">
                                </p>
                            </div>
                        </div>
                    </aside>

            </div>
            
        </section>

@stop