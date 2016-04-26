<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<title>Dashboard | ZISWAF Crowdfunding</title>

    <meta name="keywords" content="ZISWAF Reporting UMKM | Zakat | Infaq | Sadaqah | Waqaf" />
    <meta name="description" content="Aplikasi Pendanaan untuk Zakat, Infaq, Sadaqah dan Waqaf untuk kegiatan ZISWAF Produktif khusu UMKM">
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

	<link href="{{ URL::asset('dashboard/css/style.css')}}" rel="stylesheet">

	<!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{URL::to('/')}}../images/favico.png">

	<!--[if IE]><link rel="stylesheet" href="css/ie.css" media="all" /><![endif]-->
	<!--[if lt IE 9]><link rel="stylesheet" href="css/lt-ie-9.css" media="all" /><![endif]-->

	<style>
		ul.pagination {
		    display: inline-block;
		    padding: 0;
		    margin: 0;
		}

		ul.pagination li {display: inline;}

		ul.pagination li a {
		    color: black;
		    float: left;
		    padding: 8px 16px;
		    text-decoration: none;
		    transition: background-color .3s;
		    border: 1px solid #ddd;
		    margin: 0 4px;
		}

		ul.pagination li a.active {
		    background-color: #4CAF50;
		    color: white;
		    border: 1px solid #4CAF50;
		}

		ul.pagination li a:hover:not(.active) {background-color: #ddd;}
	</style>

@if (Auth::guest())
	<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />
@else

</head>
<body>
	<div class="testing">
		<header class="main">
			<a href="{{URL::to('/')}}"><h1><strong>ZISWAF Reporting UMKM</strong> Dashboard</h1></a>
			
		</header>
		<section class="user">
			<div class="profile-img">
				<p> Selamat Datang <strong>{{ Auth::user()->name }}</strong></p>
			</div>
			<div class="buttons">
				<button class="ico-font">&#9206;</button>
				<span class="button blue"><a href="{{ url('/logout') }}">Logout</a></span>
			</div>
		</section>
	</div>
	
	@yield('content')

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	<script src="{{ URL::asset('dashboard/js/cycle.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/jquery.wysiwyg.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/custom.js')}}"></script>	
	<script src="{{ URL::asset('dashboard/js/jquery.checkbox.min.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/flot.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/flot.resize.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/flot-time.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/flot-pie.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/flot-graphs.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/cycle.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/jquery.tablesorter.min.js')}}"></script>
	<script type="text/javascript">
	// Feature slider for graphs
	$('.cycle').cycle({
		fx: "scrollHorz",
		timeout: 0,
	    slideResize: 0,
	    prev:    '.left-btn', 
	    next:    '.right-btn'
	});
	</script>

@endif
@stack('scripts')
</body>
</html>

