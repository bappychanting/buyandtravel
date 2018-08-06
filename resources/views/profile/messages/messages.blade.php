@extends('layouts.master')

@section('title', $user->name." || Conversation || ")

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
        <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Conversation</li>
      </ol>
    </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            @include('profile.sidebar')

            <!-- Content Column -->
            <div class="col-lg-10 mb-4">
                <h2>Conversation</h2>         

                <h4 class="my-3 font-weight-bold">
                  {{ $conversation->subject }}
                </h4>
                <hr>

                <small class="grey-text mr-3">
                  In this conversation
                </small>
                @foreach($conversation->participants as $participant)
                <div class="chip">
                  <img src="{{ file_exists($participant->user->avatar) ? asset($participant->user->avatar) : 'http://via.placeholder.com/450' }}" alt="{{ $participant->user->name }}"> {{ $participant->user->name }}
                </div>
                @endforeach
                {!! Form::open(['url' => '/profile/offers', 'method'=>'get']) !!}
                  <div class="row mb-5">
                    <div class="col-lg-3 col-md-10 col-sm-10 col-xs-12">
                      <!-- Material input email -->
                      <div class="md-form">
                          {!! Form::text('add_participants', null, ['class'=>'form-control', 'id'=>'add']) !!}
                          {!! Form::label('add', 'Add more participants') !!}
                      </div>
                      <div id="participants_list">
                        <!-- <ul class="list-group jquery_dropdown_result">
                          <a href="#" class="list-group-item">Cras justo odio</a>
                          <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                          <a href="#" class="list-group-item">Morbi leo risus</a>
                          <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                          <a href="#" class="list-group-item">Vestibulum at eros</a>
                        </ul> -->
                      </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-2 col-xs-12">
                      <div class="text-center mt-4">
                        {!! Form::button('<i class="fa fa-plus"></i>', array('type' => 'submit', 'class' =>'btn btn-primary btn-sm')) !!}
                      </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="pull-right mt-4">
                          <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-exclamation-triangle fa-sm pr-2" aria-hidden="true"></i>Remove yourself from this conversation</a>
                          <a class="btn btn-blue btn-sm" href="{{ route('messages.show', $conversation->id) }}"><i class="fa fa-refresh fa-sm pr-2"" aria-hidden="true"></i> Refresh Messages</a>
                        </div>
                    </div>
                  </div>
                {!! Form::close() !!}

                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination pg-blue justify-content-end">
                      <ul class="pagination pg-blue">
                          {{ $messages->links() }}                 
                      </ul>
                    </ul>
                </nav>
                <!-- End Pagination -->
                @foreach($messages->reverse() as $message)
                  <!-- Message -->
                  <div class="row">
                    <div class="col-lg-1 mb-5">
                      <img src="{{ file_exists($message->user->avatar) ? asset($message->user->avatar) : 'http://via.placeholder.com/450' }}" class="img-fluid rounded-circle z-depth-0">
                    </div>
                    <div class="col-lg-11 mb-5">
                      <div class="card border message_area {{ $message->user->id == $user->id ? 'border-light'  : 'border-info' }}">
                        <div class="card-body">
                          <h6 class="font-weight-bold">{{ $message->user->name }}</h6>
                          <small class="grey-text">{{ $message->created_at->format('l d F Y, h:i A') }}</small>
                          <hr>
                          {!! $message->message !!}
                        </div>
                        @if($message->user->id == $user->id && (strtotime($message->created_at) + 3600) > time())
                          {!! Form::open(['method' => 'delete', 'route' => ['messages.destroy', $message->id]]) !!}
                            <div class="btn-group mb-3 mx-3" role="group" aria-label="Basic example">
                              <button type="button" class="btn btn-indigo btn-sm btn-rounded edit_message_button" data-toggle="modal" data-target="#edit_message_modal" data-message-id="{{ $message->id }}"><i class="fa fa-edit"" aria-hidden="true"></i></button>
                              {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array('class' => 'btn btn-unique btn-sm btn-rounded form_warning_sweet_alert', 'title'=>'Are you sure?', 'text'=>'Your message will disappear!', 'confirmButtonText'=>'Yes, delete message!', 'type'=>'submit')) !!}
                            </div>
                          {!! Form::close() !!} 
                        @endif
                      </div>
                    </div>
                  </div>
                  <!-- Message -->
                @endforeach

                @if(count($messages) > 0 && $messages->onFirstPage() && $messages->first()->user->id == $user->id)
                  <small class="pull-right mb-3"><a data-toggle="modal" data-target="#viewers_modal">&#10004; Viewed by me john, f.cennady and 6 others</a></small>
                @elseif($messages->onFirstPage())
                  <div class="row mb-5">
                    <div class="col-lg-1">
                      <img src="{{ file_exists($user->avatar) ? asset($user->avatar) : 'http://via.placeholder.com/450' }}" class="img-fluid rounded-circle z-depth-0">
                    </div>
                    <div class="col-lg-11">

                      {!! Form::open(['method' => 'post', 'route' => ['messages.store']]) !!}

                        {!! Form::hidden('user_id', $user->id) !!}
                        {!! Form::hidden('message_subject_id', $conversation->id) !!}

                        <p class="font-weight-bold my-3">Add Message</p>
                        @if ($errors->has('message'))
                          <p class="red-text">{{ $errors->first('message') }}</p>
                        @endif

                        <!-- Material Editor -->
                        <div class="md-form">
                          {!! Form::textarea('message', null, array('class'=>'editor')) !!}
                        </div>

                        <div class="text-center my-4">
                          {!! Form::submit('Add', array('class' =>'btn btn-primary')) !!}
                        </div>

                      {!! Form::close() !!}  
                    </div>
                  </div>
                @endif           
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

    <!-- Viewers Modal -->
    <div class="modal fade" id="viewers_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title w-100" id="viewDetailsTitle">Message viewed by...</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="list-group">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <div class="chip">
                      <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="Contact Person"> John Doe
                    </div>
                    <small class="grey-text pull-right">{{ date('l d F Y, h:i A') }}</small>
                  </li>
                  <li class="list-group-item">
                    <div class="chip">
                      <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="Contact Person"> John Doe
                    </div>
                    <small class="grey-text pull-right">{{ date('l d F Y, h:i A') }}</small>
                  </li>
                  <li class="list-group-item">
                    <div class="chip">
                      <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="Contact Person"> John Doe
                    </div>
                    <small class="grey-text pull-right">{{ date('l d F Y, h:i A') }}</small>
                  </li>
                </ul>
            </ul>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Viewers Modal -->

    <!-- Edit Message Modal -->
    <div class="modal fade" id="edit_message_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title w-100" id="editMessageTitle"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <small class="grey-text" id="message_last_updated"></small>
            <div id="edit_message_area">
              {!! Form::open(['id' => 'edit_message_form', 'method' => 'put', 'route' => ['messages.update', null]]) !!}
                <div id="edit_message_alert"></div>
                <div class="md-form">
                  {!! Form::textarea('message', null, array('class'=>'editor', 'id'=>'edit_message_textarea')) !!}
                </div>
                <div class="text-center my-4">
                {!! Form::submit('Update', array('class' =>'btn btn-primary', 'id'=>'update_message_button', 'disabled'=>'true')) !!}
                </div>
              {!! Form::close() !!}
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Viewers Modal -->

@endsection

