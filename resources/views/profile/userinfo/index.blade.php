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
            <h2 class="animated bounceInRight">{{ $user->name }}</h2>

            <!-- Nav tabs -->
            <div class="tabs-wrapper"> 
                <ul class="nav classic-tabs tabs-blue" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link waves-light active" data-toggle="tab" href="#userinfo" role="tab">User Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" href="{{ route('user.edituser') }}">Update User Information</a>
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

                <!--Panel 1-->
                <div class="tab-pane fade in show active" id="userinfo" role="tabpanel">
                    <div class="row">
                      <div class="col-lg-6 mb-4">
                        <div class="view overlay z-depth-1-half" id="aniimated-thumbnials">
                            <a href="{{ file_exists($user->avatar) ? asset($user->avatar) : 'http://via.placeholder.com/450?text=No+Profile+Picture+Found' }}" data-sub-html="{{ $user->name }} Profile Picture"> 
                              <img src="{{ file_exists($user->avatar) ? asset($user->avatar) : 'http://via.placeholder.com/450?text=No+Profile+Picture+Found' }}" class="img-fluid rounded" alt="First sample image">
                            </a>
                        </div>
                        @if ($errors->has('image'))
                            <p class="red-text mt-4">{{ $errors->first('image') }}</p>
                        @endif
                      </div>
                      <div class="col-lg-6 mb-4">                            
                          <h4>User Information</h4><hr>

                          <p>
                            <i class="fa fa-user prefix grey-text"></i>
                            {{ $user->username }}
                          </p>
                    
                          <p>
                              <i class="fa fa-birthday-cake grey-text"></i>
                              @if(empty($user->dob))
                                <span class="red-text">{{ 'Not updated yet' }}</span> 
                              @else
                                {{ date('d/m/Y', strtotime($user->dob)) }}
                              @endif  
                            </p>

                            <p>
                              <i class="fa fa-venus-mars prefix grey-text"></i>
                              @if($user->gender == 1)
                                {{ 'Male' }}
                              @elseif($user->gender == 2)
                                {{ 'Female' }}
                              @else
                                <span class="red-text">{{ 'Not updated yet' }}</span> 
                              @endif  
                            </p>

                        <div class="btn-group mt-4" role="group" aria-label="Basic example">
                            <a href="#" class="btn btn-blue btn-sm" data-toggle="modal" data-target="#updateimage">
                              <i class="fa fa-plus fa-sm pr-2" aria-hidden="true"></i>Update Profile Picture
                            </a>
                            @if($user->verified)
                              <a href="#" class="btn btn-blue btn-sm">
                                <i class="fa fa-check fa-sm pr-2" aria-hidden="true"></i>
                                Profile verified
                              </a>
                            @else
                              <a href="#" class="btn btn-blue btn-sm" data-toggle="modal" data-target="#verifyAccount">
                                <i class="fa fa-warning fa-sm pr-2" aria-hidden="true"></i>
                                Profile not yet verified
                              </a>
                            @endif
                        </div>
                      </div>
                    </div>
                    
                    <h4>Contact Information</h4><hr>
                      <p>
                        <i class="fa fa-envelope prefix grey-text"></i>
                        {{ $user->email }}
                      </p>

                      <p>
                        <i class="fa fa-phone prefix grey-text"></i>
                        {{ str_replace('-', '', $user->contact) }}
                      </p>
                      <p>
                        <i class="fa fa-address-card prefix grey-text"></i>
                        {!! empty($user->address) ? '<span class="red-text">Not updated yet</span>' : $user->address !!}
                      </p>
                </div>
                <!--/.Panel 1-->
            </div>
          </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Update Image -->
    <div class="modal fade" id="updateimage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
            <!--Content-->
            <div class="modal-content avatar_modal">

                <!--Header-->
                <div class="modal-header">
                    <img src="http://via.placeholder.com/450x450" alt="avatar" class="rounded-circle img-responsive preview_input">
                </div>
                <!--Body-->
                <div class="modal-body text-center mb-1">

                    <h5 class="mt-1 mb-2">Update Profile Picture</h5>

                    {!! Form::open(['class'=>'md-form upload_image', 'method' => 'put', 'route' => ['user.updateImage', $user->id], 'enctype' => 'multipart/form-data']) !!}

                      <div class="file-field">
                          <div class="btn btn-primary btn-sm float-left">
                              <span>Select</span>
                              {!! Form::file("image", ['class'=>'input_image']) !!}
                          </div>
                          <div class="file-path-wrapper">
                              {!! Form::text('', null, ['class'=>'file-path validate', 'placeholder'=>'Choose your file']) !!}
                          </div>
                      </div>
                      <div class="text-center mt-4">
                          {{ Form::button('Upload Image <i class="fa fa-upload ml-1"></i>', ['type' => 'submit', 'class' => 'btn btn-cyan mt-1 btn-md'] ) }}
                      </div>

                    {!! Form::close() !!}

                </div>

            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Update Image -->

    <!-- Verification link -->
    <div class="modal fade" id="verifyAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Verify Profile</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <p>Click the verification link sent to your email after registration to verify your account. If you did not receive any mail, click the below button to resend verification link</p>
                    <div class="btn-group mt-4" role="group" aria-label="Basic example">
                      <a href="{{ route('user.verification') }}" class="btn btn-primary"><i class="fa fa-send fa-sm pr-2"" aria-hidden="true"></i>Resend verification link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Verification link -->

@endsection

