@extends('layouts.induk')

@section('judul')
	<title>Manajemen Role</title>
@endsection

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-5">
						<h1 class="m-0 text-info">Kelola Data ROle</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
							<li class="breadcrumb-item active">Role</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">
						@slot('judul')
						    Tambah Role
						@endslot

						@if (session('error'))
							@alert(['type' => 'danger'])
								{!! session('error') !!}
							@endalert
						@endif


						<form role="form" action="{{ route('role.store') }}" method="POST">
							@csrf
							<div class="form-group">
								<label for="name">Nama Role</label>
								<input type="text" name="name" class="form-control {{ $errors->has('name') }}" id="name" required>
							</div>
							<div class="form-group">
								<button class="btn btn-info">Simpan</button>
							</div>
						</form>
					</div>
					<div class="col-md-9">
						
						@include('alert')

						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<td>#</td>
										<td>Role</td>
										<td>Guard</td>
										<td>Created At</td>
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody>
									@php
										$no = 1;
									@endphp
									@forelse ($role as $r)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $r->name }}</td>
											<td>{{ $r->guard_name }}</td>
											<td>{{ $r->created_at }}</td>
											<td>
												<form action="{{ route('role.destroy', $r->id) }}" method="POST">
													@csrf
													<input type="hidden" name="_method" value="DELETE">
													<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
												</form>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="5" class="text-center">Tidak Ada Data</td>
										</tr>
									@endforelse
								</tbody>
							</table>
						</div>

						<div class="float-right">
							{!! $role->links() !!}
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection