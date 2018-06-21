@extends('layouts.master')

@section('content')

<div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Sign In</h1>

      <div class="bc-icons">
          <ol class="breadcrumb blue-gradient">
              <li class="breadcrumb-item"><a class="white-text" href="index.php">Home</a></li>
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
                        <i class="fa fa-user prefix grey-text"></i>
                        {!! Form::email('email', old('email'), array('class' =>'form-control', 'id'=>'email')) !!}
                        {!! Form::label('email', 'Your email or username') !!}
                    </div>

                    @if ($errors->has('email'))
                        <p class="red-text">{{ $errors->first('email') }}</p>
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
                      <button class="btn btn-primary" type="submit">Sign In</button>
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

                    <a href="{{ route('password.request') }}"><p class="text-right">Forgot Password?</p></a>
                {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>     
    </div>
    <!-- /.container -->


<!-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
    <!-- /.container -->

@endsection

