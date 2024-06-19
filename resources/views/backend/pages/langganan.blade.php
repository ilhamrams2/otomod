@extends('BackEnd.backend')

@section('title', 'Langganan')

@section('content')
    <br>
    <div class="row">

        <div class="col-11 mx-auto mb-3">
            <span class="h5">Langganan</span>
        </div>

        <div class="col-lg-11 mx-auto p-4" style="background-color: #fff">
            <button type="button" class="btn btn-outline-info w-100 mb-3" data-toggle="modal" data-target="#modal-langganan">
                <i class="fas fa-plus-circle"></i> Buat Langganan
            </button>
            <div class="table-responsive" style="max-height: 500px; font-size: 14px;">
                <table id="example" class="table table-striped table-bordered bg-light mt-3 table-sm text-left"
                    style="">
                    <thead>
                        <tr>
                            <th class="align-middle">Image</th>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">VA</th>
                            <th class="align-middle">Created</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($langganans as $langganan)
                            <tr>
                                <td class="align-middle text-center">
                                    <!-- Mengatur gambar berada di tengah secara horizontal -->
                                    <img class="img-fluid bg-light img-rounded-circle"
                                        src="{{ asset('storage/img-profile/' . $langganan->user->image) }}" alt=""
                                        style="object-fit: cover; object-position: center; width: 40px; height: 40px; border-radius: 50%;">
                                </td>
                                <td class="align-middle">{{ $langganan->user->name }}</td>
                                <td class="align-middle">{{ $langganan->pembayaran->pembayaran }}</td>
                                <td class="align-middle">{{ $langganan->created_at }}</td>
                                <td class="text-center align-middle">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary" type="button" id="dropdownMenuButton"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu text-white" aria-labelledby="dropdownMenuButton">
                                            <!-- Delete Form -->
                                            <form action="{{ route('langganan.destroy', $langganan->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus langganan ini?')">
                                                    <i class="fas fa-trash-alt text-danger"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="align-middle">Image</th>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">VA</th>
                            <th class="align-middle">Created</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-langganan" tabindex="-1" role="dialog" aria-labelledby="label-langganan"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header py-2">
                    <h5 class="modal-title">Buat Langganan</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body px-4" style="">
                    <form method="post" action="{{ route('langganan.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="user_id" class="form-label small">Pengguna*</label>
                            <select type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') ? 'acticve' : '' }}>{{ $user->name }}</option>
                                @endforeach

                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pembayaran_id" class="form-label small">Metode Pembayaran*</label>
                            <select type="text" class="form-control @error('name') is-invalid @enderror" name="pembayaran_id" id="pembayaran_id" value="{{ old('pembayaran_id') }}">
                                @foreach ($pembayarans as $pembayaran)
                                    <option value="{{ $pembayaran->id }}">{{ $pembayaran->pembayaran }}</option>
                                @endforeach

                            </select>
                            @error('pembayaran_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_tlpn" class="form-label small">Nomor Telepon*</label>
                            <input type="text" maxlength="12" class="form-control @error('no_tlpn') is-invalid @enderror"
                                name="no_tlpn" id="no_tlpn" value="{{ old('no_tlpn') }}" oninput="validateLength(this)">
                            @error('no_tlpn')
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



    <script>
        function validateLength(input) {
            if (input.value.length > 12) {
                input.value = input.value.slice(0, 12);
            }
        }
    </script>
@endsection
