@extends('templateclient.layouts.app', ['title' => 'Accueil'])
    @section('content')


           <!--  Pour le slide info -->
                <div class="sliderInfo">
                    <strong>Info :</strong>
                    <div class="slideInfo">
                        <marquee class="info">
                            <span class="info1"></span>Appelez pour passer votre commande <strong> +224 624 66 48 83</strong>.
                            <em></em> Avec un prix raisonnable, une livraison rapide et fiable.
                            
                        </marquee>
                    </div>
                </div>
            <!--End  Pour le slide info -->





        
    
        <section class="section-main padding-y" id="cardImagePrincipale">
            <main class="card" >
                <div class="card-body rounded">

                    <div class="row">
                        <aside class="col-md-3 industrieResponsive">
                            <h6 class="text-uppercase">
                                <i class="fa fa-list-alt"></i>
                               Industries
                            </h6>
                            <nav class="nav-home-aside">
                                <ul class="menu-category">
                                    @foreach ($industries as $industrie)
                                <li><a href="{{route('detailindustrie', $industrie->id)}}">{{$industrie->designation_industrie}}</a>

                                            
                                                
                                               
                                </li>
                                    @endforeach

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Plus</a>
                                            <div class="dropdown-menu">
                                                
                                                
                                                <a class="dropdown-item" href="#">Categorie 1</a>
                                                <a class="dropdown-item" href="#">Categorie 2</a>
                                                <a class="dropdown-item" href="#">Categorie 3</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Categorie 1</a>
                                                <a class="dropdown-item" href="#">Categorie 2</a>
                                                <a class="dropdown-item" href="#">Categorie 3</a>
                                            </div>    
                                        </li>
                                                
                                    </ul>
                            </nav>
                        </aside>

                        <div class="col-md-9">

                            <!-- ================== COMPONENT SLIDER  BOOTSTRAP  ==================  -->
                            <div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel1_indicator" data-slide-to="1"></li>
                                    <li data-target="#carousel1_indicator" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active img-fluid" >
                                        <img src="{{asset('assets/templatefront/images/banners/flyers-with-all-products-gif.gif')}}" alt="First slide">
                                    </div>
                                    <div class="carousel-item img-fluid">
                                        <img src="{{asset('assets/templatefront/images/banners/electronics-F.gif')}}" alt="Second slide">
                                    </div>
                                    <div class="carousel-item img-fluid">
                                        <img src="{{asset('assets/templatefront/images/banners/slide2.jpg')}}" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!-- ==================  COMPONENT SLIDER BOOTSTRAP end.// ==================  .// -->
                        </div>
                    </div>
                    <!-- row.// -->

                </div>
                <!-- card-body.// -->
            </main>
            <!-- card.// -->
        </section>
        <div class="row" style="margin-bottom: 35px;">
            <div class="col-md-3 col-sm-6 col-6 mt-4">
                <article class="card card-body shadow-sm rounded" 
                data-aos="flip-left" data-aos-duration="1300" data-aos-delay="50">
                    <figure class="text-center">
                        <span class="rounded-circle icon-md bg-success"><i class="fa fa-check white"></i></span>
                        <figcaption class="pt-4">
                            <h5 class="title">Produits de qualité</h5>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="col-md-3 col-sm-6 col-6 mt-4">
                <article class="card card-body shadow-sm rounded" 
                data-aos="flip-right" data-aos-duration="1300" data-aos-delay="250">
                    <figure class="text-center">
                        <span class="rounded-circle icon-md bg-primary"><i class="fa fa-coins white"></i></span>
                        <figcaption class="pt-4">
                            <h5 class="title">Prix raisonables</h5>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="col-md-3 col-sm-6 col-6 mt-4">
                <article class="card card-body shadow-sm rounded" 
                data-aos="flip-left" data-aos-duration="1300" data-aos-delay="350">
                    <figure class="text-center">
                        <span class="rounded-circle icon-md bg-info"><i class="fa fa-truck white"></i></span>
                        <figcaption class="pt-4">
                            <h5 class="title">Livraison rapide</h5>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="col-md-3 col-sm-6 col-6 mt-4">
                <article class="card card-body shadow-sm rounded" 
                data-aos="flip-right" data-aos-duration="1300" data-aos-delay="450">
                    <figure class="text-center">
                        <span class="rounded-circle icon-md bg-secondary"><i class="fa fa-lock white"></i></span>
                        <figcaption class="pt-4">
                            <h5 class="title">Paiement sécurisé</h5>
                        </figcaption>
                    </figure>
                </article>
            </div>
        </div>
        <hr>


         <section class="section-name padding-y-sm">
            <div class="container">

                <header class="section-heading clearfix">
                    <a href="{{route('detailcategorie', ['category' => $categori->designation_categorie])}}" class="btn btn-outline-primary float-right">Voir tous</a>
                    <h3 class="section-title text-uppercase" style="font-size: 22px;">Produits populaires</h3>
                </header><!-- sect-heading -->


                <div class=" owl-carousel owl-theme">
                   
                   @foreach ($produits_phare as $phare)
                       <div class="">
                        <figure class="card card-product-grid rounded shadow-sm"
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="50">
                        <div class="img-wrap">
                            <a href="{{route('details', $phare->id)}}">
                                <img src="{{ asset('uploads/' . $phare->photo) }}">
                            </a>
                            <span class="topbar">
                                <a href="{{ route('favoris.store', $phare->id) }}" class="float-right"><i class="fa fa-heart"></i></a>
                            </span>
                            <a class="btn-overlay" href="{{route('details', $phare->id)}}"><i class="fa fa-search-plus"></i>  Aperçu</a>
                        </div>
                        <figcaption class="info-wrap border-top">
                            <a href="{{route('details', $phare->id)}}" class="title">{{$phare->nom}}</a>
                            <div class="price mt-2">{{$phare->getprixminimum()}}</div>
                        </figcaption>
                        </figure>
                    </div>
                   @endforeach
                    
                </div>
                
                
            </div>
            </div>
        </section>

        <section class="padding-bottom">
            <div class="container"> 
                <header class="section-heading heading-line">
                    <h4 class="title-section text-uppercase">Request for Quotation</h4>
                </header>

                <div class="row">
                    <div class="col-md-7">
                        <div class="card-banner banner-quote overlay-gradient" style="background-image: url('images/banners/source1.jpg');">
                            <div class="card-img-overlay white">
                                <h3 class="card-title">An easy way to send request to suppliers</h3>
                                <p class="card-text" style="max-width: 400px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                <a href="" class="btn btn-outline-primary rounded-pill text-white">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card card-body">
                            <h4 class="title py-3">Whant get quotation?</h4>
                            <form>
                                <div class="form-group">
                                    <input class="form-control" name="" placeholder="Product name or key word" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Quantity" name="" type="text">
                                </div>
                                <div class="form-group">
                                    <select class="custom-select form-control">
                                        <option>Accessoirs</option>
                                        <option>Sacs</option>
                                        <option>Chaussures</option>
                                        <option>Beaute</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Get your quotation</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="padding-bottom">
            <div class="container">
                <header class="section-heading heading-line">
                    <h4 class="title-section text-uppercase">
                        <a href="{{route('detailcategorie', ['category' => $categorys->designation_categorie])}}" title="Voir plus" data-toggle="tooltip" data-placement="right">Sacs</a>
                    </h4>
                </header>

                <div class="card card-home-category bg-transparent border-0">
                    <div class="row no-gutters">
                        <div class="col-md-3">
                            <div class="card-banner" style="min-height:356px; background-image: url('{{ asset('assets/templatefront/images/items/bag3.jpg') }}');">
                                <article class="caption bottom">
                                    <h5 class="card-title">Sacs à portée de main</h5>
                                    <p>
                                        <a href="{{route('detailcategorie', ['category' => $categorys->designation_categorie])}}" class="btn btn-outline-primary rounded-pill">Voir plus</a>
                                    </p>
                                </article>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row  pl-sm-4">
                                @foreach ($produits_sacs as $sac)
                                    <div class="col-md-3 col-6">
                                        <figure class="card card-product-grid rounded shadow-sm" 
                                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="50">
                                            <div class="img-wrap">
                                                <a href="{{route('details', $sac->id)}}">
                                                    <img src="{{ asset('uploads/' . $sac->photo) }}">
                                                </a>

                                                <span class="topbar">
                                                    <a href="{{ route('favoris.store', $sac->id) }}" class="float-right"><i class="fa fa-heart"></i></a>
                                                </span>

                                                <a class="btn-overlay" href="{{route('details', $sac->id)}}"><i class="fa fa-search-plus"></i>  Aperçu</a>
                                            </div>
                                            <figcaption class="info-wrap border-top">
                                                <a href="{{route('details', $sac->id)}}" class="title">{{$sac->nom}}</a>
                                                <div class="price mt-2 text-right">{{$sac->getprixminimum()}}</div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="padding-bottom">
            <div class="container">
                <header class="section-heading heading-line">
                    <h4 class="title-section text-uppercase">
                        <a href="{{route('detailcategorie', ['category' => $category->designation_categorie])}}" title="Voir plus" data-toggle="tooltip" data-placement="right">Montres</a>
                    </h4>
                </header>

                <div class="card card-home-category bg-transparent border-0">
                    <div class="row no-gutters">
                        <div class="col-md-3">
                            <div class="card-banner" style="min-height:356px; background-image: url('{{ asset('assets/templatefront/images/banners/banner8.jpg') }}');">
                                <article class="caption bottom">
                                    <h5 class="card-title">Montres de luxe</h5>
                                    <p>
                                        <a href="{{route('detailcategorie', ['category' => $category->designation_categorie])}}" class="btn btn-outline-primary rounded-pill">Voir plus</a>
                                    </p>
                                </article>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row  pl-sm-4">
                                @foreach ($produits_montre as $montre)
                                    
                                
                                    <div class="col-md-3 col-6">
                                        <figure class="card card-product-grid rounded shadow-sm" 
                                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="50">
                                            <div class="img-wrap">
                                                <a href="{{route('details', $montre->id)}}">

                                                    <img src="{{ asset('uploads/' . $montre->photo) }}">
                                                </a>

                                                <span class="topbar">
                                                    <a href="{{ route('favoris.store', $montre->id) }}" class="float-right"><i class="fa fa-heart"></i></a>
                                                </span>

                                                <a class="btn-overlay" href="{{route('details', $montre->id)}}"><i class="fa fa-search-plus"></i>  Aperçu</a>
                                            </div>
                                            <figcaption class="info-wrap border-top">
                                            <a href="{{route('details', $montre->id)}}" class="title">{{$montre->nom}}</a>
                                                <div class="price mt-2 text-right">{{$montre->getprixminimum()}}</div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="padding-bottom-sm">
            <div class="container">
                <header class="section-heading heading-line">
                    <h4 class="title-section text-uppercase">Recommandé pour vous</h4>
                </header>

                <div class="row row-sm">
                  {{--   @foreach ($produits as $prod) --}}
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="50">
                            <div class="img-wrap">
                                <img src="{{ asset('assets/templatefront/images/items/1.jpg') }}">
                                <span class="topbar">
                                    <a href="" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                {{-- <a href="#" class="title">{{$prod->nom}}</a>
                                <div class="price mt-2">{{$prod->getprixminimum()}}</div> --}}
                            </figcaption>
                        </figure>
                    </div>
                   {{--  @endforeach --}} 
                </div>
            </div>
        </section>
    
    @endsection