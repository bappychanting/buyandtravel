@extends('layouts.master')

@section('content')

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Sign Up</h1>

      <div class="bc-icons">
          <ol class="breadcrumb blue-gradient">
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Sign up</li>
          </ol>
      </div>

      <div class="row">
        <div class="col-lg-4 mb-5">
          <img class="img-fluid rounded" src="http://www.pngpix.com/wp-content/uploads/2016/11/PNGPIX-COM-Bugs-Bunny-PNG-Transparent-Image.png" alt="">
        </div>
        <div class="col-lg-8 mb-5">
          <div class="card h-100">
            <div class="card-body">
                {!! Form::open(['method' => 'post', 'route' => 'register']) !!}

                  <p class="h4 text-center mb-4">Please input the following information</p>
                  <div class="demo-masked-input">

                    <!-- Material input text -->
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        {!! Form::text('name', old('name'), array('class' =>'form-control', 'id'=>'name')) !!}
                        {!! Form::label('name', 'Your name') !!}
                    </div>

                    @if ($errors->has('name'))
                        <p class="red-text">{{ $errors->first('name') }}</p>
                    @endif

                    <!-- Material input text -->
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        {!! Form::text('username', old('username'), array('class' =>'form-control', 'id'=>'username')) !!}
                        {!! Form::label('username', 'Your username') !!}
                    </div>

                    @if ($errors->has('username'))
                        <p class="red-text">{{ $errors->first('username') }}</p>
                    @endif

                    <!-- Material input email -->
                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        {!! Form::text('email', old('email'), array('class' =>'form-control email', 'placeholder'=>'Your email')) !!}
                    </div>

                    @if ($errors->has('email'))
                        <p class="red-text">{{ $errors->first('email') }}</p>
                    @endif

                    <!-- Material input contact -->
                    <div class="md-form">
                        <i class="fa fa-phone prefix grey-text"></i>
                        {!! Form::text('contact', old('contact'), array('class' =>'form-control mobile-phone-number', 'placeholder'=>'Your contact')) !!}
                    </div>

                    @if ($errors->has('contact'))
                        <p class="red-text">{{ $errors->first('contact') }}</p>
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

                    <!-- Material confirm password -->
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        {!! Form::password('password_confirmation', array('class' =>'form-control', 'id'=>'password-confirm')) !!}
                        {!! Form::label('password-confirm', 'Confirm Your password') !!}
                    </div>

                    <div class="md-form">
                        {!! Form::checkbox('condition', null, old('condition') ? 'checked' : '', array('class' =>'form-check-input', 'id'=>'condition')) !!}
                        <label class="form-check-label" for="condition">I&#39;ve read and comply with the<a href="#" class="blue-text font-weight-bold"> Terms and Conditions</a></label>
                    </div>

                    @if ($errors->has('condition'))
                        <p class="red-text mt-3">{{ $errors->first('condition') }}</p>
                    @endif

                    <div class="text-center mt-4">
                        {!! Form::submit('Sign Up', array('class' =>'btn btn-primary')) !!}
                    </div>

                     <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign up with:</p>

                    <div class="row my-3 d-flex justify-content-center">
                        <!--Facebook-->
                        <a type="button" class="btn-floating btn-fb"><i class="fa fa-facebook"></i></a>
                        <!--Twitter-->
                        <a type="button" class="btn-floating btn-tw"><i class="fa fa-twitter"></i></a>
                        <!--Google +-->
                        <a type="button" class="btn-floating btn-gplus"><i class="fa fa-google-plus"></i></a>
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
