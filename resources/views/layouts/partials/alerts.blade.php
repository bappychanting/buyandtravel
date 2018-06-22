@if($error->any())
  <p class="font-bold col-red">{!! $errors->first() !!}</p>
@endif
@if (session('info'))
    @foreach(session('info') as $info)
	    {!! Form::hidden('info_message', $info) !!}
	@endforeach
@endif
@if (session('success'))
    @foreach(session('success') as $success)
	    {!! Form::hidden('success_message', $success) !!}
	@endforeach
@endif
@if (session('error'))
    @foreach(session('error') as $error)
	    {!! Form::hidden('error_message', $error) !!}
	@endforeach
@endif
@if (session('warning'))
    @foreach(session('warning') as $warning)
	    {!! Form::hidden('warning_message', $warning) !!}
	@endforeach
@endif