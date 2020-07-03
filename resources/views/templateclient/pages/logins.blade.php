<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-wody | Connexion</title>

  <!-- Importation des 2 fichier css pour l'oeil coté mot de passe-->
  <link href="{{asset('assets/templatefront/css/app.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('assets/templatefront/fonts/fontawesome/css/all.min.css')}}" type="text/css" rel="stylesheet">
  <!--End Importation des 2 fichier css pour l'oeil coté mot de passe-->


  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('assets\templatefront\css\logins.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary" style="background: #00abc5 !important">

  <div class="container">

        <div class="container">
            <script src="//code.jquery.com/jquery.js"></script>
            @include('flashy::message')

             <!-- Pour ajouter les messages  -->
              <!-- @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif
              
              
                                
               @if(session('danger'))
                <div class="alert alert-danger">
                  {{ session('danger') }}
                </div>
              @endif     -->
        </div>



    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card offset-md-6 o-hidden border-0 shadow-lg my-5 mx-auto">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenue chez Ewody!</h1>
                  </div>
                  <form class="user" action="{{route('connexion')}}" method="POST">

                    @csrf


                    <div class="form-group">
                      <input type="text" name="email" class="form-control form-control-user {{$errors->has('email') ? 'is-invalid' : '' }}" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Entrez votre username..." value="{{old('email')}}">

                        {!!$errors->first('email', '<div class="invalid-feedback">:message</div>')!!}
                    </div>

                    <!-- On importe les 2 fichiers css en haut et les 2 fichier js en bas et un petit script qui en suit,
                     On donne une class pour l'oeil qui est "with-float-icon". et icons de l'oeil en bas qui est " <i class="icon fa fa-eye"></i>" --> 
                    <div class="form-group with-float-icon">
                      <input type="password" name="password" class="form-control form-control-user {{$errors->has('password') ? 'is-invalid' : '' }}" id="exampleInputPassword" placeholder="Password" value="{{old('password')}}">

                        <i class="icon fa fa-eye"></i>

                        {!!$errors->first('password', '<div class="invalid-feedback">:message</div>')!!}
                    </div>

                    


                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Se souvenir de moi</label>
                      </div>
                    </div>
                    <input type="submit" value="connexion" class="btn btn-primary btn-user btn-block" style="background: #00abc5 !important;">
                     
                    <hr>
                    <a href="" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Se connecter avec google
                    </a>
                    <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Se connecter avec Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Mot de passe oublié?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="{{ route('inscrire') }}">Créer un compte!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


<!-- Pour l'oeil coté mot de passe-->
<script src="https://cdn.jsdelivr.net/npm/jquery-sticky@1.0.4/jquery.sticky.min.js"></script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
    $("#sticker-header").sticky({topSpacing:0});
    AOS.init({once:true});
    $('.with-float-icon i').click(function(event) {
        var inputField = $(this).siblings('input');
        if (inputField.attr('type') == 'password') {
            inputField.attr('type', 'text');
        }
        else {
            inputField.attr('type', 'password');
        }
    });
</script>
<!-- End Pour l'oeil coté mot de passe-->
</body>

</html>
