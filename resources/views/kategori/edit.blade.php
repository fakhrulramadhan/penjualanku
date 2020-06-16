@extends('layouts.induk')

@section('judul')
	<title>Edit Kategori</title>
@endsection

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-5">
						<h2 class="m-0 text-dark">Edit Kategori</h2>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Beranda</a></li>
							<li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
							<li class="breadcrumb-item active">Edit</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
							@slot('judul')
							Edit Kategori
							@endslot

							@include('alert')

							<form role="form" action="{{ route('kategori.update', $kategori->id) }}" method="POST">
								@csrf								
								<input type="hidden" name="_method" value="PUT">
								<div class="form-group">
									<label for="nama_kategori">Kategori</label>
									<input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}" class="form-control {{ $errors->has('nama_kategori') ? ' is-invalid' : '' }}" id="nama_kategori" required>
								</div>
								<div class="form-group">
									<label for="deskripsi">Deskripsi</label>
									<textarea name="deskripsi" id="deskripsi" cols="5" rows="5" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}">{{ $kategori->deskripsi }}</textarea>
								</div>
								<div class="form-group">
									<button class="btn btn-info">Ubah</button>
								</div>

								@slot('footer')
								  
								@endslot
							</form>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection