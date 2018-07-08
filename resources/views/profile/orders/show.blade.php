@extends('layouts.master')

@section('title', $user->name." || View Order Details || ")

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
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('orders.index') }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Orders</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Order Details</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

            <!-- Content Column -->
            <div class="col-lg-10">
                <h2>View Order Details</h2>
                <h5 class="my-3 font-weight-bold">{{ $order->product_name }}</h5>
                <h6><i class="fa fa-tags fa-sm pr-2"></i><span class="dark-grey-text">{{ $order->product_type->product_type }}</span></h6>
                <hr class="mb-4">
                <p class="mt-4">
                  <i class="fa fa-clock-o fa-sm pr-2"></i><span class="font-weight-bold light-blue-text">{{$order->created_at->format('l d F Y, h:i A')}}</span>
                </p>
                {!! Form::open(['route' => ['orders.destroy', $order->id], 'method'=>'delete']) !!}
                    <a href="{{ $order->reference_link }}" class="btn btn-blue btn-sm" target="_blank"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>Reference Link</a>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-blue btn-sm"><i class="fa fa-edit fa-sm pr-2"" aria-hidden="true"></i>Update Order</a>
                    {!! Form::button('<i class="fa fa-trash fa-sm pr-2"" aria-hidden="true"></i>Delete</a>', array('class' => 'btn btn-blue btn-sm form_delete_sweet_alert', 'type'=>'submit')) !!}
                {!! Form::close() !!}

                {!! $order->additional_details !!}

                <h5 class="my-4"><i class="fa fa-money fa-sm pr-2"></i>{{ $order->expected_price }}/=</h5>
                <h6 class="my-4"><i class="fa fa-map-marker fa-sm pr-2"></i>{{ $order->delivery_location }}</h6>
                <p class="my-4">
                  @if( !empty($order->tags) )
                    @php $tags = explode(',', $order->tags); @endphp
                    @foreach($tags as $tag) <div class="chip blue lighten-1 white-text">{{ $tag }}</div> @endforeach
                  @endif
                </p>
            </div>
            <!-- #END# Content Column -->
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

