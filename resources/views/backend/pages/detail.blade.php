@extends('BackEnd.backend')

@section('title', 'Detail')

@section('content')


    <div class="row">
        <div class="col-lg-10 mx-auto mt-4 pb-5" style="background-color:#fff">
            <div class="col-12 py-4 d-flex justify-content-between align-items-center">
                <div class="title-page d-flex align-items-center">
                    <div class="bg-danger mr-2" style="width: 17px; height: 27px;"></div>
                    <span class="h5 m-0 p-0 font-weight-bold">Berita</span>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary" style="border: none !important;" type="button"
                        id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu text-white" aria-labelledby="dropdownMenuButton"
                        style="left: -130px !important">
                        <!-- Edit Button -->
                        <a href="{{ route('berita') }}" class="dropdown-item">
                            <i class="fas fa-long-arrow-alt-left mr-2"></i> Kembali
                        </a>
                        <!-- Delete Form -->
                        <button type="button" class="btn btn-outline-warning dropdown-item" data-toggle="modal"
                            data-target="#modal-berita">
                            <i class="fas fa-edit mr-2"></i> Ubah
                        </button>
                    </div>
                </div>


            </div>
            <div class="col-12">
                <img src="{{ asset('storage/'. $berita->gambar) }}" alt="" class="w-100">
            </div>
            <div class="col-12 py-3">
                @if ($berita->status->id == 2)
                    <span class="badge px-2 py-2" style="border-inline: 2px solid #ffc107;">
                        <img src="{{ asset('frontend/img/icon-premium/icon-premium.svg') }}" alt=""
                            class="img-fluid">
                    </span>
                @endif
                <span class="badge p-2 badge-danger">{{ $berita->badge->badge }}</span>
                <span class="badge p-2 badge-warning text-uppercase text-white">{{ $berita->kategori->kategori }}</span>
                <span
                    class="badge p-2 badge-primary text-uppercase text-white">{{ $berita->created_at->diffForHumans() }}</span>
            </div>
            <div class="col-12 mb-2">
                <span class="h4 title-detail">
                    {{ $berita->judul }}
                </span>
            </div>
            <div class="col-12">
                {!! $berita->artikel !!}
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal-berita" tabindex="-1" role="dialog" aria-labelledby="label-berita"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header py-2">
                    <h5 class="modal-title">Ubah Berita</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                    <form method="post" action="{{ route('berita.update', $berita->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="kategori" class="form-label small">Kategori*</label>
                                    <select name="kategori" id="kategori"
                                        class="form-control @error('kategori') is-invalid @enderror">
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
                                        class="form-control @error('status') is-invalid @enderror">
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
                                    <label for="status" class="form-label small">Gambar Sebelumnya*</label>
                                    <img class="img-fluid bg-dark" alt="gambar sebelumnya" src="{{ asset('storage/'. $berita->gambar) }}">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="badge" class="form-label small">Badge*</label>
                                    <select name="badge" id="badge"
                                        class="form-control @error('badge') is-invalid @enderror">
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
                                        class="form-control-file @error('gambar') is-invalid @enderror" onchange="previewImage()">
                                    @error('gambar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if ($berita->gambar)
                                        <img src="{{ asset('frontend/img/img-berita' . $berita->gambar) }}"
                                            alt="" class="img-fluid mt-2" width="200">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label small">Preview Gambar*</label>
                                    <img class="img-previews img-fluid" alt="">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="judul" class="form-label small">Judul*</label>
                                    <input type="text" name="judul" id="judul" required
                                        class="form-control @error('judul') is-invalid @enderror" value="{{ $berita->judul }}">
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="artikel" class="form-label small">Artikel*</label>
                                    <textarea required name="artikel" id="editor" rows="10" class="form-control @error('artikel') is-invalid @enderror">{{ $berita->artikel }}</textarea>
                                    @error('artikel')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>



                </div>

                <!-- Modal footer -->
                <div class="modal-footer py-1">
                    <button type="button" class="btn btn-secondary py-1" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary text-white py-1">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
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
    </script>
@endsection
