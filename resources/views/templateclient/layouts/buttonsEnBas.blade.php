 <div class="col-12 col-sm-3 scroll-to-top-button-en-bas" id="buttonEnBas" style=" z-index:100; position: fixed; bottom:-10px; ">
        <div class=" float-md-right">
            
            
           <a href="{{ route('acceuil') }}" class="widget-header mr-2" id="buttonHomeEnBas">
                <div class="icon">
                    <i class="icon-sm rounded-circle border fa fa-home" data-toggle="tooltip" data-placement="bottom"></i>
                    
                </div>
            </a> 


            <a href="{{ route('allcategories') }}" class="widget-header mr-2" id="buttonCategorieEnBas">
                <div class="icon">

                    <i class="icon-sm rounded-circle border fa fa-bars" data-toggle="tooltip" data-placement="bottom"></i>
                    
                </div>
            </a> 


            <a href="{{ route('cart.index') }}" class="widget-header mr-2" id="buttonPanierEnBas">
               <div class="icon">
                   <i class="icon-sm rounded-circle border fa fa-shopping-cart" title="Mon panier" data-toggle="tooltip" data-placement="bottom"></i>
                   <span class="notify">{{Cart::count()}}</span>
               </div>
           </a>



            

            <a href="{{ route('favoris') }}" class="widget-header mr-2" id="buttonFavorisEnBas">
                <div class="icon">
                    <i class="icon-sm rounded-circle border fa fa-heart" title="Liste de souhait" data-toggle="tooltip" data-placement="bottom"></i>

                    @guest
                        <span class="notify">0</span>
                    @else
                        <span class="notify">{{App\models\Favori::where('user_id', Auth::user()->id)->get()->count()}}
                        </span>
                    @endguest
                </div>
            </a>
            <div class="widget-header dropdown mt-3 m-sm-0">
                <a href="#" data-toggle="dropdown" data-offset="20,10" id="buttonMonCompteEnBas">
                    <div class="icontext">
                        <div class="icon">
                            <i class="icon-sm rounded-circle border fa fa-user" title="Mon compte" data-toggle="tooltip" data-placement="bottom"></i>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                @guest

                    <form class="px-4 py-3" method="post" action="{{route('connexion')}}">

                            @csrf

                        <div class="form-group">
                            <input type="text" class="form-control {{$errors->has('email') ? 'is-invalid' : '' }}" placeholder="Username" name="email" value="{{old('email')}}">

                            {!!$errors->first('email', '<div class="invalid-feedback">:message</div>')!!}

                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : '' }}" placeholder="Mot de passe" name="password" value="{{old('password')}}">
                            
                            {!!$errors->first('password', '<div class="invalid-feedback">:message</div>')!!}

                        </div>
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </form>
                    <hr class="dropdown-divider">
                    <a href="{{ route('inscrire') }}" class="btn btn-outline-primary ml-4">Créer un compte</a>
                    <a class="dropdown-item" href="#">Mot de passe oublié</a>

                @else
                @if(Auth::user()->statut == 1)

                    <a href="{{ route('moncompte') }}" class="btn btn-outline-primary ml-4">Mon compte</a>

                    <hr class="dropdown-divider">

                    <a href="{{ route('deconnexion') }}" class="btn btn-outline-primary ml-4">Déconnexion</a>
                @else
                    <form class="px-4 py-3" method="post" action="{{route('connexion')}}">

                                @csrf

                            <div class="form-group">
                                <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" name="email" value="{{old('email')}}">

                                {!!$errors->first('email', '<div class="invalid-feedback">:message</div>')!!}

                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : '' }}" placeholder="Mot de passe" name="password" value="{{old('password')}}">
                                
                                {!!$errors->first('password', '<div class="invalid-feedback">:message</div>')!!}

                            </div>
                            <button type="submit" class="btn btn-primary">Se connecter</button>
                        </form>
                        <hr class="dropdown-divider">
                        <a href="{{ route('inscrire') }}" class="btn btn-outline-primary ml-4">Créer un compte</a>
                        <a class="dropdown-item" href="#">Mot de passe oublié</a>

                    
                @endif
                @endguest
                </div>
            </div>
        </div>
    </div>
