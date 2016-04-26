@extends('layouts.administrator')

@section('content')
		
		<br><br>
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
					<thead>
						<tr>
							<th>Nama</th>
							<th>Nama Proyek</th>
							<th>Kategori</th>
							<th>Dana Sementara</th>
							<th>Total Dana</th>
							<th>Deskripsi</th>
							<th>Foto Proyek</th>
							<th>Foto PJ</th>
							<th>Tanggal Pendanaan</th>
							
						</tr>
					</thead>

					<tbody>
						@foreach($pendanaanadmin as $pda)
						<tr>
							<td><a href="#">Edit</a> | {{$pda->nama_pj}}</td>
							<td>{{$pda->nama_proyek}}</td>
							<td>{{$pda->kategori}}</td>
							<td>{{$pda->sementara_dana}}</td>
							<td>{{$pda->total_dana}}</td>
							<td><center><a href="{{$pda->deskripsi}}">Tampilkan</a></center></td>
							<td><center><a href="{{$pda->foto_proyek}}">Lihat</a></center></td>
							<td><center><a href="{{$pda->foto_pj}}">Lihat</a></center></td>
							<td>{{$pda->tgl_pendanaan}}</td>
							
						</tr>
						@endforeach
					</tbody>
				</table>
				
				<br><br>
				<?php echo $pendanaanadmin->render(); ?>

			</div>
		</section>
			
@endsection
