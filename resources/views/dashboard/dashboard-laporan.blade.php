@extends('layouts.dashboard')

	@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@else
	<nav>
		<ul>
			<li><a href="{{ url('/dashboard/home')}}"><span class="icon">&#128711;</span> Dashboard</a></li>
			<li><a href="{{ url('/dashboard/pendanaan')}}/{{ Auth::user()->id }}"><span class="icon">&#127758;</span> Pendanaan</a></li>
			<li class="section"><a href="{{ url('/dashboard/laporan')}}/{{ Auth::user()->id }}"><span class="icon">&#128203;</span> Laporan</a></li>
			<li><a href="{{ url('/dashboard/pengaturan')}}"><span class="icon">&#9881;</span>Pengaturan</a></li>
		</ul>
		<br/><br/><center><img src="{{URL::to('/')}}../images/logo_white.png "/></center>
	</nav>

	<section class="content">
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Laporan</h1>
					<h2>Laporan UMKM Pendanaan ZISWAF Produktif</h2>
				</hgroup>
			</header>
			<div class="content">
				<table id="myTable" border="0" width="100">
					<thead>
						<tr>
							<th>Nama Proyek</th>
							<th>Nama Penanggung Jawab</th>
							<th>Deskripsi Laporan</th>
							<th>Waktu Laporan</th>
							<th>File Laporan</th>
						</tr>
					</thead>
						<tbody>
						@foreach($laporanpendanaan as $lpr)
							<tr>
								<td>{{$lpr->nama_proyek}}</td>
								<td>{{$lpr->nama_pj}}</td>
								<td>{{$lpr->deskripsi_laporan}}</td>
								<td>{{$lpr->waktu_laporan}}</td>
								<td><a href="{{$lpr->file_laporan}}">Download</a> </td>
							</tr>
						@endforeach
						</tbody>
					</table>
					<br/><?php echo $laporanpendanaan->render(); ?>
			</div>
		</section>
	</section>

	@endif
	
@endsection