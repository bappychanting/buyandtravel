<!DOCTYPE html>
<html lang="en">

  <!-- Header -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon-->
    <link rel="icon" href="{!! asset('favicon.png') !!}"/>

    <title>@yield('title') Buy &#38; Travel || Trade Items From Overseas</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bootstrap core CSS -->
    {{ Html::style('css/bootstrap.min.css') }}

    <!-- Animation Css -->
    {{ Html::style('plugins/animate-css/animate.css') }}

    <!-- Sweetalert Css -->
    {{ Html::style('plugins/sweetalert/sweetalert.css') }}

    <!-- Bootstrap Spinner Css -->
    {{ Html::style('plugins/jquery-spinner/css/bootstrap-spinner.css') }}

    <!-- Bootstrap Tagsinput Css -->
    {{ Html::style('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}

    <!-- Bootstrap Material Datetime Picker Css -->
    {{ Html::style('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}

    <!-- Image Slider Css -->
    {{ Html::style('plugins/light-gallery/css/lightgallery.css') }}
    
    <!-- Image Slider Css -->
    {{ Html::style('plugins/light-slider/css/lightslider.css') }}

    <!-- Material Design Bootstrap -->
    {{ Html::style('css/mdb.min.css') }}

    <!-- Custom styles for this template -->
    {{ Html::style('css/style.css') }}
  </head>
  <!-- #ENDS# Header -->

  <body {!! Request::is('/')? 'class="index"':'' !!}>
    
	@include('layouts.partials.loader')
	@include('layouts.partials.navigation')
    
    <!-- Content -->
    @yield('content')
    <!-- #ENDS# Content -->

	@include('layouts.partials.alerts')
    @include('layouts.partials.scrolltotop')
	@include('layouts.partials.footer')



    <!-- Javascript -->

    <!-- Bootstrap core JavaScript -->
 	{{Html::script('js/jquery.min.js')}}
    {{Html::script('js/jquery.form.js')}}

    <!-- Bootstrap tooltips -->
 	{{Html::script('js/popper.min.js')}}

    <!-- Bootstrap core JavaScript -->
 	{{Html::script('js/bootstrap.min.js')}}

    <!-- Sweet Alert -->
 	{{Html::script('plugins/sweetalert/sweetalert.min.js')}}

    <!-- Bootstrap Notify -->
 	{{Html::script('plugins/bootstrap-notify/bootstrap-notify.min.js')}}

    <!-- Light Gallery Plugin Js -->
 	{{Html::script('plugins/light-gallery/js/lightgallery-all.js')}}

    <!-- Light Slider Plugin Js -->
 	{{Html::script('plugins/light-slider/js/lightslider.js')}}

    <!-- Slimscroll Plugin Js -->
 	{{Html::script('plugins/jquery-slimscroll/jquery.slimscroll.js')}}

    <!-- Autosize Plugin Js -->
 	{{Html::script('plugins/autosize/autosize.js')}}

    <!-- Input Mask Plugin Js -->
 	{{Html::script('plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}

    <!-- Jquery Spinner Plugin Js -->
 	{{Html::script('plugins/jquery-spinner/js/jquery.spinner.js')}}

    <!-- Bootstrap Tags Input Plugin Js -->
 	{{Html::script('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}

    <!-- Moment Plugin Js -->
 	{{Html::script('plugins/momentjs/moment.js')}}

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
 	{{Html::script('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}

    <!-- TinyMCE -->
 	{{Html::script('plugins/tinymce/tinymce.min.js')}}

    <!-- MDB core JavaScript -->
 	{{Html::script('js/mdb.min.js')}}

    <!-- Custom JavaScript -->
 	{{Html::script('js/script.js')}}
 	{{Html::script('js/image-gallery.js')}}
 	{{Html::script('js/image-slider.js')}}
 	{{Html::script('js/basic-form-elements.js')}}
 	{{Html::script('js/advanced-form-elements.js')}}

  </body>

</html>
