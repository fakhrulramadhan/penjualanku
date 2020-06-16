@extends('layouts.induk')

@section('judul')
	<title>Tambah Pengguna Baru</title>
@endsection

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-5">
						<h3 class="m-0 text-success">Tambah Pengguna Baru</h3>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
							<li class="breadcrumb-item"><a href="{{ route('user.index') }}">Pengguna</a></li>
							<li class="breadcrumb-item active">Tambah Pengguna Baru</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

		<section class="content">
			<div class="container-fluid">
				<div class="row">
					@slot('judul')
					    
					@endslot

					@include('alert')

					<form action="{{ route('user.store') }}" method="post">
						@csrf
						<div class="form-group">
							<label for="">Nama</label>
							<input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required>
							<p class="text-danger">{{ $errors->first('name') }}</p>
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''  }}" required>
							<p class="text-danger">{{ $errors->first('email') }}</p>
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
							<p class="text-danger">{{ $errors->first('password') }}</p>
						</div>
						<div class="form-group">
							<label for="">Role</label>
							<select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}">
								<option value="">-- Pilih --</option>
								@foreach ($role as $r)
									<option value="{{ $r->name }}">{{ $r->name }}</option>
								@endforeach
							</select>
							<p class="text-danger">{{ $errors->first('role') }}</p>

						</div>
						<div class="form-group">
							<button class="btn btn-info btn-sm">
								<i class="fa fa-send">Simpan</i>
							</button>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
@endsection