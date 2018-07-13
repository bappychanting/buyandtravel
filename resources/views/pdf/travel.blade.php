<html>
<head>
<title>
	{{ $traveler->user->name.'_'.$traveler->city.'_'.$traveler->country->name.'_'.date('F Y', strtotime($traveler->arrival_date)) }}
</title>
<style type="text/css" media="all">
nav {
    float: left;
    width: 30%;
    padding: 20px;
}

article {
    float: left;
    padding: 20px;
    width: 70%;
}
section:after {
    content: "";
    display: table;
    clear: both;
}
a:link {
    color: #1e88e5;
    text-decoration: none;
}
</style>
</head>
<body>

<!-- Download Travel Scedule PDF -->

<h1>{{ $traveler->user->name }}</h1>

<section>
  <nav>
	<img src="{{ public_path($traveler->user->avatar) }}" alt="{{ $traveler->user->name }}" width= "200" height= "200">
  </nav>
  
  <article>
		<h4><strong>Traveling To:</strong> {{ $traveler->city }}, {{ $traveler->country->name }}</h4>
		<h5><strong>Traveling Zone:</strong> {{ $traveler->destination }}</h5>
		<p><strong>Journey Starts At:</strong> {{ date('l d F Y', strtotime($traveler->arrival_date)) }}</p>
		<p><strong>Journey Ends At:</strong> {{ date('l d F Y', strtotime($traveler->leave_date)) }}</p>
  </article>
</section>

<p><strong>User Contact:</strong> {{ str_replace('-', '', $traveler->user->contact) }}</p>
<p><strong>User Email:</strong> {{ $traveler->user->email }}</p>


{!! $traveler->additional_details !!} 

<p><a href="{{ route('front.travel.show', $traveler->id) }}">View Online</a></p>


<!-- #END# Download Travel Scedule PDF --> 

</body>
</html>