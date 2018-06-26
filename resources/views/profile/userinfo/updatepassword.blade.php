@extends('layouts.master')

@section('title', $user->name." || Profile || ")

@section('content')

<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">
        User Content
      </h1>

      <div class="bc-icons">
          <ol class="breadcrumb blue-gradient">
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('buyandtravel') }}">Home</a></li>
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>User Content</li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Profile</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

          <!-- Content Column -->
          <div class="col-lg-10 mb-4">
            <h2>{{ $user->name }}</h2>

            <!-- Nav tabs -->
            <div class="tabs-wrapper"> 
                <ul class="nav classic-tabs tabs-blue" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link waves-light" href="{{ route('user.userinfo') }}">User Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" href="{{ route('user.edituser') }}">Update User Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" href="{{ route('user.editcontact') }}">Update Contact Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light active" data-toggle="tab" href="editpassword" role="tab">Update Password</a>
                    </li>
                </ul>
            </div>

            <!-- Tab panels -->
            <div class="tab-content card">
                <!--Panel 4-->
                <div class="tab-pane fade in show active" id="editpassword" role="tabpanel">

                  <h4>Update Password</h4><hr>

                  {!! Form::open(['method' => 'put', 'route' => ['user.updatepassword', $user->id]]) !!}

                    <!-- Material input password -->
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        {!! Form::password('old_password', array('class' =>'form-control', 'id'=>'old_password')) !!}
                        {!! Form::label('old_password', 'Your current password') !!}
                    </div>

                    @if ($errors->has('old_password'))
                        <p class="red-text">{{ $errors->first('old_password') }}</p>
                    @endif

                    <!-- Material input password -->
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        {!! Form::password('password', array('class' =>'form-control', 'id'=>'password')) !!}
                        {!! Form::label('password', 'Your new password') !!}
                    </div>

                    @if ($errors->has('password'))
                        <p class="red-text">{{ $errors->first('password') }}</p>
                    @endif

                    <!-- Material confirm password -->
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        {!! Form::password('password_confirmation', array('class' =>'form-control', 'id'=>'password-confirm')) !!}
                        {!! Form::label('password-confirm', 'Confirm new password') !!}
                    </div>

                    @if ($errors->has('condition'))
                        <p class="red-text mt-3">{{ $errors->first('condition') }}</p>
                    @endif

                    <div class="text-center mt-4">
                        {!! Form::submit('Update Password', array('class' =>'btn btn-primary')) !!}
                    </div>

                  </div>
                {!! Form::close() !!}

                </div>
                <!--/.Panel 4-->
            </div>
          </div>
        </div>
        <!-- /.row -->

    </div>

@endsection

