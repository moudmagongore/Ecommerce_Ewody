              
       <!-- Modal catégorie -->
       <div class="modal fade" id="modalcategorie" tabindex="-1" role="dialog" aria-labelledby="modalcategorielabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalcategorielabel">Ajouter une nouvelle catégorie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <form action="{{route('storecategorie')}}" method="POST">
                    @csrf
                      <div class="form-group">
                          <label for="nom_categorie">Nom de la catégorie</label>
                          <input name="designation_categorie" type="text" class="form-control" id="nom_categorie">
                      </div>
                      <button type="button" class="btn btn-danger float-right" data-dismiss="modal" aria-label="Close">Annuler</button>
                      <button type="submit" class="btn btn-primary float-right">Ajouter</button>
                  </form>
                      
              </div>
              
            </div>
          </div>
        </div> 

        

        <!-- Modal  caractéristique-->
       <div class="modal fade" id="modalcaracteristique" tabindex="-1" role="dialog" aria-labelledby="modalcaracteristiquelabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalcaracteristiquelabel">Ajouter une nouvelle caractéristique de produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="{{route('storecaracteristique')}}" method="POST">
                    @csrf
                      <div class="form-group">
                          <label for="nom_caracteristique">Nom de la caractéristique</label>
                          <input name="designation_caracteristique" type="text" class="form-control" id="nom_caracteristique">
                      </div>
                      <div class="form-group">
                        <label for="valeur_caracteristique">Valeur</label>
                        <input name="valeur_caracteristique" type="text" class="form-control" id="valeur_caracteristique">
                    </div>
                      <button type="button" class="btn btn-danger float-right" data-dismiss="modal" aria-label="Close">Annuler</button>
                      <button type="submit" class="btn btn-primary float-right">Ajouter</button>
                  </form>
                      
              </div>
              
            </div>
          </div>
        </div> 


        