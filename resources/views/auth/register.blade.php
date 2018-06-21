@extends('layouts.master')

@section('content')

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Sign Up</h1>

      <div class="bc-icons">
          <ol class="breadcrumb blue-gradient">
              <li class="breadcrumb-item"><a class="white-text" href="index.php">Home</a></li>
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i><a href="orders.php" class="white-text">Orders</a></li>
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

                    <!-- Material input text -->
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        {!! Form::text('username', old('username'), array('class' =>'form-control', 'id'=>'username')) !!}
                        {!! Form::label('username', 'Your username') !!}
                    </div>

                    <!-- Material input email -->
                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        {!! Form::email('email', old('email'), array('class' =>'form-control email', 'id'=>'email', 'placeholder'=>'Ex: example@example.com')) !!}
                        {!! Form::label('email', 'Your email') !!}
                    </div>

                    <!-- Material input contact -->
                    <div class="md-form">
                        <i class="fa fa-phone prefix grey-text"></i>
                        {!! Form::text('email', old('contact'), array('class' =>'form-control mobile-phone-number', 'id'=>'contact', 'placeholder'=>'Ex: +00 (000) 000-00-00')) !!}
                        {!! Form::label('contact', 'Your contact') !!}
                    </div>

                    <!-- Material input password -->
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        {!! Form::password('password', array('class' =>'form-control', 'id'=>'password')) !!}
                        {!! Form::label('password', 'Your password') !!}
                    </div>

                    <!-- Material confirm password -->
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        {!! Form::password('password_confirmation', array('class' =>'form-control', 'id'=>'password-confirm')) !!}
                        {!! Form::label('password-confirm', 'Confirm Your password') !!}
                    </div>

                    <div class="md-form">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck17">
                      <label class="form-check-label" for="defaultCheck17">I&#39;ve read and comply with the<a href="#" class="blue-text font-weight-bold"> Terms and Conditions</a></label>
                    </div>

                    <div class="text-center mt-4">
                        <button class="btn btn-primary" type="submit">Sign Up</button>
                    </div>

                     <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign up with:</p>

                    <div class="row my-3 d-flex justify-content-center">
                        <!--Facebook-->
                        <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fa fa-facebook blue-text text-center"></i></button>
                        <!--Twitter-->
                        <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fa fa-twitter blue-text"></i></button>
                        <!--Google +-->
                        <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i class="fa fa-google-plus blue-text"></i></button>
                    </div>
                  </div>
                {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>     
    </div>
    <!-- /.container -->

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->



@endsection
