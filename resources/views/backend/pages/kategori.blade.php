@extends('backend.backend')

@section('title', 'Kategori')

@section('content')
    <br>
    <div class="row">

        <div class="col-11 mx-auto">
            <span class="h5">Kategori & Badge</span>
        </div>
        <div class="col-11 mx-auto">
            <div class="row">
                <div class="col-lg-6 py-4">
                    <div class="card p-4">
                        <button type="button" class="btn btn-outline-secondary mb-4" data-toggle="modal"
                            data-target="#tambah_kategori">
                            Buat Kategori
                        </button>
                        <div class="table-responsive">
                            <table id="example" class="table table-sm table-striped table-bordered bg-light mt-3"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($kategories as $kategori)
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>{{ $kategori->kategori }}</td>
                                            <td>
                                                <center>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary" type="button"
                                                            id="dropdownMenuButton" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <!-- Edit Button -->
                                                            <button type="button" class="dropdown-item" data-toggle="modal"
                                                                data-target="#editKategoriModal-{{ $kategori->id }}">
                                                                <i class="fas fa-edit"></i> Ubah
                                                            </button>
                                                            <!-- Delete Form -->
                                                            <form action="{{ route('kategori.destroy', $kategori->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item"
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </center>

                                                @include('backend.modals.kategoriBadge.editKat')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- The Modal -->
                    <div class="modal fade" id="tambah_kategori">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Kategori</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form method="post" action="{{ route('kategori.store') }}" class="px-3">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label small">Kategori*</label>
                                            <input type="kategori" name="kategori"
                                                class="form-control @error('kategori') is-invalid @enderror" required
                                                id="kategori" value="{{ old('kategori') }}">
                                            @error('kategori')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary text-white">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 py-4">
                    <div class="card p-4">
                        <button type="button" class="btn btn-outline-secondary mb-4" data-toggle="modal"
                            data-target="#tambah_badge">
                            Buat Badge
                        </button>
                        <div class="table-responsive">
                            <table id="examples" class="table table-sm table-striped table-bordered mt-3"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Badge</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($badges as $badge)
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>{{ $badge->badge }}</td>
                                            <td>
                                                <center>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary" type="button"
                                                            id="dropdownMenuButton" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <!-- Edit Button -->
                                                            <button type="button" class="dropdown-item" data-toggle="modal"
                                                                data-target="#editBadgeModal-{{ $badge->id }}">
                                                                <i class="fas fa-edit"></i> Ubah
                                                            </button>
                                                            <!-- Delete Form -->
                                                            <form action="{{ route('badge.destroy', $badge->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item"
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus badge ini?')">
                                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </center>

                                                @include('backend.modals.kategoriBadge.editBad')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Badge</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- The Modal -->
                    <div class="modal fade" id="tambah_badge">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Badge</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form method="post" action="{{ route('badge.store') }}" class="px-3">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="badge" class="form-label small">Badge*</label>
                                            <input type="badge" name="badge"
                                                class="form-control @error('badge') is-invalid @enderror" required
                                                id="badge" value="{{ old('badge') }}">
                                            @error('badge')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary text-white">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
