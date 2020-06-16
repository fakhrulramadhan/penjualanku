@extends('layouts.induk')

@section('judul')
	<title>Edit Pengguna</title>
@endsection

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-5">
						<h3 class="m-0 text-warning">Edit Pengguna</h3>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
							<li class="breadcrumb-item"><a href="{{ route('user.index') }}">Pengguna</a></li>
							<li class="breadcrumb-item active">Edit</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						@slot('judul')
						    
						@endslot

						@include('alert')

						<form action="{{ route('user.update',$user->id) }}" method="post">
							@csrf
							<input type="hidden" name="_method" value="PUT">
							
							<div class="form-group">
								<label for="">Nama</label>
								<input type="text" name="name" value="{{ $user->name }}" class="form-control {{  $errors->has('name') ? 'is-invalid' : '' }}" required>
								<p class="text-danger">{{ $errors->first('name') }}</p>	
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" name="email" value="{{ $user->email }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" required readonly>
								<p class="text-danger">{{ $errors->first('email') }}</p>
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"> 
								<p class="text-danger">{{ $errors->first('password') }}</p>
								<p class="text-info">Jangan Diisi Apabila Tidak Ingin Mengganti Password</p>
							</div>
							<div class="form-group">
								<button class="btn btn-info btn-sm">
									<i class="fa fa-send">Ubah Data</i>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection