
@extends('templateadmin.layouts.app')

@section('content')
    <div class="product-status mg-tb-15">              
        <div class="container-fluid" style="margin-left: 5px">
            <div class="row justify-content-md-center">
                <div class="col-md-10  product-status-wrap">
                <form action="{{route('storeuser')}}" method="POST">
                    @csrf          
                            <h4 for="" class="" style="margin-left: 11px;">Formulaire d'ajout d'un nouvel utilisateur</h4>
                        
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nom">Nom</label>
                                    <input type="text" name="nom" class="form-control" id="nom" placeholder="nom">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="prenom">Prénom</label>
                                    <input name="prenom" type="text" class="form-control" id="prenom" placeholder="prénom">
                                </div>
                            </div>    
                            <div class="form-row">                                  
                                <div class="form-group col-md-6">
                                    <label for="telephone">Telephone</label>
                                    <input name="telephone" type="text" class="form-control" id="telephone" placeholder="téléphone">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Adresse email</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="email">
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div> 
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="adresse">Adresse</label>
                                    <input name="adresse" type="text" class="form-control" id="adresse" placeholder="adresse">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="privilege">Privillège</label>
                                    <select name="privilege" class="form-control" id="privilege">
                                        <option></option>
                                        @foreach ($privilleges as $privillege)
                                            <option value="{{$privillege->id}}">{{$privillege->designation_privillege}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="row">
                                    <button type="button" style="height:auto; margin-top:25px; margin-left:-10px ; background-color:#27bcc8 " class="btn btn-primary" data-toggle="modal" data-target="#modalprivilege">+</button>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="name">Nom d'utilisateur</label>
                                    <input type="text" name="name" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                                    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="motdepass">Mot de pass</label>
                                    <input name="motdepass" type="password" class="form-control" id="motdepass" placeholder="mot de passe">
                                    @if ($errors->has('motdepass'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('motdepass') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="motdepassconfirm">Mot de pass</label>
                                    <input name="motdepassconfirm" type="password" class="form-control" id="motdepassconfirm" placeholder="confirmation">
                                    @if ($errors->has('motdepassconfirm'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('motdepassconfirm') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                            </div>                          
                            <div class="col">
                                <button type="submit" class="btn btn-primary float-right" style="margin-left:91%; background-color:#27bcc8;">Ajouter</button>
                            </div>
                        </form>
                </div>

            </div>
            
        </div>
    </div>  
      @include('admin.modaluser')
    
@endsection