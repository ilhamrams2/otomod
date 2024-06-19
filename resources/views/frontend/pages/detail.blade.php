@extends('frontend.main')

@section('title', $title)

@section('contents')
    <div class="row">
        <div class="col-12 col-lg-8 mt-3">
            <div class="col-12 top-kat d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="kategori-merah"></div>
                    <h4 class="text-uppercase px-3 m-0">Detail</h4>
                </div>
                @if ($berita->user_id == Auth::id())
                    <div class="dropdown">
                        <button class="btn btn-primary" style="border: none !important;" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu text-white" aria-labelledby="dropdownMenuButton"
                            style="left: -130px !important">
                            <!-- Edit Button -->
                            <li>
                                <form action="{{ route('destroyFront', $berita->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus Berita ini?')">
                                        <i class="fas fa-trash-alt text-danger me-2"></i> Hapus
                                    </button>
                                </form>
                            </li>
                            <!-- Delete Form -->
                            <li><button type="button" class="btn btn-outline-warning dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#modal-berita">
                                    <i class="fas fa-edit me-2"></i> Ubah
                                </button>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-12 p-0 mt-3 pb-3">
                <div class="pb-3">
                    Ditulis : <span class="text-warning font-weight-bold">{{ $berita->user->name }}</span>
                </div>
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="" class="img-fluid" style="width: 100% !important;">
            </div>
            <div class="col-12">
                @if ($berita->status->id == 2)
                    <span class="badge crown text-white">
                        <i class="fas fa-crown text-warning"></i>
                    </span>
                @endif
                <span class="badge bg-danger">{{ $berita->badge->badge }}</span>
                <span class="badge bg-warning text-uppercase text-white">{{ $berita->kategori->kategori }}</span>
                <span class="badge bg-primary text-uppercase text-white">{{ $berita->created_at->format('d-m-Y') }}</span>
            </div>
            <h2 class="text-uppercase text-warning pt-4 m-0">{{ $berita->judul }}</h2>
            <div class="col-12 mt-2">
                <div class="col-12 mx-auto">
                    <span class="text-dark"
                        style="font-size: 16px !important; text-align:justify; font-weight: 200 !important;">{!! $berita->artikel !!}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 r-content-one">
            <div class="col-8 mx-auto mb-4 d-none d-lg-block" style="margin-top: 60px;">
                <img class="img-fluid" src="{{ asset('frontend/img/iklan/iklan.gif') }}" alt="">
            </div>
            <div class="col-12 top-kat d-flex align-items-center py-1">
                <div class="kategori-merah"></div>
                <h4 class="text-uppercase px-3 m-0">Terkait</h4>
            </div>
            @foreach ($beritaKategories as $beritaKategori)
                @if ($beritaKategori->id != $berita->id)
                    <div class="col-lg-12 mt-2">
                        <a class="link-detail" href="{{ route('berita.detail.view', $beritaKategori->id) }}">
                            <div class="row p-0 m-0">
                                <div class="col-6 ps-0 img-berita-random">
                                    <img src="{{ asset('storage/' . $beritaKategori->gambar) }}" alt=""
                                        class="img-fluid">
                                </div>
                                <div class="col-6 mb-auto py-0 ps-0">
                                    <div class="m-0 p-0 badge-kategori">
                                        @if ($beritaKategori->status->id == 2)
                                            <span class="badge crown text-white">
                                                <i class="fas fa-crown text-warning"></i>
                                            </span>
                                        @endif
                                        <span class="badge bg-danger">{{ $beritaKategori->badge->badge }}</span>
                                        <span
                                            class="badge bg-warning text-uppercase text-white">{{ $beritaKategori->kategori->kategori }}</span>
                                        <span
                                            class="badge bg-primary text-uppercase text-white">{{ $beritaKategori->created_at->format('d-m-Y') }}</span>
                                    </div>
                                    <h5 class="small m-0 py-2 text-dark">{{ $beritaKategori->judul }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 top-kat d-flex align-items-center">
            <div class="kategori-merah"></div>
            <h4 class="text-uppercase px-3 m-0">Berita Lainnya</h4>
            <div class="kategori-abu"></div>
        </div>
        @foreach ($randomBeritas as $randomBerita)
            @if ($randomBerita->id != $berita->id)
                <div class="col-12 col-lg-3 mt-3 px-3" style="padding: 5px;">
                    <a class="link-detail" href="{{ route('berita.detail.view', $randomBerita->id) }}">
                        <img src="{{ asset('storage/' . $randomBerita->gambar) }}" alt="" class="img-fluid"
                            style="width: 100% !important; height: 146px !important; object-fit: cover; object-position: center;">

                        <div class="m-0 p-0 py-2 badge-kategori">

                            @if ($randomBerita->status->id == 2)
                                <span class="badge crown text-white">
                                    <i class="fas fa-crown text-warning"></i>
                                </span>
                            @endif
                            <span class="badge bg-danger">{{ $randomBerita->badge->badge }}</span>
                            <span
                                class="badge bg-warning text-uppercase text-white">{{ $randomBerita->kategori->kategori }}</span>
                            <span
                                class="badge bg-primary text-uppercase text-white">{{ $randomBerita->created_at->format('d-m-Y') }}</span>
                        </div>
                        <h5 style="font-size: 16px;" class="text-uppercase text-warning py-2 m-0">
                            {{ $randomBerita->judul }}
                        </h5>
                    </a>
                </div>
                {{-- <div class="col-12 px-2 mt-3 d-block d-lg-none" style="padding: 5px;">
                    <a class="link-detail" href="{{ route('berita.detail.view', $randomBerita->id) }}">
                        <img src="{{ asset('storage/' . $randomBerita->gambar) }}" alt="" class="img-fluid"
                            style="width: 100% !important; height: 146px !important; object-fit: cover; object-position: center;">

                        <div class="m-0 p-0 py-2 badge-kategori">

                            @if ($randomBerita->status->id == 2)
                                <span class="badge crown text-white">
                                    <i class="fas fa-crown text-warning"></i>
                                </span>
                            @endif
                            <span class="badge bg-danger">{{ $randomBerita->badge->badge }}</span>
                            <span
                                class="badge bg-warning text-uppercase text-white">{{ $randomBerita->kategori->kategori }}</span>
                            <span
                                class="badge bg-primary text-uppercase text-white">{{ $randomBerita->created_at->format('d-m-Y') }}</span>
                        </div>
                        <h5 style="font-size: 16px;" class="text-uppercase text-warning py-2 m-0">
                            {{ $randomBerita->judul }}
                        </h5>
                    </a>
                </div> --}}
            @endif
        @endforeach
    </div>

    <div class="modal fade" id="modal-berita" tabindex="-1" aria-labelledby="label-berita" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header py-2">
                    <h5 class="modal-title">Ubah Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                    <form method="post" action="{{ route('updateFront', $berita->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="kategori" class="form-label small">Kategori*</label>
                                    <select name="kategori" id="kategori"
                                        class="form-select @error('kategori') is-invalid @enderror">
                                        @foreach ($kategories as $kategori)
                                            <option value="{{ $kategori->id }}"
                                                {{ $kategori->id == $berita->kategori_id ? 'selected' : '' }}>
                                                {{ $kategori->kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label small">Status*</label>
                                    <select name="status" id="status"
                                        class="form-select @error('status') is-invalid @enderror">
                                        @foreach ($statues as $status)
                                            <option value="{{ $status->id }}"
                                                {{ $status->id == $berita->status_id ? 'selected' : '' }}>
                                                {{ $status->status_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="gambar_sebelumnya" class="form-label small">Gambar Sebelumnya*</label>
                                    <img class="img-fluid bg-dark" alt="gambar sebelumnya"
                                        src="{{ asset('storage/' . $berita->gambar) }}">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="badge" class="form-label small">Badge*</label>
                                    <select name="badge" id="badge"
                                        class="form-select @error('badge') is-invalid @enderror">
                                        @foreach ($badges as $badge)
                                            <option value="{{ $badge->id }}"
                                                {{ $badge->id == $berita->badge_id ? 'selected' : '' }}>
                                                {{ $badge->badge }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('badge')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label small">Gambar*</label>
                                    <input type="file" name="gambar" id="gambars"
                                        class="form-control @error('gambar') is-invalid @enderror"
                                        onchange="previewImages()">
                                    @error('gambar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if ($berita->gambar)
                                        <img src="{{ asset('frontend/img/img-berita' . $berita->gambar) }}"
                                            alt="" class="img-fluid mt-2" width="200">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="preview_gambar" class="form-label small">Preview Gambar*</label>
                                    <img class="img-previews img-fluid" alt="">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="judul" class="form-label small">Judul*</label>
                                    <input type="text" name="judul" id="judul" required
                                        class="form-control @error('judul') is-invalid @enderror"
                                        value="{{ $berita->judul }}">
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="artikel" class="form-label small">Artikel*</label>
                                    <textarea required name="artikel" id="editor" rows="10"
                                        class="form-control @error('artikel') is-invalid @enderror">{{ $berita->artikel }}</textarea>
                                    @error('artikel')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer py-1">
                    <button type="button" class="btn btn-secondary py-1" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary text-white py-1">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        function previewImage() {
            const image = document.querySelector('#gambars');
            const imgPreview = document.querySelector('.img-previews');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0])

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script> --}}
    <script>
        function previewImages() {
            const image = document.querySelector('#gambars');
            const imgPreview = document.querySelector('.img-previews');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

@endsection
