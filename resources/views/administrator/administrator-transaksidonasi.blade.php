@extends('layouts.administrator')

@section('content')
		
		<br><br>
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Transaksi</h1>
					<h2>Daftar Transaksi yang dilakukan Investor</h2>
				</hgroup>
			</header>
			<div class="content">
				<table id="myTable" border="0" >
					<thead>
						<tr>
							<th>No Transaksi</th>
							<th>Nama Pendonasi</th>
							<th>Judul Pendanaan</th>
							<th>Kategori</th>
							<th>Nominal Donasi</th>
							<th>Tanggal Donasi</th>
							<th>Konfirmasi</th>
							<th>Edit Status</th>
							<th>Status</th>
						</tr>
					</thead>

					<tbody>
						@foreach($transaksipendanaan as $tpd)
						<tr>
							<td>{{$tpd->id_transaksi}}</td>
							<td>{{$tpd->name}}</td>
							<td>{{$tpd->nama_proyek}}</td>
							<td><center>{{$tpd->kategori}}</center></td>
							<td>{{$tpd->nominal}}</td>
							<td>{{$tpd->tanggal_transaksi}}</td>
							<td><?php 
									$statuskonfirmasi1 = $tpd->konfirmasi;
									$statuskonfirmasi2 = "belum";
									
									if ($statuskonfirmasi1 == $statuskonfirmasi2) {
										echo "Belum";
									} else {
										echo "<a target='_blank' href='../transaksi/".$statuskonfirmasi1."'><b><font color='green'>Download Bukti</font></b></a>";
									}
								?>
							</td>
							<td>
							<center>
								<form action="{{ URL::to('updatestatus') }}" method="post">
									{!! csrf_field() !!}
									<input type="hidden" value="{{ csrf_token() }}" name="_token">
									<input type="hidden" value="{{$tpd->id_transaksi}}" name="id_transaksiDonasi">
									<input type="hidden" value="{{$tpd->id_pendanaan}}" name="id_pendanaanDonasi">
									<input type="hidden" value="{{$tpd->nominal}}" name="nominal_pendanaanDonasi">
									
									  <select name="editstatus">
									    <option value="1">Sukses</option>
									    <option value="0">Pending</option>
									    <option value="2">Gagal</option>
									  </select>

								  <input type="submit" value="Update">
								</form>
							</center>
							</td>
							<td>
								<center>
									<?php 
										$statuspending = "0";
										$statusberhasil = "1";
										$statusgagal = "2";

										if ($tpd->status == $statusberhasil) {
											echo "<button class='green'>Sukses</button>";
										} else if ($tpd->status == $statuspending) {
											echo "<button class='orange'>Pending</button>";
										} else {
											echo "<button class='red'>Gagal</button>";
										}
									?>
								</center>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				<br><br>
				<?php echo $transaksipendanaan->render(); ?>
			</div>
		</section>
			
@endsection
