@if (session('info'))
    @foreach(session('info') as $info)
	    <div class="info_messages hidden">{{ $info }}</div>
	@endforeach
@endif
@if (session('success'))
    @foreach(session('success') as $success)
	    <div class="success_messages hidden">{{ $success }}</div>
	@endforeach
@endif
@if (session('error'))
    @foreach(session('error') as $error)
	    <div class="error_messages hidden">{{ $error }}</div>
	@endforeach
@endif
@if (session('warning'))
    @foreach(session('warning') as $warning)
	    <div class="warning_messages hidden">{{ $warning }}</div>
	@endforeach
@endif