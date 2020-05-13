 <form action="{{ route('search') }}" class="search">
    <div class="input-group w-100" id="rechercher">
        <input type="search" class="form-control" style="width:32%;" placeholder="Rechercher un produit" name="search" value="">

        <select class="custom-select" name="categorie">
            <option disabled="" selected >Catégorie</option>
            @foreach ($categories as $categorie)
                <option value="{{$categorie->designation_categorie}}">{{$categorie->designation_categorie}}</option>
            @endforeach
            
        </select>
        <div class="input-group-append search-wrapper">
            <button class="btn btn-primary btn-submit-search" type="submit">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
</form>