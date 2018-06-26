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
                        <a class="nav-link waves-light active" data-toggle="tab" href="edituserinfo" role="tab">Update User Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" href="{{ route('user.editcontact') }}">Update Contact Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" href="{{ route('user.editpassword') }}">Update Password</a>
                    </li>
                </ul>
            </div>

            <!-- Tab panels -->
            <div class="tab-content card">

                <!--Panel 2-->
                <div class="tab-pane fade in show active" id="edituserinfo" role="tabpanel">

                  <h4>Update User Information</h4><hr>

                  {!! Form::open(['method' => 'put', 'route' => ['user.updateuser', $user->id]]) !!}

                                        
                    <div class="demo-masked-input">

                    <!-- Material input text -->
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        {!! Form::text('name', $user->name, array('class' =>'form-control', 'id'=>'name')) !!}
                        {!! Form::label('name', 'Your name') !!}
                    </div>

                    @if ($errors->has('name'))
                        <p class="red-text">{{ $errors->first('name') }}</p>
                    @endif

                    <!-- Material input date of Gender -->
                    <div class="md-form my-4">
                        <div class="row">
                            <div class="col-lg-1">
                                <i class="fa fa-venus-mars prefix grey-text"></i>
                            </div>
                            <div class="col-lg-9 form-inline">
                                <div class="form-check">
                                    {!! Form::radio('gender', '1', ($user->gender == 1) ? true : false, array('class' =>'form-check-input', 'id'=>'male')) !!}
                                    {!! Form::label('male', 'Male') !!}
                                </div>
                                <div class="form-check">
                                    {!! Form::radio('gender', '2', ($user->gender == 2) ? true : false, array('class' =>'form-check-input', 'id'=>'female')) !!}
                                    {!! Form::label('female', 'Female') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($errors->has('gender'))
                        <p class="red-text">{{ $errors->first('gender') }}</p>
                    @endif

                    <!-- Material input date of birth -->
                    <div class="md-form">
                        <i class="fa fa-birthday-cake prefix grey-text"></i>
                        {!! Form::text('dob', empty($user->dob) ? '' : date('d/m/Y', strtotime($user->dob)), array('class' =>'form-control date', 'placeholder'=>'Your Date of Birth (dd/mm/yyyy)')) !!}
                    </div>

                    @if ($errors->has('dob'))
                        <p class="red-text">{{ $errors->first('dob') }}</p>
                    @endif


                    <div class="text-center mt-4">
                        {!! Form::submit('Update Information', array('class' =>'btn btn-primary')) !!}
                    </div>

                  </div>
                {!! Form::close() !!}

                </div>
                <!--/.Panel 2-->
            </div>
          </div>
        </div>
        <!-- /.row -->

    </div>

@endsection

