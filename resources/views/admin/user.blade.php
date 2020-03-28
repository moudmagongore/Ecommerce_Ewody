@extends('layout.app')

@section('content')
                    
<div class="container-fluid" style="margin-top: 5em;">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
        <form action="{{route('storefournisseur')}}" method="POST">
              @csrf          
                    <h4 for="" class="">Formulaire d'ajout d'un nouvel utilisateur</h4>
                
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" class="form-control" id="nom" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="prenom">Prénom</label>
                            <input name="prenom" type="text" class="form-control" id="prenom">
                        </div>
                    </div>    
                    <div class="form-row">                                  
                        <div class="form-group col-md-6">
                            <label for="telephone">Telephone</label>
                            <input name="telephone" type="text" class="form-control" id="telephone">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Adresse email</label>
                            <input name="email" type="email" class="form-control" id="email">
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div> 
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">Nom d'utilisateur</label>
                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                            </div>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="motdepass">Mot de pass</label>
                            <input name="motdepass" type="password" class="form-control" id="motdepass">
                            @if ($errors->has('motdepass'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('motdepass') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="privilege">Privillège <button type="button" style="height:auto" class="" data-toggle="modal" data-target="#modalprivilege">
                                    +
                            </button></label>
                            <select name="privilege" class="form-control" id="privilege">
                                <option></option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>                          
                    
                    <button type="submit" class="btn btn-primary float-right">Ajouter</button>
                </form>
        </div>

    </div>
       
</div>

      @include('modaluser')
    
@endsection