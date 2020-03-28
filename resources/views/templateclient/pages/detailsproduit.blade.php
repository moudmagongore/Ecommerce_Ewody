@extends('templateclient.layouts.app')
    @section('content')


        <section class="section-name padding-y-sm">
            <div class="card mb-3">
                <div class="card-body">
                    <ol class="breadcrumb float-left">
                        <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="all-categories.html">Tous nos produits</a></li>
                        <li class="breadcrumb-item">Catégorie</li>
                        @foreach ($produits->categories as $categorie)
                           <li class="breadcrumb-item">{{$categorie->designation_categorie}}</li>
                        @endforeach
                    </ol>
                </div>
            </div>
            <div class="container">
                <section class="section-content bg-white padding-y">
                    <div class="container">
                        <div class="row">
                            <aside class="col-md-4">
                                <div class="card">
                                   
                                        
                                   
                                    <article class="gallery-wrap">
                                        <div class="img-big-wrap">
                                            <div><a href="#"><img src="{{ asset('storage/' . $produits->photo) }}"></a></div>
                                        </div>
                                        <div class="thumbs-wrap">
                                            @foreach ($images as $image)
                                                <a href="#" class="item-thumb"><img src="{{url('image_produit',$image->nom)}}"></a>
                                            @endforeach
                                        </div>
                                    </article>
                                </div>
                            </aside>
                            <main class="col-md-8">
                                <article class="product-info-aside">
                                    <h2 class="title mt-3">{{$produits->nom}}
                                    </h2>

                                    <p class="text-left mr-4">

                                        <!-- Pour afficher le stock -->
                                        @if ($quantites === 'Disponible')
                                            <span class="badge badge-pill badge-success">
                                            {{$quantites}}
                                        </span>

                                        @else
                                            <span class="badge badge-pill badge-danger">
                                            {{$quantites}}
                                        </span>

                                        @endif

                                    </p>
                                    <div class="mb-3">
                                        <var class="price h4">{{$produits->getprixminimum()}} </var>
                                    </div>
                                    <p>{{$produits->description}}</p>
                                    <ul class="list-check">
                                        @foreach ($caracteristiques as $cara)
                                            <li><span style="font-weight:bold">{{$cara->designation}}: </span>{{$cara->valeur}}</li>
                                        @endforeach
                                        
                                        
                                    </ul>
                                    <div class="form-row mt-4 qtte-block">
                                        <!-- <div class="form-group col-md flex-grow-0">
                                            <div class="input-group mb-3 input-spinner quantity-manager">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-light button-plus" type="button"> + </button>
                                                </div>
                                                <input type="text" class="form-control quantity" value="1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-light button-minus" type="button"> − </button>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="form-group col-md">
                                            @if ($quantites === 'Disponible')
                                                <form action="{{ route('cart.store') }}" method="POST" class="d-inline">
    
                                                @csrf

                                                <input type="hidden" name="produits_id" value="{{$produits->id}}">
                                                

                                                <button type="submit" class="btn  btn-primary">
                                                <i class="fas fa-shopping-cart"></i>
                                                <span class="text">Ajouter au panier</span>
                                            </button>
                                            </form>
                                            @endif
                                            
                                            <a href="#" class="btn btn-light">
                                                <i class="fas fa-heart"></i>
                                                <span class="text">Ajouter aux favoris</span>
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row total">
                                        <div class="form-group col-md">
                                            <h5 class="price total h4 text-right">120 000 </h5>
                                        </div>
                                    </div>
                                </article>
                               
                            </main>
                        </div>
                    </div>
                </section>
                {{-- <hr class="mt-4">
                <header class="section-heading clearfix">
                    <a href="#" class="btn btn-outline-primary float-right">Voir tous</a>
                    <h3 class="section-title text-uppercase">Produits Similaires</h3>
                </header>


                <div class="row owl-carousel owl-theme">
                    <div class="">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="50">
                            <div class="img-wrap">
                                <img src="images/items/1.jpg">
                                <span class="topbar">
                                    <a href="#" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <a href="#" class="title">Product's title here - Model</a>
                                <div class="price mt-2">375 000 </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="150">
                            <div class="img-wrap">
                                <span class="topbar">
                                    <span class="badge badge-success"> NEW </span>
                                </span>
                                <img src="images/items/2.jpg">
                                <span class="topbar">
                                    <a href="#" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <a href="#" class="title">Product's title here - Model</a>
                                <div class="price mt-2">375 000 </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="250">
                            <div class="img-wrap">
                                <img src="images/items/3.jpg">
                                <span class="topbar">
                                    <a href="#" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <a href="#" class="title">Product's title here - Model</a>
                                <div class="price mt-2">375 000 </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="350">
                            <div class="img-wrap">
                                <img src="images/items/4.jpg">
                                <span class="topbar">
                                    <a href="#" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <a href="#" class="title">Product's title here - Model</a>
                                <div class="price mt-2">375 000 </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="250">
                            <div class="img-wrap">
                                <img src="images/items/3.jpg">
                                <span class="topbar">
                                    <a href="#" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <a href="#" class="title">Product's title here - Model</a>
                                <div class="price mt-2">375 000 </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="350">
                            <div class="img-wrap">
                                <img src="images/items/4.jpg">
                                <span class="topbar">
                                    <a href="#" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <a href="#" class="title">Product's title here - Model</a>
                                <div class="price mt-2">375 000 </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="250">
                            <div class="img-wrap">
                                <img src="images/items/3.jpg">
                                <span class="topbar">
                                    <a href="#" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <a href="#" class="title">Product's title here - Model</a>
                                <div class="price mt-2">375 000 </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="350">
                            <div class="img-wrap">
                                <img src="images/items/4.jpg">
                                <span class="topbar">
                                    <a href="#" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <a href="#" class="title">Product's title here - Model</a>
                                <div class="price mt-2">375 000 </div>
                            </figcaption>
                        </figure>
                    </div>
                </div> --}}

                {{-- <header class="section-heading clearfix">
                    <a href="#" class="btn btn-outline-primary float-right">Voir tous</a>
                    <h3 class="section-title text-uppercase">Recommandés pour vous</h3>
                </header>


                <div class="row owl-carousel owl-theme">
                    <div class="">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="50">
                            <div class="img-wrap">
                                <img src="images/items/1.jpg">
                                <span class="topbar">
                                    <a href="#" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <a href="#" class="title">Product's title here - Model</a>
                                <div class="price mt-2">375 000 </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="150">
                            <div class="img-wrap">
                                <span class="topbar">
                                    <span class="badge badge-success"> NEW </span>
                                </span>
                                <img src="images/items/2.jpg">
                                <span class="topbar">
                                    <a href="#" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <a href="#" class="title">Product's title here - Model</a>
                                <div class="price mt-2">375 000 </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="250">
                            <div class="img-wrap">
                                <img src="images/items/3.jpg">
                                <span class="topbar">
                                    <a href="#" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <a href="#" class="title">Product's title here - Model</a>
                                <div class="price mt-2">375 000 </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="350">
                            <div class="img-wrap">
                                <img src="images/items/4.jpg">
                                <span class="topbar">
                                    <a href="#" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <a href="#" class="title">Product's title here - Model</a>
                                <div class="price mt-2">375 000 </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="250">
                            <div class="img-wrap">
                                <img src="images/items/3.jpg">
                                <span class="topbar">
                                    <a href="#" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <a href="#" class="title">Product's title here - Model</a>
                                <div class="price mt-2">375 000 </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="350">
                            <div class="img-wrap">
                                <img src="images/items/4.jpg">
                                <span class="topbar">
                                    <a href="#" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <a href="#" class="title">Product's title here - Model</a>
                                <div class="price mt-2">375 000 </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="250">
                            <div class="img-wrap">
                                <img src="images/items/3.jpg">
                                <span class="topbar">
                                    <a href="#" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <a href="#" class="title">Product's title here - Model</a>
                                <div class="price mt-2">375 000 </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="">
                        <figure class="card card-product-grid rounded shadow-sm" 
                        data-aos="zoom-in"  data-aos-duration="700"  data-aos-delay="350">
                            <div class="img-wrap">
                                <img src="images/items/4.jpg">
                                <span class="topbar">
                                    <a href="#" class="float-right"><i class="fa fa-heart"></i></a>
                                </span>
                                <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>  Aperçu</a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <a href="#" class="title">Product's title here - Model</a>
                                <div class="price mt-2">375 000 </div>
                            </figcaption>
                        </figure>
                    </div>
                </div> --}}
            </div>
        </section>

    @endsection


