@extends('BackEnd.backend')

@section('title', 'Berita')

@section('content')
    <br>
    <div class="row">
        <div class="col-11 mx-auto">
            <span class="h5">Berita</span>
        </div>
        <div class="col-lg-11 py-4 mx-auto">
            <div class="card p-4">
                <button type="button" class="btn btn-outline-primary mb-4" data-toggle="modal" data-target="#tambah_berita">
                    <i class="fas fa-plus-circle"></i> Buat Berita
                </button>
                <div class="table-responsive" style="max-height: 500px; font-size: 14px;">
                    <table id="example"
                        class="table table-striped table-bordered bg-light mt-3 table-sm text-left"style="">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Badge</th>
                                <th>Status</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($beritas as $berita)
                                <tr>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary" type="button" id="dropdownMenuButton"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu text-white" aria-labelledby="dropdownMenuButton">
                                                <!-- Edit Button -->
                                                <a href="{{ route('berita.detail', $berita->id) }}">
                                                    <button type="button" class="dropdown-item" data-toggle="modal"
                                                        data-target="#editKategoriModal-">
                                                        <i class="fas fa-eye text-warning"></i> Lihat
                                                    </button>
                                                </a>
                                                <!-- Delete Form -->
                                                <form action="{{ route('berita.destroy', $berita->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus Berita ini?')">
                                                        <i class="fas fa-trash-alt text-danger"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                        {{-- @include('backend.modals.kategoriBadge.editKat') --}}
                                    </td>
                                    <td>
                                        <img class="img-fluid" src="{{ asset('storage/' . $berita->gambar) }}"
                                            alt="" width="100">
                                    </td>
                                    <td><a href="{{ route('berita.detail', $berita->id) }}">{{ $berita->judul }}</a></td>
                                    <td>{{ $berita->kategori->kategori }}</td>
                                    <td>{{ $berita->user->name }}</td>
                                    <td>{{ $berita->badge->badge }}</td>
                                    <td>{{ $berita->status->status_name }}</td>
                                    <td>{{ $berita->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Action</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Badge</th>
                                <th>Status</th>
                                <th>Created</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- The Modal -->
            <div class="modal fade" id="tambah_berita">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header py-2">
                            <h5 class="modal-title">Buat Berita</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                            <form method="post" action="{{ route('berita.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label small">Kategori*</label>
                                            <select name="kategori" id="kategori"
                                                class="form-control @error('kategori') is-invalid @enderror">
                                                @foreach ($kategories as $kategori)
                                                    <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="status" class="form-label small">Status*</label>
                                            <select name="status" id="status"
                                                class="form-control @error('status') is-invalid @enderror">
                                                @foreach ($statues as $status)
                                                    <option value="{{ $status->id }}">{{ $status->status_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="badge" class="form-label small">Badge*</label>
                                            <select name="badge" id="badge"
                                                class="form-control @error('badge') is-invalid @enderror">
                                                @foreach ($badges as $badge)
                                                    <option value="{{ $badge->id }}">{{ $badge->badge }}</option>
                                                @endforeach
                                            </select>
                                            @error('badge')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="gambar" class="form-label small">Gambar*</label>
                                            <input type="file" name="gambar" id="gambar"
                                                class="form-control-file @error('gambar') is-invalid @enderror"
                                                onchange="previewImage()">
                                            @error('gambar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3 col-5">
                                            <img class="img-preview img-fluid" alt="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="judul" class="form-label small">Judul*</label>
                                            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required
                                                class="form-control @error('judul') is-invalid @enderror">
                                            @error('judul')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="artikel" class="form-label small">Artikel*</label>
                                            <textarea name="artikel" id="editor" rows="10" class="form-control @error('artikel') is-invalid @enderror">{{ old('artikel') }}</textarea>
                                            @error('artikel')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
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

    <script>
        function previewImage() {
            const image = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0])

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

@endsection
