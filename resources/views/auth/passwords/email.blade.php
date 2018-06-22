@extends('layouts.master')

@section('content')

<div class="container">

      <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Reset Password</h1>

        <div class="bc-icons">
          <ol class="breadcrumb blue-gradient">
             <li class="breadcrumb-item"><a class="white-text" href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i><a href="{{ route('login') }}" class="white-text">Sign In</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Reset Password</li>
          </ol>
        </div>
       
        <div class="card h-100">
            <div class="card-body">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {!! Form::open(['method' => 'post', 'route' => 'password.email']) !!}
                    <div class="demo-masked-input">

                    <!-- Material input text -->
                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        {!! Form::text('email', old('email'), array('class' =>'form-control email', 'placeholder'=>'E-mail Address')) !!}
                    </div>

                    @if ($errors->has('email'))
                        <p class="red-text">{{ $errors->first('email') }}</p>
                    @endif

                    <div class="text-center mt-4">
                      {!! Form::submit('Send Password Reset Link', array('class' =>'btn btn-primary')) !!}
                    </div>

                    </div>
                {!! Form::close() !!}

            </div>
        </div>   
    </div>
    <!-- /.container -->

@endsection

