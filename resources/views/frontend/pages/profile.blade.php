@extends('frontend.main')

@section('title', $title)

@section('contents')

    <div class="row pb-2 profile-section" style="border-bottom: 2px solid #dadada">
        <div class="col-12 top-kat d-flex align-items-center py-4">
            <div class="kategori-merah"></div>
            <h4 class="text-uppercase ps-2 m-0">Profile</h4>
        </div>
        <div class="col-11 mx-auto">
            <img class="img-fluid" src="{{ asset('storage/img-profile/banner.png') }}" alt=""
                style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <div class="col-12 px-3" style="margin-top: -30px;">
                <div class="row">
                    <div class="col-auto py-0 pe-0">
                        <img class="img-fluid bg-light img-rounded-circle"
                            src="{{ asset('storage/img-profile/' . $user->image) }}" alt=""
                            style="object-fit: cover; object-position: center; width: 90px; height: 90px; border-radius: 50%;">
                    </div>
                    <div class="col-auto nama-profile" style="margin-top: 38px">
                        <div class="h5 mb-0 text-capitalize font-weight-bold">{{ $user->name }}
                            @if ($user->status->id == 2 && $user->role->id == 2)
                                <span><i class="fas fa-pen-alt text-warning px-2 small"></i></span>
                            @elseif ($user->status->id == 2 && $user->role->id == 3)
                                <span><i class="fas fa-crown text-warning"></i></span>
                            @endif
                        </div>
                        <div class="mb-0 small" style="font-weight: 200;">{{ $user->email }}</div>
                    </div>
                    <div class="col-auto ms-auto p-0" style="margin-top: 48px;">
                        <button type="button" class="btn p-0 border-0 bg-transparent" data-bs-toggle="modal"
                            data-bs-target="#modal-ubah-profile">
                            <i class="fas fa-edit" style="font-size: 20px;"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>




    @if ($user->status->id == 2 && $user->role->id == 3)
        @include('frontend.profile-section.userPremium')
    @elseif ($user->status->id == 1 && $user->role->id == 3)
        @include('frontend.profile-section.userReguler')
    @elseif ($user->role->id == 2)
        @include('frontend.profile-section.penulis')
    @endif




    <div class="modal fade" id="modal-ubah-profile" tabindex="-1" aria-labelledby="label-ubah-profile" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header py-2">
                    <h5 class="modal-title">Ubah Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body px-4">
                    <form method="post" action="{{ route('profile.update.front', $user->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="remove_image" id="remove_image" value="">

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-auto position-relative">
                                    <img class="img-fluid bg-light img-rounded-circle img-previews-profile"
                                        src="{{ asset('storage/img-profile/' . $user->image) }}" alt="Profile Image"
                                        style="object-fit: cover; object-position: center; width: 90px; height: 90px; border-radius: 50%;">
                                    <button type="button" class="btn-close btn-remove btn btn-danger"
                                        style="position: absolute; top: 0; right: 0; display: none;"
                                        onclick="removeImage()"></button>
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
                                        <div class="col-auto ms-auto">
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
                    <a href="{{ route('profile.view') }}"><button type="button" class="btn btn-secondary py-1"
                            data-bs-dismiss="modal">Close</button></a>
                    <button type="submit" class="btn btn-primary text-white py-1">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
