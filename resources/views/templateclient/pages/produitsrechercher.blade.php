@extends('templateclient.layouts.app', ['title' => 'Tous les produits'])
    @section('content')
        
 
    <div class="container">
        <section class="section-content padding-y">
            <div class="container">
                <div class="card mb-3">
                    <div class="card-body">
                        <ol class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="{{route('acceuil')}}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{route('produits')}}">Tous nos produits</a></li>                            
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <aside class="col-md-2">
                       
                        <article class="filter-group">
                            <h6 class="title">
                                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_2">
                                    Marques
                                </a>
                            </h6>
                            <div class="filter-content collapse show" id="collapse_2">
                                <div class="inner">
                                    @foreach ($produits as $produit)
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" checked="" class="custom-control-input">
                                            <div class="custom-control-label">
                                                {{$produit->marque}} 
                                                <b class="badge badge-pill badge-dark float-right">120</b>
                                            </div>
                                        </label>
                                    @endforeach
                                    
                                   
                                </div>
                            </div>
                        </article>
                        
                       
                        <article class="filter-group">
                            <h6 class="title">
                                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_5"> Condition </a>
                            </h6>
                            <div class="filter-content collapse show" id="collapse_5">
                                <div class="inner">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="myfilter_radio" checked="" class="custom-control-input">
                                        <div class="custom-control-label">Any condition</div>
                                    </label>

                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="myfilter_radio" class="custom-control-input">
                                        <div class="custom-control-label">Brand new </div>
                                    </label>

                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="myfilter_radio" class="custom-control-input">
                                        <div class="custom-control-label">Used items</div>
                                    </label>
                                </div>
                            </div>
                        </article>
                        <button class="btn btn-block btn-primary">Filtrer</button>
                    </aside>
                    <main class="col-md-10">
                        <header class="mb-3">
                            <div class="form-inline">
                                @if (request()->input('search'))
                                    <strong class="mr-md-auto">({{$produits->count()}}) résultat(s) trouvé pour la recherche "{{request()->search}}" </strong>
                                @elseif(request()->input('categorie'))
                                    <strong class="mr-md-auto">({{$produits->count()}}) résultat(s) trouvé pour la recherche "{{request()->categorie}}" </strong>
                                @endif
                                <select class="mr-2 form-control">
                                    <option>Latest items</option>
                                    <option>Trending</option>
                                    <option>Most Popular</option>
                                    <option>Cheapest</option>
                                </select>
                            </div>
                        </header>
                        <div class="row">
                            @foreach ($produits as $produit)
                                <div class="col-md-3">
                                    <figure class="card card-product-grid"  data-aos="zoom-in"  data-aos-duration="700">
                                        <div class="img-wrap">
                                            <span class="badge badge-success"> NEW </span>
                                            
                                                <img src="{{ asset('uploads/' . $produit->photo) }}">
                                            
                                           <!-- Favoris -->
                                            <span class="topbar">
                                                <a href="{{ route('favoris.store', $produit->id) }}" class="float-right">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                            </span>
                                            <!-- End Favoris -->


                                            <a class="btn-overlay" href="{{route('details', $produit->id)}}"><i class="fa fa-search-plus"></i>&nbsp;Détails</a>
                                        </div>
                                        <figcaption class="info-wrap border-top">
                                        <a href="{{route('details', $produit->id)}}" class="title mb-2">{{$produit->nom}}</a>
                                       
                                            <div class="price-wrap">
                                                <span class="price d-block text-right">{{$produit->getprixminimum()}}</span>
                                            </div>
                                            

                                           <!--  <form action="{{ route('cart.store') }}" method="post">
                                           
                                               @csrf
                                           
                                               <input type="hidden" name="produits_id" value="{{$produit->id}}">
                                           
                                               <button type="submit" class="btn btn-outline-primary btn-block"> <i class="fa fa-cart-plus"></i> Ajouter au panier </button>
                                           </form> -->

                                            
                                        </figcaption>
                                    </figure>
                                </div>
                            @endforeach

                            
                        </div>
                        <!-- <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <a href="" class="btn btn-outline-primary rounded-pill text-blue">Plus de produits</a>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col mt-4">
                                <div class="box text-center">
                                    <p>Did you find what you were looking for ?</p>
                                    <a href="#" class="btn btn-light">Yes</a>
                                    <a href="#" class="btn btn-light">No</a>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </section>
    </div>
@endsection




<!-- Pour inclure les buttons en bas : home, favoris, compte ... -->
@section('buttonsEnBas')
     @include('templateclient.layouts.buttonsEnBas')
@stop