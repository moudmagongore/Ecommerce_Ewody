@extends('templateclient.layouts.app', ['title' => 'Détails d\'une catégorie'])

@section('content')

    <section class="section-main padding-y">
            <main class="card">
                <div class="card-body rounded">

                    <div class="row">
                        <aside class="col-md-3">
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
                                    
                                </ul>
                            </nav>
                        </aside>

                        <div class="col-md-9 row">
                            
                            @foreach ($produits as $produit)
                                <div class="col-md-3">
                                    <figure class="card card-product-grid"  data-aos="zoom-in"  data-aos-duration="700">
                                        <div class="img-wrap">
                                            <span class="badge badge-success"> NEW </span>
                                            
                                                <img src="{{ asset('storage/' . $produit->photo)}}">
                                            
                                           <!-- favoris -->
                                            <span class="topbar">
                                                <a href="{{ route('favoris.store', $produit->id) }}" class="float-right">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                            </span>
                                            <!-- End favoris -->

                                            <a class="btn-overlay" href="{{route('details', $produit->id)}}"><i class="fa fa-search-plus"></i>&nbsp;Détails</a>
                                        </div>
                                        <figcaption class="info-wrap">
                                        <a href="{{route('details', $produit->id)}}" class="title mb-2">{{$produit->nom}}</a>
                                            <div class="price-wrap">
                                                <span class="price d-block text-right">{{$produit->getprixminimum()}}</span>
                                            </div>
                                            <hr>
                                            
                                            <form action="{{ route('cart.store') }}" method="post">

                                                @csrf

                                                <input type="hidden" name="produits_id" value="{{$produit->id}}">

                                                <button type="submit" class="btn btn-outline-primary btn-block"> <i class="fa fa-cart-plus"></i> Ajouter au panier </button>
                                                
                                            </form>


                                        </figcaption>
                                    </figure>
                                </div>
                            @endforeach

                            {{$produits->appends(request()->input())->links()}}
                            
                        </div>
                    <!-- row.// -->

                </div>
                <!-- card-body.// -->
            </main>
            <!-- card.// -->
        </section>

@stop