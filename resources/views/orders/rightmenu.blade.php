<div class="col-lg-4">

  <a class="btn btn-md btn-primary btn-block mb-4" href="{{ route('orders.create') }}"><i class="fa fa-plus fa-sm pr-2"" aria-hidden="true"></i> Add Order</a>

  <!-- Search -->
  <div class="card card-cascade mb-4">
    <div class="view gradient-card-header blue-gradient">
      <h5 class="card-header-title">Search &#38; Sort</h5>
      <p class="card-header-subtitle mb-0">Please Submit Following Form</p>
    </div>
    <div class="card-body">
      {!! Form::open(['url' => route('front.orders.search'), 'method'=>'post']) !!}
          <div class="md-form">
            {!! Form::text('keyword', $keyword, ['class'=>'form-control', 'id'=>'keyword']) !!}
            {!! Form::label('keyword', 'Key Words') !!}
          </div>
          @if ($errors->has('keyword'))
              <p class="red-text">{{ $errors->first('keyword') }}</p>
          @endif
          <div class="md-form">
            <select name="product_type_id" class="mdb-select colorful-select dropdown-primary" searchable="Search here..">
              <option value="" {{ (empty($product_type)) ? 'selected' : '' }}>All Types of Products</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ ($product_type == $category->id) ? 'selected' : '' }}>{{ $category->product_type }}</option>
              @endforeach
            </select>
          </div>
          <div class="md-form">
            {!! Form::text('from', $from, ['class'=>'form-control datepicker', 'id'=>'from']) !!}
            {!! Form::label('from', 'Starts From') !!}
          </div>
          @if ($errors->has('from'))
              <p class="red-text">{{ $errors->first('from') }}</p>
          @endif
          <div class="md-form">
            {!! Form::text('to', $to, ['class'=>'form-control datepicker', 'id'=>'to']) !!}
            {!! Form::label('to', 'Ends At') !!}
          </div>
          @if ($errors->has('to'))
              <p class="red-text">{{ $errors->first('to') }}</p>
          @endif
          <div class="text-center mt-4">
            {!! Form::button('<i class="fa fa-search"></i>', array('type' => 'submit', 'class' =>'btn btn-primary btn-sm')) !!}
          </div>
      {!! Form::close() !!}
    </div>
  </div>
  <!-- Search -->

</div>