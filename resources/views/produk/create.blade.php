@extends('layouts.induk')

@section('judul')
	<title>Tambah Data Produk</title>
@endsection

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-5">
						<h2 class="m-0 text-success">Tambah Data</h2>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Beranda</a></li>
							<li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
							<li class="breadcrumb-item active">Tambah</li>
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

						@if (session('error'))
						    @alert(['type' => 'danger'])
						        {{ session('error') }}
						    @endalert
						@endif
						@include('alert')

						<form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							
							<div class="form-group">
								<label for="">Kode Produk</label>
								<input type="text" name="kode_produk" required maxlength="12" class="form-control {{ $errors->has('kode_produk') ? ' is-invalid' : '' }}">
								<p class="text-danger">{{ $errors->first('kode_produk') }}</p>
							</div>
							<div class="form-group">
								<label for="">Nama Produk</label>
								<input type="text" name="nama_produk" class="form-control {{ $errors->has('nama_produk') ? ' is-invalid' : '' }}" required >
								<p class="text-danger">{{ $errors->first('nama_produk') }}</p>
							</div>
							<div class="form-group">
								<label for="">Deskripsi</label>
								<input type="text" name="deskripsi" class="form-control {{ $errors->has('deskripsi') ? ' is-invalid' : '' }}">
								<p class="text-danger">{{ $errors->first('deskripsi') }}</p>
							</div>
							<div class="form-group">
								<label for="">Stok</label>
								<input type="text" name="stok" class="form-control {{ $errors->has('stok') ? ' is-invalid' : '' }}">
								<p class="text-danger">{{ $errors->first('stok') }}</p>
							</div>
							<div class="form-group">
								<label for="">Harga</label>
								<input type="text" name="harga" class="form-control {{ $errors->first('harga') ? ' is-invalid' : '' }}">
							</div>
							<div class="form-group">
								<label for="">Kategori</label>
								<select name="kategori_id" id="kategori_id" required class="form-control {{ $errors->first('kategori_id') ? ' is-invalid' : '' }}">
									<option value="">Pilih</option>
									@foreach ($kategori as $kat)
										<option value="{{ $kat->id }}">{{ ucfirst($kat->nama_kategori) }}</option>
									@endforeach
									<p class="text-danger">{{ $errors->first('kategori_id') }}</p>
								</select>
							</div>
							<div class="form-group">
								<label for="">Foto</label>
								<input type="file" name="foto" class="form-control">
								<p class="text-danger">{{ $errors->first('foto') }}</p>
							</div>
							<div class="form-group">
								<button class="btn btn-primary btn-sm">
									<i class="fa fa-send"></i> Simpan Data
								</button>
							</div>
						</form>

						@slot('footer')
						    
						@endslot
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection