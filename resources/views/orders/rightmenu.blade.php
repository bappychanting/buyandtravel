<div class="col-lg-4">

  <a class="btn btn-md btn-cyan btn-block mb-4" href="{{ route('orders.create') }}"><i class="fa fa-plus fa-sm pr-2"" aria-hidden="true"></i> Add Order</a>

  <!-- Search by keyword -->
  <div class="card card-cascade mb-4">
    <div class="view gradient-card-header blue-gradient">
      <h5 class="card-header-title">Search</h5>
      <p class="card-header-subtitle mb-0">Delivery Location, Product Name Etc.</p>
    </div>
    <div class="card-body">
      {!! Form::open(['url' => route('front.orders.index'), 'method'=>'get']) !!}
        <div class="row">
          <div class="col-xl-8 col-lg-8 col-md-9 col-sm-12 col-12">
            <div class="md-form">
              {!! Form::text('keyword', $keyword, ['class'=>'form-control', 'id'=>'keyword']) !!}
              {!! Form::label('keyword', 'Key Words') !!}
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 col-12">
            <div class="text-center mt-4">
              {!! Form::button('<i class="fa fa-search"></i>', array('type' => 'submit', 'class' =>'btn btn-primary btn-sm')) !!}
            </div>
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
  <!-- Search by keyword -->

  <!-- Search by date -->
  <div class="card card-cascade mb-4">
    <div class="view gradient-card-header blue-gradient">
      <h5 class="card-header-title">Sort by Date</h5>
    </div>
    <div class="card-body">
      {!! Form::open(['url' => route('front.orders.index'), 'method'=>'get']) !!}
        {!! Form::hidden('keyword', $keyword) !!}
        {!! Form::hidden('product_type', $product_type) !!}
        <div class="md-form">
          <i class="fa fa-sort-desc prefix grey-text"></i>
          {!! Form::text('from', $from, ['class'=>'form-control datepicker', 'id'=>'from']) !!}
          {!! Form::label('from', 'Starts From') !!}
        </div>
        <div class="md-form">
          <i class="fa fa-sort-asc prefix grey-text"></i>
          {!! Form::text('to', $to, ['class'=>'form-control datepicker', 'id'=>'to']) !!}
          {!! Form::label('to', 'Ends At') !!}
        </div>
        <div class="text-center mt-4">
          {!! Form::button('<i class="fa fa-sort"></i>', array('type' => 'submit', 'class' =>'btn btn-primary btn-sm')) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
  <!-- Search by date -->

  <!-- Sort by Category -->
  <div class="card card-cascade mb-4">
    <div class="view gradient-card-header blue-gradient">
      <h5 class="card-header-title">Sort by Category</h5>
    </div>
    <div class="card-body">
        <ul class="list-unstyled mb-0">
          <div class="row">
        @foreach($categories as $category)
            <div class="col-lg-6">
              <li>
                <a href="/orders?keyword={{ $keyword }}&product_type={{ $category->product_type }}">{{ $category->product_type }}</a>
                <hr>
              </li>
            </div>
        @endforeach
          </div>
        </ul>
      </div>
    </div>
  <!-- Sort by Category -->

</div>