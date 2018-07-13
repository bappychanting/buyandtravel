<html>
<head>
<title>
	{{ $order->product_name.'_'.$order->user->name.'_'.date('d F Y', strtotime($order->created_at)) }}
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

<h1>{{ $order->product_name }}</h1>

<section>
  <nav>
	<img src="{{ public_path(array_get($order->images()->first(), 'src')) }}" alt="{{ $order->product_name }}" width= "200" height= "200">
  </nav>
  
  <article>
		<h4><strong>Product Category:</strong> {{ $order->product_type->product_type }}</h4>
		<p><strong>Expected Price:</strong> {{ $order->expected_price }}/=</p>
		<p><strong>Handover Location:</strong> {{ $order->delivery_location }}</p>
  </article>
</section>

<h5><strong>Added by:</strong> {{ $order->user->name }}</h5>
<p><strong>Contact:</strong> {{ str_replace('-', '', $order->user->contact) }}</p>
<p><strong>Email:</strong> {{ $order->user->email }}</p>


{!! $order->additional_details !!} 

<p><a href="{{ route('front.orders.show', $order->id) }}">View Online</a></p>


<!-- #END# Download Travel Scedule PDF --> 

</body>