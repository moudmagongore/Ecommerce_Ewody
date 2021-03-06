@extends('templateclient.layouts.app', ['title' => 'Contact'])

@section('content')
	<div class="site-section bg-light" >
      <div class="container">
       
          
         <!--  Google maps -->
         <iframe src="https://www.google.com/maps/d/embed?mid=1jikqL6GJvGgZKrLhRpkBRcIbHN8PZLxC" width="1220" height="480"></iframe>
         <!-- End Google maps -->
          

        <div class="row mt-5">
          <div class="col-md-7 mb-5">

            

            <form action="#" class="p-5 bg-white">
             

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Nom</label>
                  <input type="text" id="fname" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Prenom</label>
                  <input type="text" id="lname" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Sujet</label> 
                  <input type="subject" id="subject" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Message</label> 
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Écrivez vos notes ou questions ici..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Envoyer Message" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

  
            </form>
          </div>
          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white" id="contact1">
              <p class="mb-0 font-weight-bold">Adresse</p>
              <p class="mb-4">Ewody SARL
                Sonfonia T7, C/Ratoma, Conakry, Rep. Guinée</p>

              <p class="mb-0 font-weight-bold">Telephone</p>
              <p class="mb-4"><a>(+224) 624664883 / 661708042</a></p>

              <p class="mb-0 font-weight-bold">Email Adresse</p>
              <p class="mb-0"><a>ewody@gmail.com</a></p>

            </div>
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">EWODY SARL</h3>
              <p>Ewody est une entreprise d'e-commerce qui vous permet en seul clics d’avoir accès aux produits et services du marché Guinéen partout, et a tout moment.</p>
             <!--  <p><a href="#" class="btn btn-primary px-4 py-2 text-white">Voir plus</a></p> -->
            </div>

          </div>
        </div>
      </div>
    </div>
@stop



<!-- Pour inclure les buttons en bas : home, favoris, compte ... -->
@section('buttonsEnBas')
     @include('templateclient.layouts.buttonsEnBas')
@stop