@extends('layouts.master')

@section('title', $user->name." || Orders || ")

@section('content')

<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">
        Orders
      </h1>

      <div class="bc-icons">
          <ol class="breadcrumb blue-gradient">
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('buyandtravel') }}">Home</a></li>
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>User Content</li>
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i><a href="{{ route('orders.index') }}" class="white-text">Orders</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Add Order</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

          <!-- Content Column -->
                    <!-- Content Column -->
          <div class="col-lg-10 mb-4">
            <h2>Add Order</h2>
            <p class="font-weight-bold">Please Input Following Details</p>
              <div class="demo-masked-input">

                <!-- Material input text -->
                <div class="md-form">
                    <input type="text" class="form-control" name="name" id="name">
                    <label for="name">Product Title</label>
                </div>
                <!-- Material input text -->

                <p>Select Category</p>
                <!-- Material input text -->
                <div class="md-form">  
                  <select class="form-control show-tick" data-live-search="true">
                      <option>Hot Dog, Fries and a Soda</option>
                      <option>Burger, Shake and a Smile</option>
                      <option>Sugar, Spice and all things nice</option>
                  </select>
                </div>

                <!-- Material input text -->
                    <div class="md-form">
                        <input type="text" class="form-control" name="price" id="pruce">
                        <label for="pruce">Price</label>
                    </div>

                    <!-- Material input text -->
                    <div class="md-form">
                        <input type="text" class="form-control" name="link" id="link">
                        <label for="link">Reference Link</label>
                    </div>

                <div class="md-form">
                    <input type="text" class="form-control" name="username" id="username">
                    <label for="username">Delivery Location</label>
                </div>
                <p class="font-weight-bold my-3">Add Details of Order</p>
                <!-- Material Editor -->
                <div class="md-form">
                    <textarea class="editor">
                        <h2>WYSIWYG Editor</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ullamcorper sapien non nisl facilisis bibendum in quis tellus. Duis in urna bibendum turpis pretium fringilla. Aenean neque velit, porta eget mattis ac, imperdiet quis nisi. Donec non dui et tortor vulputate luctus. Praesent consequat rhoncus velit, ut molestie arcu venenatis sodales.</p>
                        <h3>Lacinia</h3>
                        <ul>
                            <li>Suspendisse tincidunt urna ut velit ullamcorper fermentum.</li>
                            <li>Nullam mattis sodales lacus, in gravida sem auctor at.</li>
                            <li>Praesent non lacinia mi.</li>
                            <li>Mauris a ante neque.</li>
                            <li>Aenean ut magna lobortis nunc feugiat sagittis.</li>
                        </ul>
                        <h3>Pellentesque adipiscing</h3>
                        <p>Maecenas quis ante ante. Nunc adipiscing rhoncus rutrum. Pellentesque adipiscing urna mi, ut tempus lacus ultrices ac. Pellentesque sodales, libero et mollis interdum, dui odio vestibulum dolor, eu pellentesque nisl nibh quis nunc. Sed porttitor leo adipiscing venenatis vehicula. Aenean quis viverra enim. Praesent porttitor ut ipsum id ornare.</p>
                    </textarea>
                </div>

                <div class="text-center my-4">
                    <a class="btn btn-primary" href="user_order_details.php">Submit</a>
                </div>
              </div>
          </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

