@extends('templateclient.layouts.app', ['title' => 'Inscription'])
@section('content')

@section('css-register')
    <!-- Custom styles for this template-->
  <link href="{{ asset('assets\templatefront\css\logins.css') }}" rel="stylesheet">
@stop

<div class="bg-gradient">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card offset-md-6 o-hidden border-0 shadow-lg my-5 mx-auto" style="margin-top: -1px !important;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenue chez Ewody!</h1>
                  </div>
                  <form class="user" action="{{route('store-inscription')}}" method="POST">

                    @csrf
                    

                     <div class="form-group">
                      <input type="text" name="name" class="form-control form-control-user {{$errors->has('name') ? 'is-invalid' : '' }}" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Entrez votre username" value="{{old('name')}}">

                        {!!$errors->first('email', '<div class="invalid-feedback">:message</div>')!!}
                    </div>


                     <div class="form-group">
                      <input type="text" name="telephone" class="form-control form-control-user {{$errors->has('telephone') ? 'is-invalid' : '' }}" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Telephone" value="{{old('telephone')}}">

                        {!!$errors->first('telephone', '<div class="invalid-feedback">:message</div>')!!}
                    </div>



                    <div class="form-group">
                      <input type="text" name="email" class="form-control form-control-user {{$errors->has('email') ? 'is-invalid' : '' }}" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Entrez votre email" value="{{old('email')}}">

                        {!!$errors->first('email', '<div class="invalid-feedback">:message</div>')!!}
                    </div>


                
                     <div class="form-group with-float-icon">
                           <input class="form-control form-control-user {{$errors->has('password') ? 'is-invalid' : '' }}" name="password" placeholder="Mot de passe" type="password" value="{{old('password')}}">
                              <i class="icon fa fa-eye"></i>
                                        
                              {!!$errors->first('password', '<div class="invalid-feedback">:message</div>')!!}
                      </div>


                   
                   <!--  <div class="form-group with-float-icon">
                          <input class="form-control form-control-user {{$errors->has('password') ? 'is-invalid' : '' }}" name="password_confirmation" placeholder="Mot de passe de confirmation" type="password" value="{{old('password_confirmation')}}">
                             <i class="icon fa fa-eye"></i>
                                       
                             {!!$errors->first('password_confirmation', '<div class="invalid-feedback">:message</div>')!!}
                   </div>
                    -->

                  
                    <input type="submit" value="connexion" class="btn btn-primary btn-user btn-block" style="background: #00abc5 !important;">
                     
                    
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>



</div>

@endsection




 <!-- Pour inclure les buttons en bas : home, favoris, compte ... -->
@section('buttonsEnBas')
     @include('templateclient.layouts.buttonsEnBas')
@stop

