@extends('layouts.authinduk')

@section('judul')
    <title>Masuk Akun</title>
@endsection

@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Masuk Untuk Akses</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf


                @include('alert')

                <div class="form-group has-feedback">
                    <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}">
                    <span class="fa fa-enveope-o form-control-feedback">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}">
                    <span class="fa fa-lock form-control-feedback">{{ $errors->first('password') }}</span>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="checkbox iCheck">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Ingat Saya') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-arrow-right"></i> Masuk</button>
                    </div>
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-info">
                    <i class="fa fa-facebook mr-2"></i> Masuk Dengan Facebook
                </a>
                <a href="#" class="btn btn-block btn-warning">
                    <i class="fa fa-google-plus mr-2">Masuk Dengan Google+</i>
                </a>
            </div>

            <p class="mb-1">
                <a href="#">Saya Lupa Password</a>
            </p>
            <p class="mb-0">
                <a href="#" class="text-center">Register Anggota Baru</a>
            </p>
        </div>
    </div>
@endsection
