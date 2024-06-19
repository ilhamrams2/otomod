<div class="row mt-5">
    <div class="col-md-3 pb-5">
        <ul class="nav flex-column nav-pills nav-pills-warning" id="myTab" role="tablist" aria-orientation="vertical">
            <li class="nav-item mb-2" role="presentation">
                <button type="button"
                    class="nav-link py-2 w-100 text-left d-flex align-items-center justify-content-center"
                    style="border: 2px solid #dfdfdf" data-bs-toggle="modal" data-bs-target="#tambah_berita">
                    <span><i class="fas fa-pen-alt text-warning small"></i></span>
                    <span class="px-2 text-uppercase">Buat Berita</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active py-2" id="home-tab" data-bs-toggle="pill" href="#home" role="tab"
                    aria-controls="home" aria-selected="true">
                    <span><i class="fas fa-crown text-warning"></i></span>
                    <span class="px-2 text-uppercase">Eksklusif</span>
                </a>
            </li>
            <li class="nav-item mt-2" role="presentation">
                <a class="nav-link py-2" id="tulisanku-tab" data-bs-toggle="pill" href="#tulisanku" role="tab"
                    aria-controls="tulisanku" aria-selected="false">
                    <span><i class="fas fa-book text-warning"></i></span>
                    <span class="px-2 text-uppercase">Tulisanku</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="col-md-9 p-0">
        <div class="tab-content p-3"
            style="border: 2px solid #dadada; border-bottom-right-radius: 10px; border-top-right-radius: 10px; max-height: 450px; overflow-y: auto;"
            id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="col-12 ps-2 py-2">
                    <span class="h6"><i class="fas fa-crown text-warning pe-2"></i>Berita Eksklusif</span>
                </div>
                <div class="col-lg-12 p5px">
                    @php
                        $countBerita = 0;
                    @endphp
                    <div class="row">
                        @foreach ($beritas as $berita)
                            @if ($countBerita < 10)
                                <div class="col-lg-6 mt-2 px-2">
                                    <a class="link-detail" href="{{ route('berita.detail.view', $berita->id) }}">
                                        <div class="row p-0 m-0 r-content-one">
                                            <div class="col-6 img-berita-random">
                                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt=""
                                                    class="">
                                            </div>
                                            <div class="col-6 mb-auto py-0 ps-0">
                                                <div class="m-0 p-0 badge-kategori">
                                                    @if ($berita->status->id == 2)
                                                        <span class="badge crown text-white">
                                                            <i class="fas fa-crown text-warning"></i>
                                                        </span>
                                                    @endif
                                                    <span class="badge bg-danger">{{ $berita->badge->badge }}</span>
                                                    <span
                                                        class="badge bg-warning text-uppercase text-white">{{ $berita->kategori->kategori }}</span>
                                                    <span
                                                        class="badge bg-primary text-uppercase text-white">{{ $berita->created_at->format('d-m-Y') }}</span>
                                                </div>
                                                <h5 class="small m-0 py-2">{{ $berita->judul }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                @php
                                    $countBerita++;
                                @endphp
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tulisanku" role="tabpanel" aria-labelledby="tulisanku-tab">
                <div class="col-lg-12 p5px">
                    <div class="col-12 ps-2 pt-2 pb-3">
                        <span class=""><i class="fas fa-crown text-warning pe-2"></i>Berita penulis
                            {{ $user->name }}</span>
                    </div>
                    @php
                        $countBerita = 0;
                    @endphp
                    <div class="row">
                        @foreach ($myBeritas as $myBerita)
                            {{-- @if ($berita->user_id == Auth::id()) --}}
                                <div class="col-lg-6 mt-2 px-2">
                                    <a class="link-detail" href="{{ route('berita.detail.view', $myBerita->id) }}">
                                        <div class="row p-0 m-0 r-content-one">
                                            <div class="col-6 img-berita-random">
                                                <img src="{{ asset('storage/' . $myBerita->gambar) }}" alt="" class="">
                                            </div>
                                            <div class="col-6 mb-auto py-0 ps-0">
                                                <div class="m-0 p-0 badge-kategori">
                                                    @if ($myBerita->status->id == 2)
                                                        <span class="badge crown text-white">
                                                            <i class="fas fa-crown text-warning"></i>
                                                        </span>
                                                    @endif
                                                    <span class="badge bg-danger">{{ $myBerita->badge->badge }}</span>
                                                    <span
                                                        class="badge bg-warning text-uppercase text-white">{{ $myBerita->kategori->kategori }}</span>
                                                    <span
                                                        class="badge bg-primary text-uppercase text-white">{{ $myBerita->created_at->format('d-m-Y') }}</span>
                                                </div>
                                                <h5 class="small m-0 py-2">{{ $myBerita->judul }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                @php
                                    $countBerita++;
                                @endphp
                            {{-- @endif --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah_berita" tabindex="-1" aria-labelledby="tambahBeritaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header py-2">
                <h5 class="modal-title" id="tambahBeritaLabel">Buat Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <form method="post" action="{{ route('storeFront') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="kategori" class="form-label small">Kategori*</label>
                                <select name="kategori" id="kategori"
                                    class="form-select @error('kategori') is-invalid @enderror">
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
                                    class="form-select @error('status') is-invalid @enderror">
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
                                    class="form-select @error('badge') is-invalid @enderror">
                                    @foreach ($badges as $badge)
                                        <option value="{{ $badge->id }}">{{ $badge->badge }}</option>
                                    @endforeach
                                </select>
                                @error('badge')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gambars" class="form-label small">Gambar*</label>
                                <input type="file" name="gambar" id="gambars"
                                    class="form-control @error('gambars') is-invalid @enderror"
                                    onchange="previewImages()">
                                @error('gambars')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 col-5">
                                <img class="img-previews img-fluid" style="display: none;" alt="Preview Gambar">
                            </div>
                            <div class="mb-3">
                                <label for="judul" class="form-label small">Judul*</label>
                                <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                                    required class="form-control @error('judul') is-invalid @enderror">
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary text-white">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script> --}}
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
