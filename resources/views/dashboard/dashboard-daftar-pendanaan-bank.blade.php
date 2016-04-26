@extends('layouts.dashboard')

@section('content')
		<nav>
			<ul>
				<li class="section"><a href="{{ url('/dashboard/daftarpenggalangan')}}"> Crowdfunding</a>
					<ul class="submenu">
					<li><a href="{{ url('/dashboard/daftarpenggalangan')}}">Daftar Penggalangan Dana</a></li>
					<li><a href="{{ url('/dashboard/listPendanaanBank')}}">List Pendanaan UMKM</a></li>
					<li><a href="{{ url('/dashboard/showReportPendanaan')}}">Laporan Crowdfunding</a></li>
					</ul>
				</li>
				<li ><a href="{{ url('/dashbord/daftarpendanaan')}}"> Pendanaan Usaha</a>
					<ul class="submenu">
					<li><a href="{{ url('/dashbord/daftarpendanaanbank')}}">Pengajuan Pendanaan</a></li>
					<li><a href="{{ url('/dashboard/listPendanaanBank')}}">List Pendanaan UMKM</a></li>
					<li><a href="{{ url('/dashboard/showReportPendanaan')}}">Laporan Crowdfunding</a></li>
					</ul>
				</li>
				
				<li><a href="{{ url('/dashboard/pendanaan')}}"> Pendanaan</a></li>
				<li><a href="{{ url('/dashboard/laporan')}}/{{ Auth::user()->id }}">Laporan</a></li>
				<li><a href="{{ url('/dashboard/pengaturan')}}">Pengaturan</a></li>
			</ul>
			<br/><br/><center><img src="{{URL::to('/')}}../images/logo_white.png "/></center>
		</nav>
		
		<br><br>
		<section class="content">
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Submit Pendanaan</h1>
					<h2>Submit Pendanaan yang dilakukan UMKM</h2>
				</hgroup>
			</header>
			<div class="content">
				<form action="{{ URL::to('createFundBank') }}" method="post" enctype="multipart/form-data" width="100">
					{!! csrf_field() !!}

					<input type="hidden" value="0" name="sementara_dana">
                    <input type="hidden" value="0" name="status">
                    <input type="hidden" name="tgl_transaksi" value="tgl_transaksi">

					<div class="field-wrap">
						<input type="text" name="nama_pj" placeholder="Nama Penanggung Jawab" />
					</div>
					<div class="field-wrap">
						<input type="text" name="nama_proyek" placeholder="Nama Proyek Pendanaan"/>
					</div>

					Bank : <br>
					<select name="id_bank">
			 			@foreach ($bankreports as $k => $v)
			 				<option value="{{ $k }}">{{ $v }}</option>
			 			@endforeach
			 		</select>
					<br><br>

					<div class="field-wrap">
						<input type="text" name="total_dana" placeholder="Total Dana Yang Dibutuhkan"/>
					</div>
					<button type="submit" class="green">Post</button>
				</form>
			</div>
		</section>
		</section>
				

@endsection
