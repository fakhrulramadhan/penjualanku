@extends('layouts.induk')

@section('judul')
	<title>Edit Data Produk</title>
@endsection

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-5">
						<h2 class="m-0 text-info">Edit Data</h2>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Beranda</a></li>
							<li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
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

						@if (session('error'))
						    @alert(['type' => 'danger'])
						        {{ session('error') }}
						    @endalert
						@endif
						@include('alert')

						<form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="_method" id="_method" value="PUT">
							<div class="form-group">
								<label for="">Kode Produk</label>
								<input type="text" name="kode_produk" required class="form-control {{ $errors->has('kode_produk') ? ' is-invalid' : '' }}" value="{{ $produk->kode_produk}}" readonly>
								<p class="text-danger">{{ $errors->first('kode_produk') }}</p>
							</div>
							<div class="form-group">
								<label for="">Nama Produk</label>
								<input type="text" name="nama_produk" required class="form-control {{ $errors->has('nama_produk') ? ' is-invalid' : '' }}" value="{{ $produk->nama_produk }}" >
								<p class="text-danger">{{ $errors->first('nama_produk') }}</p>
							</div>
							<div class="form-group">
								<label for="">Deskripsi</label>
								<input type="text" name="deskripsi" required class="form-control {{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" value="{{ $produk->deskripsi }}" >
								<p class="text-danger">{{ $errors->first('deskripsi') }}</p>
							</div>
							<div class="form-group">
								<label for="">Stok</label>
								<input type="text" name="stok" required class="form-control {{ $errors->has('stok') ? ' is-invalid' : '' }}" value="{{ $produk->stok }}" >
								<p class="text-danger">{{ $errors->first('stok') }}</p>
							</div>
							<div class="form-group">
								<label for="">Harga</label>
								<input type="text" name="harga" required class="form-control {{ $errors->has('harga') ? ' is-invalid' : '' }}" value="{{ $produk->harga }}">
								<p class="text-danger">{{ $errors->first('harga') }}</p>
							</div>
							<div class="form-group">
								<label for="">Kategori</label>
								<select name="kategori_id" id="kategori_id" class="form-control {{ $errors->has('kategori_id') ? ' is-invalid' : '' }}" required>
									<option value="">-- Pilih --</option>
									@foreach ($kategori as $kat)
										<option value="{{ $kat->id }}">{{ ucfirst($kat->nama_kategori) }}</option>
									@endforeach
									<p class="text-danger">{{ $errors->first('kategori_id') }}</p>
								</select>
							</div>
							<div class="form-group">
								<label for="">Foto</label>
								<input type="file" name="foto" id="foto" class="form-control">
								<p class="text-danger">{{ $errors->first('foto') }}</p>
								@if (!empty($produk->foto))
									<hr>
									<img src="{{ asset('unggah/produk/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}" width="120px" height="120px">
								@endif
							</div>
							<div class="form-group">
								<button class="btn btn-warning btn-sm"><i class="fa fa-save"></i>Ubah Data</button>
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