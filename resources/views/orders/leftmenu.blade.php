<div class="col-lg-4">

  <a class="btn btn-md btn-primary btn-block mb-4" href="{{ route('orders.create') }}"><i class="fa fa-plus fa-sm pr-2"" aria-hidden="true"></i> Add Order</a>

  <!-- Search -->
  <div class="card card-cascade mb-4">
    <div class="view gradient-card-header blue-gradient">
      <h5 class="card-header-title">Search</h5>
      <p class="card-header-subtitle mb-0">product, delivery location etc</p>
    </div>
    <div class="card-body">
      {!! Form::open(['url' => '/orders', 'method'=>'get']) !!}
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="md-form">
              {!! Form::text('search', $search, ['class'=>'form-control', 'id'=>'search']) !!}
              {!! Form::label('search', 'Search Orders') !!}
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="text-center mt-4">
              {!! Form::button('<i class="fa fa-search"></i>', array('type' => 'submit', 'class' =>'btn btn-primary btn-sm')) !!}
            </div>
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
  <!-- Search -->

  <!-- Sort by Date -->
  <div class="card card-cascade mb-4">
    <div class="view gradient-card-header blue-gradient">
      <h5 class="card-header-title">Sort by Date</h5>
    </div>
    <div class="card-body">
      <div class="md-form">
          <i class="fa fa-sort-desc prefix grey-text"></i>
          <input type="email" class="form-control datepicker">
          <label for="materialFormRegisterEmailEx">From</label>
      </div>
      <div class="md-form">
          <i class="fa fa-sort-asc prefix grey-text"></i>
          <input type="email" class="form-control datepicker">
          <label for="materialFormRegisterEmailEx">To</label>
      </div>
      <div class="text-center mt-4">
        <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-sort"></i></button>
      </div>
    </div>
  </div>
  <!-- Sort by Date -->

  <!-- Categories -->
  <div class="card card-cascade mb-4">
    <div class="view gradient-card-header blue-gradient">
      <h5 class="card-header-title">Categories</h5>
    </div>
    <div class="card-body">
      <ul class="list-unstyled mb-0">
        <div class="row">
          @foreach($categories as $category)
            <div class="col-lg-6">
              <li>
                <a href="#">{{ $category->product_type }}</a>
              </li>
            </div>
          @endforeach
        </div>
      </ul>
    </div>
  <!-- Categories -->
</div> 