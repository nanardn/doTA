@extends('layouts.dashboard')

@section('content')

	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@else

		<nav>
			<ul>
				<li><a href="{{ url('/dashboard/daftarpenggalangan')}}"> Crowdfunding</a>
					<ul class="submenu">
					<li><a href="{{ url('/dashboard/daftarpenggalangan')}}">Daftar Penggalangan Dana</a></li>
					<li><a href="{{ url('/dashboard/listPenggalangan')}}">List Pendanaan UMKM</a></li>
					<li><a href="{{ url('/dashboard/showReportPendanaan')}}">Laporan Crowdfunding</a></li>
					</ul>
				</li>
				<li ><a href="{{ url('/dashbord/daftarpendanaan')}}"> Pendanaan Usaha</a>
					<ul class="submenu">
					<li><a href="{{ url('/dashboard/daftarpendanaanbank')}}">Pengajuan Pendanaan</a></li>
					<li><a href="{{ url('/dashboard/listPendanaanBank')}}">List Pendanaan UMKM</a></li>
					<li><a href="{{ url('/dashboard/showReportPendanaanBank')}}">Laporan Pendanaan Bank</a></li>
					</ul>
				</li>
				
				<li><a href="{{ url('/dashboard/pendanaan')}}"> Pendanaan Lembaga ZISWAF</a>
				<ul class="submenu">
					<li><a href="{{ url('/dashboard/listPendanaanZiswaf')}}">List Pendanaan UMKM</a></li>
					<li><a href="{{ url('/dashboard/showReportPendanaanZiswaf')}}">Laporan Usaha</a></li>
					</ul>
				</li>
				
			</ul>
			<br/><br/><center><img src="{{URL::to('/')}}../images/logo_white.png "/></center>
		</nav>
		
			<section class="content">
				<div class="widget-container">
					<center><p style="color:red"><?php echo Session::get('pesan-uploadsukses'); ?></p></center>
				</div>
				<div class="widget-container">
				<center>
						<a href="{{ url('/dashboard/pendanaan')}}/{{ Auth::user()->id }}"><img src="{{URL::to('dashboard/images/button_pendanaan.png')}}" alt="" width="300" height="300" /></a> 
						<a href="{{ url('/dashboard/laporan')}}/{{ Auth::user()->id }}"><img src="{{URL::to('dashboard/images/button_laporan.png')}}" alt="" width="300" height="300" /></a> 
						<a href="{{ url('/dashboard/pengaturan')}}"><img src="{{URL::to('dashboard/images/button_profile.png')}}" alt="" width="300" height="300" /></a> 
				</center>
				</div>
			</section>
	@endif
@endsection

