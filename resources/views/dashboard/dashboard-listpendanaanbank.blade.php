@extends('layouts.dashboard')
@section('content')
		<nav>
			<ul>
				<li class="section"><a href="{{ url('/dashboard/daftarpenggalangan')}}"> Crowdfunding</a>
					<ul class="submenu">
					<li><a href="{{ url('/dashboard/daftarpenggalangan')}}">Daftar Penggalangan Dana</a></li>
					<li><a href="{{ url('/dashboard/listPenggalangan')}}">List Pendanaan UMKM</a></li>
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
					<h1>List Pendanaan</h1>
					<h2>Daftar Pendanaan yang dilakukan UMKM</h2>
				</hgroup>
			</header>
			<div class="content">
				
				<table id="myTable" border="0" >
					<thead><tr>
									<th>Penanggung Jawab</th>
									<th>Proyek Pendanaan</th>
									<th>Bank</th>
									<th>Dana Yang di Butuhkan</th>
									<th>Tanggal Pengajuan</th>
									<th>Status </th>
								</tr>
					</thead>
					<tbody>
						@foreach($detailDana as $pda)
						<tr>
							<td>{{$pda->nama_pj}}</td>
							<td>{{$pda->nama_proyek}}</td>
							<td>{{$pda->id_bank}}</td>
							<td>{{$pda->total_dana}}</td>
							<td>{{$pda->tgl_pendanaan}}</td>
							<td>{{$pda->status}}</td>							
						</tr>
						@endforeach
					</tbody>
				</table>
				
				<br><br>
				
			</div>
		</section>
		</section>	
@endsection