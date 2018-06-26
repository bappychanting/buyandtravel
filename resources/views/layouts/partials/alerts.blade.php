@if (session('info'))
    @foreach(session('info') as $title => $message)
	    <div class="info_messages hidden">
	    	<h1>{{ $title }}</h1>
	    	<p>{{ $message }}</p>
	    </div>
	@endforeach
@endif
@if (session('success'))
    @foreach(session('success') as $title => $message)
    	<div class="success_messages hidden">
	    	<h1>{{ $title }}</h1>
	    	<p>{{ $message }}</p>
	    </div>
	@endforeach
@endif
@if (session('error'))
    @foreach(session('error') as $title => $message)
    	<div class="error_messages hidden">
	    	<h1>{{ $title }}</h1>
	    	<p>{{ $message }}</p>
	    </div>
	@endforeach
@endif
@if (session('warning'))
    @foreach(session('warning') as $title => $message)
    	<div class="warning_messages hidden">
	    	<h1>{{ $title }}</h1>
	    	<p>{{ $message }}</p>
	    </div>
	@endforeach
@endif