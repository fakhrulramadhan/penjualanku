@extends('layouts.induk')

@section('judul')
	<title>Manajemen Produk</title>
@endsection

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Kelola Data Produk</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Beranda</a></li>
							<li class="breadcrumb-item active">Produk</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

		<section class="content" id="penjualan">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						
						   <a href="{{ route('produk.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-square-o"></i> Tambah</a>

						   <br>
						   <br>
						
						@if (session('error'))
						    @alert(['type' => 'danger'])
						        {{ session('error') }}
						    @endalert
						@endif
						@include('alert')

						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Foto</th>
										<th>Nama Produk</th>
										<th>Stok</th>
										<th>Harga</th>
										<th>Kategori</th>
										<th>Update Terakhir</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($produk as $p)
										<tr>
											<td>@if (!empty($p->foto))
												<img src="{{ asset('unggah/produk/'.$p->foto) }}" alt="{{ $p->nama_produk }}" width="55px" height="55px">
												@else
												<img src="{{ asset('img/tidakadaproduk.jpg') }}" alt="{{ $p->nama_produk }}">
											@endif</td>
											<td>
												<sup class="label label-success">{{ $p->kode_produk }}</sup>
												<strong>{{ ucfirst($p->nama_produk) }}</strong>
											</td>
											<td>{{ $p->stok }}</td>
											<td>{{ number_format($p->harga) }}</td>
											<td>{{ $p->kategori->nama_kategori }}</td>
											<td>{{ $p->updated_at }}</td>
											<td>
												<form action="{{ route('produk.destroy', $p->id) }}" method="POST">
													@csrf
													<input type="hidden" name="_method" value="DELETE">
													<a href="{{ route('produk.edit', $p->id) }}" class="btn btn-warning btn-sm">
														<i class="fa fa-edit"></i>
													</a>
													<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
												</form>
											</td>
										</tr>
									@empty
										
										<tr>
											<td colspan="7" class="text-center">Tidak Ada Data</td>
										</tr>
									@endforelse
								</tbody>
							</table>
						</div>
						<div class="float-right">
							{!! $produk->links() !!}
						</div>

						@slot('footer')
						    
						@endslot
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection