<div class="col-lg-4">

  <a class="btn btn-md blue-gradient btn-block mb-4" href="{{ route('travel.create') }}"><i class="fa fa-plus fa-sm pr-2"" aria-hidden="true"></i> Add Travel Schedule</a>

  <!-- Search by keyword -->
  <div class="card card-cascade mb-4">
    <div class="view gradient-card-header blue-gradient">
      <h5 class="card-header-title">Search</h5>
      <p class="card-header-subtitle mb-0">Name, Destination Etc.</p>
    </div>
    <div class="card-body">
      {!! Form::open(['url' => route('front.travel.index'), 'method'=>'get']) !!}
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

  <!-- Sort by Country -->
  <div class="card card-cascade mb-4">
    <div class="view gradient-card-header blue-gradient">
      <h5 class="card-header-title">Sort by Country</h5>
    </div>
    <div class="card-body">
      {!! Form::open(['url' => route('front.travel.index'), 'method'=>'get']) !!}
        {!! Form::hidden('keyword', $keyword) !!}
        <div class="md-form">
          <select name="country" class="mdb-select colorful-select dropdown-primary" searchable="Search here..">
            <option value="" disabled selected>Select Country</option>
            @foreach($countries as $id => $country)
              <option value="{{ $country }}">{{ $country }}</option>
            @endforeach
          </select>
        </div>
        <div class="text-center mt-4">
          {!! Form::button('<i class="fa fa-sort"></i>', array('type' => 'submit', 'class' =>'btn btn-primary btn-sm')) !!}
        </div>
      {!! Form::close() !!}
      </div>
    </div>
  <!-- Sort by Country -->

  <!-- Search by date -->
  <div class="card card-cascade mb-4">
    <div class="view gradient-card-header blue-gradient">
      <h5 class="card-header-title">Sort by Date</h5>
    </div>
    <div class="card-body">
      {!! Form::open(['url' => route('front.travel.index'), 'method'=>'get']) !!}
        {!! Form::hidden('keyword', $keyword) !!}
        {!! Form::hidden('country', $country) !!}
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

</div>