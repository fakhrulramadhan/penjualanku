@extends('layouts.induk')

@section('judul')
	<title>Kelola Data Kategori</title>
@endsection

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-5">
						<h2 class="m-0 text-light">Menu Kategori</h2>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Beranda</a></li>
							<li class="breadcrumb-item active">Kategori</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-5">
							@slot('judul')
							    Tambah Kategori
							@endslot


							@if (session('error'))
							    @alert(['type' => 'danger'])
							        {{ session('error') }}
							    @endalert
							@endif
							@include('alert')
							


							<form role="form" action="{{ route('kategori.store') }}" method="POST">
								@csrf
								
								<div class="form-group">
									<label for="nama_kategori">Kategori</label>
									<input type="text" name="nama_kategori" class="form-control {{ $errors->has('nama_kategori') ? ' is-invalid' : '' }}" id="nama_kategori" required>
								</div>
								<div class="form-group">
									<label for="deskripsi">Deskripsi</label>
									<textarea name="deskripsi" id="deskripsi" cols="5" rows="5" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}"></textarea>
								</div>
								    <div class="form-group">
								    	<button class="btn btn-info">Simpan</button>
								    </div>
							</form>
                          
					</div>
					<div class="col-md-7">
							@slot('judul')
							Daftar Kategori
							@endslot
						

						@include('alert')

						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<td>No</td>
										<td>Kategori</td>
										<td>Deskripsi</td>
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody>
									@php
										$no = 1;
									@endphp

									@forelse ($kategori as $kat)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ $kat->nama_kategori }}</td>
										<td>{{ $kat->deskripsi }}</td>
										<td>
											<form action="{{ route('kategori.destroy', $kat->id) }}" method="POST">
												@csrf
												
												<input type="hidden" name="_method" value="DELETE">
												<a href="{{ route('kategori.edit', $kat->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
												<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
											</form>
										</td>
									</tr>
										
									@empty
										<tr>
											<td colspan="4" class="text-center">Tidak Ada Data..</td>
										</tr>
									@endforelse
								</tbody>
							</table>
						</div>

						@slot('footer')
						    
						@endslot
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection