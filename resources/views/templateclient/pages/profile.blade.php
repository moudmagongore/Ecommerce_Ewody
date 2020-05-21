
    @extends('templateclient.layouts.app', ['title' => 'Mon profile'])
    @section('content')
    
    <section class="section-content padding-y">
        <div class="container">
            <div class="row">
                
                <aside class="col-md-3">
                    <ul class="list-group">
                        <a class="list-group-item active" href=" {{route('moncompte', $user->id)}}"> Mon compte  </a>
                            <a class="list-group-item" href=" {{route('commandes', $user->id)}}"> Mes commandes </a>
                            <a class="list-group-item" href=" {{route('favoris', $user->id)}}"> Mes favoris </a>
                            <a class="list-group-item" href=" {{route('profile', $user->id)}}"> Mon profil </a>
                    </ul>
                    <p class="mt-4">
                    <a class="btn btn-light btn-block" href="{{ route('deconnexion') }}">
                            <i class="fa fa-power-off"></i>
                            <span class="text">Déconnexion</span>
                        </a>
                    </p>
                </aside>
                <main class="col-md-9">
                    <article class="card  mb-3">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Mon profil</h4>
                            <form method="POST" action="{{route('modifierprofile', $user->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group d-flex align-items-center">
                                    <div class="mr-2">
                                    <img src="{{ asset('uploads/' . $user->photo) }}" class="img-sm rounded-circle border">
                                    </div>
                                    <div class="col-sm-3 custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile">Changer la photo</label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Nom</label>
                                        <input type="text" class="form-control {{$errors->has('nom') ? 'is-invalid' : '' }}" value="{{$user->nom}}"  name="nom" >

                                        {!!$errors->first('nom', '<div class="invalid-feedback">:message</div>')!!}

                                    </div>
                                    <div class="col form-group">
                                        <label>Prénom</label>
                                        <input type="text" class="form-control {{$errors->has('prenom') ? 'is-invalid' : '' }}" value="{{$user->prenom}}" name="prenom">

                                        {!!$errors->first('prenom', '<div class="invalid-feedback">:message</div>')!!}

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Numéro de téléphone</label>
                                        <input type="text" class="form-control {{$errors->has('telephone') ? 'is-invalid' : '' }}" value="{{$user->telephone}}" name="telephone">

                                        {!!$errors->first('telephone', '<div class="invalid-feedback">:message</div>')!!}

                                    </div>
                                    <div class="col form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : '' }}" value="{{$user->email}}" name="email">

                                        {!!$errors->first('email', '<div class="invalid-feedback">:message</div>')!!}
                                    </div>
                                </div>
                            
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Adresse</label>
                                        <input type="text" class="form-control {{$errors->has('adresse') ? 'is-invalid' : '' }}" value="{{$user->adresse}}" name="adresse">

                                          {!!$errors->first('adresse', '<div class="invalid-feedback">:message</div>')!!}

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Nom d'utilisateur</label>
                                    <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : '' }}" value="{{$user->name}}" name="name">


                                          {!!$errors->first('name', '<div class="invalid-feedback">:message</div>')!!}

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6 with-float-icon">
                                        <label>Nouveau mot de passe</label>
                                        <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : '' }}" placeholder="Nouveau mot de passe" name="password">
                                         <i class="icon fa fa-eye"></i>

                                        {!!$errors->first('password', '<div class="invalid-feedback">:message</div>')!!}

                                    </div>
                                    <div class="form-group col-md-6 with-float-icon">
                                        <label>Répéter mot de passe</label>
                                        <input type="password" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : '' }}" placeholder="Répéter le nouveau mot de passe" name="password_confirmation">
                                         <i class="icon fa fa-eye"></i>

                                        {!!$errors->first('password_confirmation', '<div class="invalid-feedback">:message</div>')!!}

                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Enregister les modifications</button>
                            </form>

                            {{-- @endforeach --}}
                        </div>
                        
                    </article>
                </main>
            </div>
        </div>
    </section>
        
    @endsection