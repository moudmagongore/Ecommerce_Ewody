
@extends('templateclient.layouts.app', ['title' => 'Toutes les categories'])

@section('content')
<div class="container">
    <section class="section-content padding-y">
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                    <ol class="breadcrumb float-left">
                        <li class="breadcrumb-item"><a href="{{ route('acceuil') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a >Toutes les categorie</a></li>
                         <li class="breadcrumb-item"><a href="all-categories.html"></a></li>
                    </ol>
                </div>
            </div>
            <nav class="row">
                @foreach ($categories as $categorie)
                    <div class="col-lg-3 col-sm-4">
                        <div class="card card-category"  data-aos="zoom-in"  data-aos-duration="700">
                            <div class="img-wrap">
                                <a href="{{route('detailcategorie', ['category' => $categorie->designation_categorie])}}">
                                    <img src="{{ asset('uploads/' .$categorie->image) }}">
                                </a>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><a href="{{route('detailcategorie', ['category' => $categorie->designation_categorie])}}">{{$categorie->designation_categorie}}</a></h4>
                                <!-- <ul class="list-menu">
                                    @foreach ($categorie->sous_categories as $sous_cat)
                                        <li><a href="">{{$sous_cat->designation_s_categorie}}</a></li>
                                    @endforeach
                                </ul> -->
                            </div>
                        </div>
                    </div>
                @endforeach    
                
            </nav>
            <!-- <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <a href="" class="btn btn-outline-primary rounded-pill text-blue">Plus de catégories</a>
                </div>
            </div> -->
        </div>
    </section>
</div>
@endsection





<!-- Pour inclure les buttons en bas : home, favoris, compte ... -->
@section('buttonsEnBas')
     @include('templateclient.layouts.buttonsEnBas')
@stop
    
    