@extends('layouts.induk')

@section('judul')
    <title>Dasbor</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <h2 class="m-0 text-dark">Dasbor</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active">Dasbor</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Konten Inti -->
        <section class="content" id="ap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                             <h3>{{ $produk }}</h3>
                            <p>Produk</p>   
                            </div>
                            <div class="icon">
                                <i class="ion ion-clipboard"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                {{-- <h3>{{ $pesanan }}</h3> --}}
                                <p>Pesanan</p>
                            </div>
                            <div class="icon">
                                <i class="ion-android-cart"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                {{-- <h3> {{ $pelanggan }} </h3> --}}
                                <p>Pelanggan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                {{-- <h3>{{ $user }}</h3> --}}
                                <p>Karyawan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <canvas id="dw-chart"></canvas>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection