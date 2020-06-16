

@if (session('simpan'))
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
			<h4><i class="icon fa fa-info"></i>Info:</h4>
			{{ session('simpan') }}
	</div>
@endif



@if (session('ubah'))
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
			<h4><i class="icon fa fa-info"></i>Info:</h4>
			{{ session('ubah') }}
	</div>
@endif


@if (session('hapus'))
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
			<h4><i class="icon fa fa-info"></i>Info:</h4>
			{{ session('hapus') }}
	</div>
@endif

@if (session('error'))
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
			<h4><i class="icon fa fa-info"></i>Info:</h4>
			{{ session('error') }}
	</div>
@endif