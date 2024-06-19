<div class="row mt-3">
    <div class="col-md-3 mb-3">
        <ul class="nav flex-column nav-pills nav-pills-warning" id="myTab" role="tablist" aria-orientation="vertical">
            <li class="nav-item" role="presentation">
                <a class="nav-link active py-2" id="home-tab" data-bs-toggle="pill" href="#home" role="tab"
                    aria-controls="home" aria-selected="true">
                    <span><i class="fas fa-crown text-warning"></i></span>
                    <span class="px-2 text-uppercase">Eksklusif</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="col-md-9 p-0">
        <div class="tab-content p-3"
            style="border: 2px solid #dadada; border-bottom-right-radius: 10px; border-top-right-radius: 10px; max-height: 450px; overflow-y: auto;"
            id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
        </div>
    </div>
</div>
