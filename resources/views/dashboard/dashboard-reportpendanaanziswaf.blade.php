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
<!--grafik-->
	<section class="content">
 		<select name="year">
 			@foreach ($years as $year)
 				<option value="{{ $year }}">{{ $year }}</option>
 			@endforeach
 		</select>
 
 		<select name="campaign">
 			@foreach ($campaigns as $k => $v)
 				<option value="{{ $k }}">{{ $v }}</option>
 			@endforeach
 		</select>
 
 		<br/>

 
 		<div id="chart"></div>
 	</section>



 	<section class="content">
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Buat Laporan Baru</h1>
					
				</hgroup>
			</header>
			<div class="content">
				<table id="myTable" border="0" >
			<div class="content" width="100">
				<form action="{{ URL::to('createLaporanZiswaf') }}" method="post" enctype="multipart/form-data">
					{!! csrf_field() !!}
                    Nama Proyek 	:
					<select name="id_pendanaan_ziswaf">
			 			@foreach ($campaigns as $k => $v)
			 				<option value="{{ $k }}">{{ $v }}</option>
			 			@endforeach
			 		</select>
			 		<br/> <br/> <br/>
			 		Bulan 		:
			 		<select name="bulan">
					    <option value="1">Januari</option>
					    <option value="2">Februari</option>
					    <option value="3">Maret</option>
					    <option value="4">April</option>
					    <option value="5">Mei</option>
					    <option value="6">Juni</option>
					    <option value="7">Juli</option>
					    <option value="8">Agustus</option>
					    <option value="9">September</option>
					    <option value="10">Oktober</option>
					    <option value="11">November</option>
					    <option value="12">Desember</option>
					</select>
					<br><br><br/>
					Tahun 		:
					
					<select name="tahun">
			 			@foreach ($years as $year)
			 				<option value="{{ $year }}">{{ $year }}</option>
			 			@endforeach
			 		</select>
					<br/> <br>
					<button type="submit" class="green">Post</button>
					
				</form>

			</div>		
			</table>
					
			</div>
		</section>
	</section>

		<section class="content">
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Pendanaan</h1>
					<h2>Laporan Penggunaan Dana Penggalangan</h2>
				</hgroup>
			</header>
			<div class="content">
			
				<table id="myTable" border="0" width="100">
					<thead>
						<tr>
							<th>Nama Pendanaan</th>
							<th>Bulan</t>
							<th>Tahun</th>
							<th>Total Pengeluaran</th>
							<th>Total Pemasukan </th>
							<th>Saldo Proyek</th>
							<th>Action</th>
						</tr>
					</thead>
						<tbody>
						@foreach($reportZiswaf as $rc)
						<tr>
							<td>{{$rc->nama_pendanaan}}</td>
							<td>{{date('F', mktime(0, 0, 0, $rc->bulan, 10))}}</td>
							<td>{{$rc->tahun}}</td>
							<td>{{$rc->total_pengeluaran}}</td>
							<td>{{$rc->total_pemasukan}}</td>
							<td>{{$rc->saldo_usaha}}
							</td>
						
							<td><a href="{{ URL::to('/dashboard/detail_laporan_ziswaf/'.$rc->id_laporan_z)}}"><button>Lihat</button></a></td>
							
						</tr>
						@endforeach
						</tbody>
					</table>
					
			</div>
		</section>
	</section>

	@endif
	
@endsection
@push('scripts')
 
 	<script>
 
 		var chart = $('#chart');
 
 		chart.css({
 			height: 300,
 			width: '100%'
 		});
 
 		var chartOptions = {
 			lines: {
 				show: true
 			},
			points: {
 				show: true
 			},
 			xaxis: {
 				mode: 'time',
 				timeformat: '%b'
 			}
 		};
 
 		var campaignSelector = $('[name=campaign]');
 		campaignSelector.change(getReport);
 
 		var yearSelector = $('[name=year]');
 		yearSelector.change(getReport);
 		yearSelector.trigger('change');
 
 		function getReport() {
 			$.get('{{ url('api/ziswaf-report') }}', {
 				campaign: campaignSelector.val(),
 				year: yearSelector.val()
 			}).done(function (data) {
 			$.plot(chart, $.parseJSON(data), chartOptions);
 			});
 		}
 
 	</script>
 
 @endpush