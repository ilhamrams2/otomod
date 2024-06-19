@extends('BackEnd.backend')

@section('title', 'Profile')

@section('content')
    <div class="row pb-2" style="border-bottom: 2px solid #dadada">
        <div class="col-11 mx-auto py-4 d-flex justify-content-between align-items-center">
            <div class="title-page d-flex align-items-center">
                <span class="h5 m-0 p-0">Profile</span>
            </div>
        </div>
        <div class="col-10 mx-auto">
            <img class="img-fluid" src="{{ asset('storage/img-profile/banner.png') }}" alt=""
                style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <div class="col-12 px-3" style="margin-top: -20px;">
                <div class="row">
                    <div class="col-auto">
                        <img class="img-fluid bg-light img-rounded-circle"
                            src="{{ asset('storage/img-profile/' . $user->image) }}" alt=""
                            style="object-fit: cover; object-position: center; width: 90px; height: 90px; border-radius: 50%;">
                    </div>
                    <div class="col-6 my-auto">
                        <div class="h5 mb-0 text-capitalize font-weight-bold">{{ $user->name }} <span
                                class="h6 small"><i>{{ $user->role->role_name }}</i></span></div>
                        <div class="h5 mb-0 small">{{ $user->email }}</div>
                    </div>
                    <div class="col-auto ml-auto my-auto">
                        <button type="button" class="close text-dark mt-3" data-toggle="modal"
                            data-target="#modal-ubah-profile"><i class="fas fa-edit" style="font-size: 16px;"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-ubah-profile" tabindex="-1" role="dialog" aria-labelledby="label-ubah-profile"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header py-2">
                    <h5 class="modal-title">Ubah Profile</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                {{-- <div class="modal-body" style="max-height: 70vh; overflow-y: auto;"> --}}
                <div class="modal-body px-4" style="">
                    <form method="post" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="remove_image" id="remove_image" value="">

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-auto position-relative">
                                    <img class="img-fluid bg-light img-rounded-circle img-previews-profile"
                                        src="{{ asset('storage/img-profile/' . $user->image) }}" alt="Profile Image"
                                        style="object-fit: cover; object-position: center; width: 90px; height: 90px; border-radius: 50%;">
                                    <button type="button" class="btn btn-danger btn-sm btn-remove"
                                        style="position: absolute; top: 0; right: 0; display: none;"
                                        onclick="removeImage()">X</button>
                                </div>
                                <div class="col">
                                    <label for="image" class="form-label small">Profile Image*</label><br>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="file" id="image-profile" name="image"
                                                class="file-control @error('image') is-invalid @enderror"
                                                onchange="previewImage()">
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-auto ml-auto">
                                            <button type="button" class="btn btn-danger btn-sm" id="hapus-gambar-profile"
                                                onclick="removeProfile()">reset</button>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label small">Nama Lengkap*</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label small">Email*</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label small">Password baru*</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer py-1">
                    <button type="button" class="btn btn-secondary py-1" data-dismiss="modalss"><a
                            href="{{ route('profile') }}" class="text-white">Close</a></button>
                    <button type="submit" class="btn btn-primary text-white py-1">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
