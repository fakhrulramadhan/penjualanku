@extends('layouts.induk')

@section('judul')
	<title>Kelola Data Pengguna</title>
@endsection

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-5">
						<h3 class="m-0 text-danger">Kelola Data Pengguna</h3>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
							<li class="breadcrumb-item active">Pengguna</li>
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
						  <a href="{{ route('user.create') }}" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i>Tambah User Baru</a>  
						@endslot
					</div>

					@include('alert')

					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<td>#</td>
									<td>Nama</td>
									<td>Email</td>
{{-- 									<td>Role</td>
 --}}									<td>Status</td>
									<td>Aksi</td>
								</tr>
							</thead>
							<tbody>
								@php
									$no = 1;
								@endphp

								@forelse ($user as $u)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ $u->name }}</td>
										<td>{{ $u->email }}</td>
										{{-- <td>
											@foreach ($u->getroleNames() as $rolename)
												<label for="" class="badge badge-info">{{ $rolename }}</label>
											@endforeach
										</td> --}}
										<td>
											{{-- Jika Statusnya True, Maka Statusnya Aktif. (sudah terbaca otomatis di $u->status) --}}
											@if ($u->status)
												<label class="badge badge-success">Aktif</label>
											 @else
											 	<label class="badge badge-success">Non Aktif</label>
											@endif
										</td>
										<td>
											<form action="{{ route('user.destroy', $u->id) }}" method="POST">
												@csrf
												<input type="hidden" name="_method" value="DELETE">
												<a href="{{ route('user.edit', $u->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-user-circle"></i></a>
												<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
											</form>
										</td>
									</tr>
								@empty
									<td colspan="6" class="text-center"> Tidak Ada Data</td>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection