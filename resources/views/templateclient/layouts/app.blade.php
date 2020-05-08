<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

     @yield('extra-meta')

    <title>E-wody | {{ $title or ' '}}</title>


   <!--  Chargement pour l'autocompletion-->
    <link rel="stylesheet" href="https://cdn.rawgit.com/LeaVerou/awesomplete/gh-pages/awesomplete.css">
    <!--  End  chargement pour l'autocompletion -->


    
   <!--  Pour le chargement du button -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  End Pour le chargement du button -->


     <!--  Pour le chargement du zoom -->
    <link rel="stylesheet" href="{{asset('assets/templatefront/css/jquery.wm-zoom-1.0.min.css')}}">
    <!--  End Pour le chargement du zoom -->

    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="{{asset('assets/templatefront/fonts/fontawesome/css/all.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/templatefront/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/templatefront/css/owlcarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/templatefront/css/owlcarousel/owl.theme.default.min.css')}}">
    
    <!-- custom style -->
    <link href="{{asset('assets/templatefront/css/ui.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/templatefront/css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/templatefront/css/app.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body id="top-page">
    <div id="scroll-percentage" data-scrollPercentage><div class="percentage">&nbsp;</div></div>
    <header class="section-header">
        <section class="header-top-light border-bottom" style="background-color: #00abc5;z-index: 101">
            <div class="container">
                <nav class="d-flex flex-column flex-md-row">
                    <ul class="nav mr-auto d-none d-md-flex">
                        <li><a href="#" class="nav-link px-2"> <i class="fab fa-facebook"></i> </a></li>
                        <li><a href="#" class="nav-link px-2"> <i class="fab fa-instagram"></i> </a></li>
                        <li><a href="#" class="nav-link px-2"> <i class="fab fa-twitter"></i> </a></li>
                    </ul>
                    <ul class="nav" style="font-size: .89em;">
                        <li class="nav-item"><a href="#" class="nav-link"> Aide & FAQ </a></li>
                        <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Français</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="#">English</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <section class="header-main border-bottom" style="background-color: #f8f8f8;" id="sticker-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-sm-3">
                        <a href="{{route('acceuil')}}" class="brand-wrap">
                            <img class="logo" src="{{asset('assets/templatefront/images/logo.png')}}">
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 my-3 my-sm-0">
                       @include('templateclient.layouts.search')
                    </div>
                    <div class="col-12 col-sm-3">
                        <div class="widgets-wrap float-md-right">
                            <a href="{{ route('cart.index') }}" class="widget-header mr-2">
                                <div class="icon">
                                    <i class="icon-sm rounded-circle border fa fa-shopping-cart" title="Mon panier" data-toggle="tooltip" data-placement="bottom"></i>
                                    <span class="notify">{{Cart::count()}}</span>
                                </div>
                            </a>
                            <a href="{{ route('favoris') }}" class="widget-header mr-2">
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
                                <a href="#" data-toggle="dropdown" data-offset="20,10">
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
                </div>
            </div>
        </section>
        <nav class="navbar navbar-main navbar-expand-lg border-bottom">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav5" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse  navbar-collapse " id="main_nav5">
                   
                        <ul class="navbar-nav text-uppercase">
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="{{ route('produits') }}"> <strong>Tous nos produits</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('acceuil') }}">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('faq') }}">Faq</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('apropos') }}">A propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                        
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Plus</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Bijoux</a>
                                <a class="dropdown-item" href="#">Tv</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Categorie 1</a>
                                <a class="dropdown-item" href="#">Categorie 2</a>
                                <a class="dropdown-item" href="#">Categorie 3</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Categorie 1</a>
                                <a class="dropdown-item" href="#">Categorie 2</a>
                                <a class="dropdown-item" href="#">Categorie 3</a>
                            </div>
                        
                            
                        </li> -->
                    </ul>
                   
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        
        <script src="//code.jquery.com/jquery.js"></script>
        @include('flashy::message')

            <div class="container mt-5 col-md-8 col-md-offset-2 col-xs-12">
               <!-- Pour ajouter les messages  -->
                @if(session('success'))
                  <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
                @endif


              
                 @if(session('danger'))
                  <div class="alert alert-danger">
                    {{ session('danger') }}
                  </div>
                @endif
            </div>

        @yield('content')
    </div>

    <footer class="section-footer border-top" style="background: #005d90; color: #ddd">
        <div class="container">
            <section class="footer-top  padding-y">
                <div class="row">
                    <aside class="col-md-4 col-12">
                        <article class="mr-md-4">
                            <h5 class="title">EWODY SARL</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in feugiat lorem. </p>
                            <ul class="list-icon">
                                <li> <i class="icon fa fa-map-marker"> </i>Madina Boussoura, Conakry, Guinée</li>
                                <li> <i class="icon fa fa-envelope"> </i> info@ewody.com</li>
                                <li> <i class="icon fa fa-phone"> </i> (+224) 620-000-000 / 620-111-000</li>
                                <li> <i class="icon fa fa-clock"> </i>Lun-Vend 10:00 - 7:00</li>
                            </ul>
                        </article>
                    </aside>
                    <aside class="col-md col-6">
                        <h5 class="title">Informations</h5>
                        <ul class="list-unstyled">
                            <li> <a href="#">Apropos de nous</a></li>
                            <li> <a href="#">Nous contactez</a></li>
                            <li> <a href="#">CGU & CGV</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md col-6">
                        <h5 class="title">Mon compte</h5>
                        <ul class="list-unstyled">
                            <li> <a href="{{route('connexion')}}">Se connecter</a></li>
                            <li> <a href="{{route('cart.index')}}">Mon panier</a></li>
                            <li> <a href="{{route('connexion')}}">Créer un compte</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md-4 col-12">
                        <h5 class="title">Newsletter</h5>
                        <p>Recevez en premier les meilleures offres sur EWODY </p>
                        
                        <form class="form-inline mb-3">
                            <input type="text" placeholder="Email" class="form-control" name="">
                            <button class="btn ml-2 btn-warning">Recevoir les offres</button>
                        </form>
                        <div>
                            <a href="#" class="btn btn-icon btn-light"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-icon btn-light"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-icon btn-light"><i class="fab fa-instagram"></i></a>
                        </div>
                    </aside>
                </div>
            </section>

            <section class="footer-bottom border-top row">
                <div class="col-md-6">
                    <p class="mb-0">
                        <a href="" style="color: #fff !important;">CGU & CGV</a> | 
                        <a href="" style="color: #fff !important;">Mentions légales</a> | 
                        <span class="text-secondary" style="color: #fff !important;">&copy; EWODY SARL - Tous droits réservés</span>
                    </p>
                </div>
                <div class="col-md-6 text-md-right">
                    <i class="fab fa-lg fa-cc-visa"></i>
                    <i class="fab fa-lg fa-cc-paypal"></i>
                    <i class="fab fa-lg fa-cc-mastercard"></i>
                </div>
            </section>
        </div>
    </footer>

    <a href="#top-page" class="btn btn-dark rounded-pill scroll-to-top" style="font-size:13px; z-index:100; position: fixed; bottom:10px; right:10px; display: none;">
        <i class="fa fa-arrow-up"></i> 
    </a>




    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{asset('assets/templatefront/js/owlcarousel/owl.carousel.min.js')}}"></script>





     <!--  Chargement pour l'autocompletion-->
    <script type="text/javascript" src="https://cdn.rawgit.com/LeaVerou/awesomplete/gh-pages/awesomplete.min.js"></script>

    @yield('autocompletion')
    <!--  End  chargement pour l'autocompletion -->

  






    <!-- Bootstrap4 files-->
    <script src="{{asset('assets/templatefront/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
    <!-- custom javascript -->
    <script src="{{asset('assets/templatefront/js/script.js')}}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-sticky@1.0.4/jquery.sticky.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $("#sticker-header").sticky({topSpacing:0});
        AOS.init({once:true});
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 10,
            navText: ['<i class="fa fa-chevron-left">','<i class="fa fa-chevron-right">'],
            nav: true,
            dots: false,
            center: true,
            autoplay: true,
            autoplayHoverPause: true,
            responsive:{
                0:{
                    items: 1,
                },
                600:{
                    items: 3
                },
                1000:{
                    items: 5
                }
            }
        });

        
        /*new Drift(document.querySelector(".img-big-wrap img"), {
            paneContainer: document.querySelector("p"),
            onShow: function () {
                $('.product-info-aside .list-check, .qtte-block, .total').css('visibility', 'hidden');
            },
            onHide: function () {
                $('.product-info-aside .list-check, .qtte-block, .total').css('visibility', '');
            },
        });*/

        /*Change current big image*/
        var currentBigImage = $('.gallery-wrap .img-big-wrap img');
        $('.gallery-wrap .thumbs-wrap img').click(function({target}) {
            currentBigImage.attr('src', $(target).attr('src'));
            currentBigImage.attr('data-zoom', $(target).attr('src'));
            return false;
        });
    </script>



<script>
    $("#sticker-header").sticky({topSpacing:0});
    AOS.init({once:true});
    $('.with-float-icon i').click(function(event) {
        var inputField = $(this).siblings('input');
        if (inputField.attr('type') == 'password') {
            inputField.attr('type', 'text');
        }
        else {
            inputField.attr('type', 'password');
        }
    });
</script>

<script>
    $("#sticker-header").sticky({topSpacing:0});
    AOS.init({once:true});

    $('.panel-collapse').on('show.bs.collapse', function () {
       $(this).siblings('.panel-heading').addClass('active');
    });

    $('.panel-collapse').on('hide.bs.collapse', function () {
       $(this).siblings('.panel-heading').removeClass('active');
    });
</script>

@yield('sousImage')
@yield('quantite')
@yield('modalimage')
@yield('zoom')

</body>
</html>