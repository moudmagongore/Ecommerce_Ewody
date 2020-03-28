<!-- Modal  privilège-->
<div class="modal fade" id="modalprivilege" tabindex="-1" role="dialog" aria-labelledby="modalprivilegelabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalprivilegelabel">Ajouter un privillège</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="{{route('storeprivillege')}}" method="POST">

                @csrf

                <div class="form-group {{$errors->has('designation_privillege') ? 'has-error' : '' }}">
                    <label for="designation_privillege">Nom privillège</label>
                    <input name="designation_privillege" type="text" class="form-control" value="{{old('designation_privillege')}}" id="designation_privillege">

                    
                    {!! $errors->first('designation_privillege', '<p id="error">:message</p>')!!}


                </div>
                <button type="button" class="btn btn-danger float-right" data-dismiss="modal" aria-label="Close">Annuler</button>
                <button type="submit" class="btn btn-primary float-right">Ajouter</button>
            </form>
                    
            </div>
            
          </div>
        </div>
      </div> 