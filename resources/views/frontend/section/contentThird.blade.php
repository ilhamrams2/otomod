<div class="col-lg-8 p5px">
    @php
        $countBerita = 0;
    @endphp
    <div class="col-12 top-kat d-flex align-items-center pb-3">
        <div class="kategori-merah"></div>
        <h4 class="text-uppercase px-3 m-0">{{ $beritaKat2->kategori->kategori }}</h4>
        <div class="kategori-abu"></div>
    </div>

    @foreach ($beritas as $berita)

        @if ($berita->kategori->id == 2)
            @if ($countBerita < 3)
                <div class="col-12 mt-2" style="max-height: 234px !important">
                    <a class="link-detail" href="{{ route('berita.detail.view', $berita->id) }}">
                        <div class="row p-0 m-0">
                            <div class="col-6">
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6">
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
                                <h5 class="text-uppercase text-warning py-2 m-0">{{ $berita->judul }}</h5>
                                <span class="d-none d-lg-block" style="font-size: 14px !important;">{!! Str::limit($berita->artikel, 200) !!}</span>
                                <p class="m-0" style="font-size: 9px !important;"></p>
                            </div>
                        </div>
                    </a>
                    <!-- Template khusus untuk kategori dengan ID 1 -->
                </div>

                @php
                    $countBerita++;
                @endphp
            @endif
        @endif

    @endforeach
</div>

<div class="col-lg-4 ms-auto p5px">
    <div class="top-kat d-flex align-items-center pb-2">
        <div class="kategori-merah"></div>
        <h4 class="text-uppercase px-3 m-0">eksklusif</h4>
        <div class="kategori-abu"></div>
    </div>
    @foreach ($beritas as $berita)
        @if ($berita->status_id == 2)
            @if ($countBerita < 5)
                <div class="col-lg-12 mt-2">
                    <a class="link-detail" href="{{ route('berita.detail.view', $berita->id) }}">
                        <div class="row p-0 m-0">
                            <div class="col-6 img-berita-random">
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="" class="">
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
        @endif
    @endforeach
</div>


