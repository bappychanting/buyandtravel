@extends('layouts.master')

@section('content')

<div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Sign In</h1>

      <div class="bc-icons">
          <ol class="breadcrumb blue-gradient">
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Sign in</li>
          </ol>
      </div>

      <div class="row">
        <div class="col-lg-4 mb-5">
          <img class="img-fluid rounded" src="http://www.pngpix.com/wp-content/uploads/2016/11/PNGPIX-COM-Bugs-Bunny-PNG-Transparent-Image.png" alt="">
        </div>
        <div class="col-lg-8 mb-5">
          <div class="card h-100">
            <div class="card-body">
                {!! Form::open(['method' => 'post', 'route' => 'login']) !!}

                    <p class="h4 text-center mb-4">Submit login credentials</p>
                    <!-- Material input text -->
                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        {!! Form::text('identity', old('identity'), array('class' =>'form-control', 'id'=>'identity')) !!}
                        {!! Form::label('identity', 'Your username or email') !!}
                    </div>

                    @if ($errors->has('identity'))
                        <p class="red-text">{{ $errors->first('identity') }}</p>
                    @endif

                    @if(session()->has('login_error'))
                      <p class="red-text">{{ session()->get('login_error') }}</p>
                    @endif

                    <!-- Material input password -->
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        {!! Form::password('password', array('class' =>'form-control', 'id'=>'password')) !!}
                        {!! Form::label('password', 'Your password') !!}
                    </div>

                    @if ($errors->has('password'))
                        <p class="red-text">{{ $errors->first('password') }}</p>
                    @endif

                    <div class="md-form">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck17">
                    {!! Form::checkbox('remember', null, old('remember') ? 'checked' : '', array('class' =>'form-check-label', 'id'=>'remember_me')) !!}
                    {!! Form::label('remember_me', 'Remember Me') !!}
                    </div>

                    <div class="text-center mt-4">
                      {!! Form::submit('Sign In', array('class' =>'btn btn-primary')) !!}
                    </div>

                    <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign in with:</p>

                    <div class="row my-3 d-flex justify-content-center">
                      <!--Facebook-->
                      <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fa fa-facebook blue-text text-center"></i></button>
                      <!--Twitter-->
                      <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fa fa-twitter blue-text"></i></button>
                      <!--Google +-->
                      <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i class="fa fa-google-plus blue-text"></i></button>
                    </div>

                    <div class="row mt-3">
                      <div class="col-xl-9 col-md-8 col-sm-6 col-xs-6 col-6">
                          <a href="{{ route('register') }}">Sign Up</a>
                      </div>
                      <div class="col-xl-3 col-md-4 col-sm-6 col-xs-6 col-6">
                          <a href="{{ route('password.request') }}">Forgot Password?</a>
                      </div>
                    </div>
                {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>     
    </div>
    <!-- /.container -->

@endsection

