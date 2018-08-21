@extends('layouts.master')

@section('title', $user->name." || Notifications || ")

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
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Summery</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

          <!-- Content Column -->
          <div class="col-lg-10 mb-4">
            <h2>Notifications</h2>
            <p>Here is the list of all the notifications you recieved!</p>

            @foreach($notifications as $notification)
              <a href="{{ route('notifications.redirect', $notification->id) }}" target="_blank">
                <div class="card mb-5">
                  <div class="card-body white">
                    <div class="row">
                      <div class="col-lg-1">
                        <span class="badge badge-pill orange"><i class="fa fa-{{ $notification->data['icon'] }} fa-2x" aria-hidden="true"></i></span>
                      </div>
                      <div class="col-lg-11">
                        <p class="teal-text">{{ $notification->data['text'] }}</p>
                        <small class="grey-text">{{ date('l, d F Y', strtotime($notification->created_at)) }}</small>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            @endforeach

            <!-- Pagination -->
            <nav aria-label="Page navigation example" class="table-responsive">
                <ul class="pagination pg-blue justify-content-end">
                  <ul class="pagination pg-blue">
                      {{ $notifications->links() }}                 
                  </ul>
                </ul>
            </nav>
          </div>
          <!-- Content Column -->

        </div>
        <!-- /.row -->

    </div>

@endsection

