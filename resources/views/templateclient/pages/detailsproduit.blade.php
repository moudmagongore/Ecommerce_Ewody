@extends('templateclient.layouts.app', ['title' => 'Détails d\'un produit'])
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
                                            <div><a ><img src="{{ asset('storage/' . $produits->photo) }}" id="imagePricipale"></a></div>
                                        </div>


                                        <div class="thumbs-wrap mt-4">
                                            <!-- pour recuperer l'image principale -->
                                            <a class="item-thumb"><img src="{{ asset('storage/' . $produits->photo) }}" height="60px" width="60px;" class="sousImage"></a>


                                            @foreach ($images as $image)
                                                <a  class="item-thumb"><img src="{{ asset('storage/' . $image->images) }}" height="60px" width="60px;" class="sousImage"></a>
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
                                    <!-- <div class="form-row total">
                                        <div class="form-group col-md">
                                            <h5 class="price total h4 text-right">120 000 </h5>
                                        </div>
                                    </div> -->
                                </article>
                               
                            </main>
                        </div>
                    </div>
                </section>
               
            </div>
        </section>

    @endsection

@section('quantite')
    <script>
        var imagePrincipale = document.querySelector('#imagePricipale');
        var sousImage = document.querySelectorAll('.sousImage');

        sousImage.forEach((element) => element.addEventListener('click', changeImage));

        function changeImage(e)
        {
            //Tu charge  la source de l'image principale par la source de l'image qu'on as cliqué
            imagePrincipale.src = this.src;
        }
    </script>
@stop


