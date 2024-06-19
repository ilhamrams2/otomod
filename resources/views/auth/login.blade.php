@extends('frontend.main')
@section('title', $title)
@section('contents')

    <div class="row py-3">
        <div class="col-11 my-auto mx-auto px-0" style="box-shadow: 0px 4px 7.9px rgba(0, 0, 0, 0.25);">
            <div class="row">

                <div class="col-lg-6 d-none d-md-block" style="background: url('{{ asset('frontend/img/login-daftar/login.jpg') }}') no-repeat top center; background-size: cover; min-height: 490px;">

                </div>

                <div class="col-lg-5 mx-auto py-5 px-5 my-auto">
                    <center><span class="h5">Selamat Datang Kembali</span></center>
                    <form method="post" action="{{ route('login') }}" class="mt-4">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label small">Email*</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               required id="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label small">Password*</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"required id="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <span class="small">Sudah punya akun? <a href="{{ route('register') }}">Daftar</a></span>
                        </div>

                        <button type="submit" class="btn btn-warning w-100 text-white">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
