@extends('layouts.master')

@section('title', $user->name." || Create Message || ")

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
          <li class="breadcrumb-item"><a class="white-text" href="{{ route('messages.index') }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Messages</a></li>
          <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Create Message</li>
        </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

            <!-- Content Column -->
            <div class="col-lg-10 mb-4">
              <h2>Create Message</h2>
              <p>Please input the following details</p>
              
              {!! Form::open(['method' => 'post', 'route' => ['messages.store.subject']]) !!}

              <div class="demo-masked-input">

                {!! Form::hidden('user_id', $user->id) !!}

                <!-- Material input text -->
                <div class="md-form">
                  {!! Form::text('subject', null, array('class' =>'form-control', 'id'=>'subject')) !!}
                  {!! Form::label('subject', 'Message subject') !!}
                </div>

                @if ($errors->has('subject'))
                    <p class="red-text">{{ $errors->first('subject') }}</p>
                @endif

                <div class="text-center my-4">
                  {!! Form::submit('Create Message', array('class' =>'btn btn-primary')) !!}
                </div>
              </div>

              {!! Form::close() !!}
            </div> 
           
          </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

