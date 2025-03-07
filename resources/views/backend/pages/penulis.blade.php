@extends('backend.backend')

@section('title', 'Penulis')

@section('content')
    <br>
    <div class="row">
        <div class="col-11 mx-auto">
            <span class="h5">Penulis</span>
        </div>
        <div class="col-lg-11 py-4 mx-auto">
            <div class="card p-4">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <button type="button" class="btn btn-outline-info w-100 mb-3" data-toggle="modal"
                    data-target="#modal-penulis">
                    <i class="fas fa-plus-circle"></i> Buat User Penulis
                </button>
                <div class="table-responsive" style="max-height: 500px; font-size: 14px;">
                    <table id="example" class="table table-striped table-bordered bg-light mt-3 table-sm text-left"
                        style="">
                        <thead>
                            <tr>
                                <th class="align-middle">Image</th>
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Created</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($allPenulis as $penulis)
                                <tr>
                                    <td class="align-middle text-center">
                                        <!-- Mengatur gambar berada di tengah secara horizontal -->
                                        <img class="img-fluid bg-light img-rounded-circle"
                                            src="{{ asset('storage/img-profile/' . $penulis->image) }}" alt=""
                                            style="object-fit: cover; object-position: center; width: 40px; height: 40px; border-radius: 50%;">
                                    </td>
                                    <td class="align-middle">{{ $penulis->name }}</td>
                                    <td class="align-middle">{{ $penulis->created_at }}</td>
                                    <td class="text-center align-middle">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary" type="button" id="dropdownMenuButton"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu text-white" aria-labelledby="dropdownMenuButton">
                                                <!-- Edit Button -->
                                                <button type="button" class="dropdown-item" data-toggle="modal"
                                                    data-target="#modal-editpenulis{{ $penulis->id }}">
                                                    <i class="fas fa-eye text-warning"></i> Ubah
                                                </button>
                                                <!-- Delete Form -->
                                                <form action="{{ route('penulis.destroy', $penulis->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus penulis ini?')">
                                                        <i class="fas fa-trash-alt text-danger"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('backend.modals.penulis.editPenulis')
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="align-middle">Image</th>
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Created</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>






    <div class="modal fade" id="modal-penulis" tabindex="-1" role="dialog" aria-labelledby="label-penulis"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header py-2">
                    <h5 class="modal-title">Buat User Penulis</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                {{-- <div class="modal-body" style="max-height: 70vh; overflow-y: auto;"> --}}
                <div class="modal-body px-4" style="">
                    <form method="post" action="{{ route('penulis.store') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="role_id" value="2">
                        <input type="hidden" name="status_id" value="2">

                        <div class="mb-3">
                            <label for="name" class="form-label small">Nama Lengkap*</label>
                            <input required type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" id="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label small">Email*</label>
                            <input required type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" id="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label small">Password*</label>
                            <input required type="password" class="form-control @error('password') is-invalid @enderror"
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
                    <button type="submit" class="btn btn-primary text-white py-1">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
