@extends('layouts.administrator')

@section('content')
		
		<br><br>
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Submit Pendanaan</h1>
					<h2>Submit Pendanaan yang dilakukan UMKM</h2>
				</hgroup>
			</header>
			<div class="content">
				<form action="/" method="post" enctype="multipart/form-data">
					{!! csrf_field() !!}
					<input type="hidden" value="0" name="sementara_dana">
                    <input type="hidden" value="0" name="statuspendanaan">

					<div class="field-wrap">
						<input type="text" value="nama_penanggung_jawab" placeholder="Nama Penanggung Jawab" />
					</div>

					Upload Foto Penanggung Jawab : <br>
					<input type="file" name="filepj" id="filepj">

					<div class="field-wrap">
						<input type="text" value="nama_proyek" placeholder="Nama Proyek Pendanaan"/>
					</div>

					Upload Foto Proyek : <br>
					<input type="file" name="fileproyek" id="fileproyek">
					
					Kategori : 
					<select name="kategori">
					    <option value="Zakat">Zakat</option>
					    <option value="Infaq">Infaq</option>
					    <option value="Sadaqah">Sadaqah</option>
					    <option value="Waqaf">Waqaf</option>
					</select>
					<br><br>

					<div class="field-wrap">
						<input type="text" value="total_dana" placeholder="Total Dana Yang Dibutuhkan"/>
					</div>
					
					<div class="field-wrap wysiwyg-wrap">
						<textarea class="post" rows="5"></textarea>
					</div>

					<button type="submit" class="green">Post</button>
				</form>
			</div>
		</section>
			
@endsection
