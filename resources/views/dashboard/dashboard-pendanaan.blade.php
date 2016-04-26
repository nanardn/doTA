@extends('layouts.dashboard')

@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@else
	<nav>
		<ul>
			<li><a href="{{ url('/dashboard/home')}}"><span class="icon">&#128711;</span> Dashboard</a></li>
			<li class="section"><a href="{{ url('/dashboard/pendanaan')}}/{{ Auth::user()->id }}"><span class="icon">&#127758;</span> Pendanaan</a></li>
			<li ><a href="{{ url('/dashboard/laporan')}}/{{ Auth::user()->id }}"><span class="icon">&#128203;</span> Laporan</a></li>
			<li><a href="{{ url('/dashboard/pengaturan')}}"><span class="icon">&#9881;</span>Pengaturan</a></li>
		</ul>
		<br/><br/><center><img src="{{URL::to('/')}}../images/logo_white.png "/></center>
	</nav>

	<section class="content">
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Pendanaan</h1>
					<h2>Laporan Pendanaan Yang Anda Lakukan</h2>
				</hgroup>
			</header>
			<div class="content">
				<table id="myTable" border="0" width="100">
					<thead>
						<tr>
							<th>Judul Pendanaan</th>
							<th>Jenis Pendanaan</th>
							<th>Nominal Pendanaan</th>
							<th>Tanggal</th>
							<th>Upload Bukti</th>
							<th></th>
							<th>Status</th>
						</tr>
					</thead>

						<tbody>
						@foreach($pendanaantransaksi as $pdt)
							<tr>
								<td>{{$pdt->nama_proyek}}</td>
								<td>{{$pdt->kategori}}</td>
								<td>{{$pdt->nominal}}</td>
								<td>{{$pdt->tanggal_transaksi}}</td>
								<td>
									<form action="{{ URL::to('uploadbukti') }}" method="post" enctype="multipart/form-data">
                                        {!! csrf_field() !!}
                                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                        <input type="hidden" value="{{$pdt->id_transaksi}}" name="id_transaksiDonasi">
                                        <input type="file" name="file" id="file">
                                </td><td>
                                        <button type="submit" value="Upload" name="submit" class="button-normal full blue">
                                            <i class="fa fa-btn fa-user"></i>Upload
                                        </button>
                                    </form>
								</td>
								<td>
									<?php 
										$statuspending = "0";
										$statusberhasil = "1";
										$statusgagal = "2";

										if ($pdt->status == $statusberhasil) {
											echo "<button class='green'>Sukses</button>";
										} else if ($pdt->status == $statuspending) {
											echo "<button class='orange'>Pending</button>";
										} else {
											echo "<button class='red'>Gagal</button>";
										}
									?>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					<br/><?php echo $pendanaantransaksi->render(); ?>
			</div>
		</section>
	</section>

	@endif
	
@endsection

