@extends('layouts.dashboard')

@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@else
	<nav>
		<ul>
			<li><a href="{{ url('/dashboard/home')}}"><span class="icon">&#128711;</span> Dashboard</a></li>
			<li><a href="{{ url('/dashboard/pendanaan')}}/{{ Auth::user()->id }}"><span class="icon">&#127758;</span> Pendanaan</a></li>
			<li><a href="{{ url('/dashboard/laporan')}}/{{ Auth::user()->id }}"><span class="icon">&#128203;</span> Laporan</a></li>
			<li class="section"><a href="{{ url('/dashboard/pengaturan')}}"><span class="icon">&#9881;</span>Pengaturan</a></li>
		</ul>
		<br/><br/><center><img src="{{URL::to('/')}}../images/logo_white.png "/></center>
	</nav>

	<section class="content">
		<div class="widget-container">
			<section class="widget small">
				<header>
					<span class="icon">&#59168;</span>
					<hgroup>
						<h1>Ganti Password</h1>
						<h2>Silahkan Ganti Password Anda Disini</h2>
					</hgroup>
				</header>
				<div class="content no-padding timeline">
					<div class="content">
						<div class="field-wrap">
							Password Lama : <br/><br/>
							<input type="password" value="passlama"/>
						</div>
						<div class="field-wrap">
							Password Baru : <br/><br/>
							<input type="password" value="passbaru"/>
						</div>
						<div class="field-wrap">
							Password Baru : <br/><br/>
							<input type="password" value="konfirmasipassbaru"/>
						</div>
							<button type="submit" class="green">Simpan</button>
					</div>
				</div>
			</section>
			
			<section class="widget small">
				<header> 
					<span class="icon">&#128362;</span>
					<hgroup>
						<h1>Ganti Foto Profile</h1>
						<h2>Disarankan Ukuran 200 x 200</h2>
					</hgroup>
				</header>
				<div class="content no-padding timeline">
					<div class="content">
						
						<div class="profile-img">
							<center><p><img src="{{URL::to('dashboard/images/fotoprofile')}}/{{ Auth::user()->url_foto }}" alt="" height="150" width="150" /></p></center>
						</div>

						<form action="{{ URL::to('uploadfoto') }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <input type="hidden" value="{{ Auth::user()->id }}" name="id_usergambar">

							<div class="field-wrap">
								<input type="file" name="filefoto" id="filefoto">
							</div>
							<button type="submit" value="Upload" name="submit" class="green">Update Foto</button>
						</form> 
					</div>
				</div>
			</section>
		</div>
	</section>

	@endif
		
@endsection

