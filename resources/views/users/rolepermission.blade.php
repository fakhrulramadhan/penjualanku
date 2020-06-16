@extends('layouts.induk')

@section('judul')
	<title>Role Permission</title>
@endsection

@section('css')
	<style type="text/css">
		.tab-pane{
			height: 150px;
			overflow-y: scroll;
		}
	</style>
@endsection

@section('content')
	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-3">
					<div class="col-sm-5">
						<h2 class="m-0 text-info">Role Permission</h2>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
							<li class="breadcrumb-item active">Role Permission</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4">
						@slot('judul')
						    <h5 class="card-title">Tambah Role Izin Baru</h5>
						@endslot

						<form action="{{ route('user.add_permission') }}" method="post">
							@csrf
							<div class="form-group">
								<label for="">Permission Name</label> 
								<input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required>
								<p class="text-danger">{{ $errors->first('name') }}</p>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-info btn-sm">Tambah Data</button>
							</div>
						</form>

						@slot('footer')
						    
						@endslot
					</div>

					<div class="col-md-8">
						@slot('judul')
						  Set Izin Untuk Role  
						@endslot

						@include('alert')
						
						{{-- mengecek / memfilter data untuk mengecek apakah nama rolenya tersedia  --}}

						<form action="{{ route('user.role_permission') }}" method="GET">
							<div class="form-group">
								<label for="">Roles</label>
								<div class="input-group">
									<select name="role" class="form-control">
										@foreach ($roles as $r)
											<option value="{{ $r }}" {{ request()->get('role') == $r ? 'selected' : '' }}> {{ $r }}</option>
										@endforeach
									</select>
									<span class="input-group-btn">
										<button class="btn btn-info">Cek</button>
									</span>
								</div>
							</div>
						</form>
						
					{{-- JIka Permission tidak bernilai kosong --}}

					@if (!empty($permissions))
						<form action="{{ route('user.set_role_permission', request()->get('role')) }}" method="post">
							@csrf
							<input type="hidden" name="_method" value="PUT">

							<div class="form-group">
								<div class="nav-tabs-custom">
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="#tab1" data-toggle="tab">Permission</a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tab1">
											@php
												$no = 1;
											@endphp

											@foreach ($permissions as $kunci => $pe)
												<input type="checkbox" name="permission[]" class="minimal-red" value="{{ $pe }}" {{-- CEK, JIKA PERMISSION TERSEBUT  SUDAH DI SET, MAKA CHECKED --}} {{ in_array($pe, $haspermission) ? 'checked' : '' }}> {{ $pe }}
												<br>

												{{-- jika hasil sisa bagi 4 dari variabel no adalah nol maka enter --}}
												@if ($no++%4 == 0)
													<br>
												@endif
											@endforeach
										</div>
									</div>
								</div>

								<div class="pull-right">
									<button class="btn btn-info btn-sm">
										<i class="fa fa-send"></i> Set Permission
									</button>
								</div>
							</div>
						</form>
					@endif

					@slot('footer')
					    
					@endslot
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection





