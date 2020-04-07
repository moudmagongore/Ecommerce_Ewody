@extends('templateclient.layouts.app', ['title' => 'Inscription'])
@section('content')
    <section class="section-content padding-y">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <div class="row">
                            
                        </div>
                        <div class="" id="nav-profile" role="tabpanel" aria-labelledby="">
                            <div class="card mx-auto" style="max-width: 380px;">
                                <div class="card-body">
                                <form method="POST" action="{{route('store-inscription')}}">
                                    @csrf
                                        <div class="form-group">
                                            <input name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : '' }}" placeholder="Username" type="text" value="{{old('name')}}">

                                            {!!$errors->first('name', '<div class="invalid-feedback">:message</div>')!!}

                                        </div>

                                        <div class="form-group">
                                            <input class="form-control {{$errors->has('email') ? 'is-invalid' : '' }}" name="email" placeholder="Email" type="email" value="{{old('email')}}">

                                             {!!$errors->first('email', '<div class="invalid-feedback">:message</div>')!!}

                                        </div>

                                        <div class="form-group with-float-icon">
                                            <input class="form-control  {{$errors->has('motdepass') ? 'is-invalid' : '' }}" name="motdepass" placeholder="Mot de passe" type="password" value="{{old('motdepass')}}">
                                            <i class="icon fa fa-eye"></i>
                                            
                                            {!!$errors->first('motdepass', '<div class="invalid-feedback">:message</div>')!!}

                                        </div>

                                        <div class="form-group">
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary text-uppercase">
                                                    S'inscrire
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
    </section>
        
 @endsection