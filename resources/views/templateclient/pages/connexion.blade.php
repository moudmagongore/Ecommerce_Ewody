
@extends('templateclient.layouts.app')
@section('content')

    
        <section class="section-content padding-y">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <div class="row">
                            
                        </div>
                        <div class="tab-content py-4" id="nav-tabContent">
                            <div class="" id="nav-home">
                                <div class="card mx-auto" style="max-width: 380px;">
                                    <div class="card-body">
                                        <form method="POST" action="{{route('connexion')}}" >
                                            @csrf
                                            <div class="form-group">
                                                <input name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" type="email" value="{{old('email')}}">

                                                {!!$errors->first('email', '<div class="invalid-feedback">:message</div>')!!}

                                            </div>
                                            <div class="form-group">
                                                <input name="password" class="form-control {{$errors->has('password') ? 'is-invalid' : '' }}" placeholder="Mot de passe" type="password" value="{{old('password')}}">

                                                {!!$errors->first('password', '<div class="invalid-feedback">:message</div>')!!}

                                            </div>
                                            <div class="form-group">
                                                <a href="#" class="">
                                                    <small>J'ai oublié mon mot de passe</small>
                                                </a>
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary text-uppercase">
                                                        Se connecter
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    

    
    

@endsection