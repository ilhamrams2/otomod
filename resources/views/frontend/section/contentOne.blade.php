<div class="col-lg-4 p5px">
    @php
        $countBerita = 0;
    @endphp
    <div class="col-12 top-kat d-flex align-items-center pb-3">
        <div class="kategori-merah"></div>
        <h4 class="text-uppercase px-3 m-0">{{ $beritaKat3->kategori->kategori }}</h4>
        <div class="kategori-abu"></div>
    </div>
    @foreach ($beritas as $berita)

        @if ($berita->kategori->id == 3)
            @if ($countBerita < 2)
                <a class="link-detail" href="{{ route('berita.detail.view', $berita->id) }}">
                    <div class="col-12 px-2">
                        <!-- Template khusus untuk kategori dengan ID 1 -->
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="" class="img-fluid">

                        <div class="m-0 p-0 badge-kategori mt-2">
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
                        <span style="font-size: 14px !important;">{!! Str::limit($berita->artikel, 200) !!}</span>
                        <p class="m-0" style="font-size: 9px !important;"></p>
                    </div>
                </a>

                @php
                    $countBerita++;
                @endphp
            @endif
        @endif

    @endforeach
</div>



<div class="col-lg-8 p5px">
    <div class="top-kat d-flex align-items-center pb-2">
        <div class="kategori-merah"></div>
        <h4 class="text-uppercase px-3 m-0">Berita</h4>
        <div class="kategori-abu" style="flex-grow: 1; height: 22px;"></div>
    </div>
    <div class="row m-0">
        @foreach ($randomBeritas as $randomBerita)
            @if ($countBerita < 10)
                <div class="col-lg-6 mt-2 px-2">
                    <a class="link-detail" href="{{ route('berita.detail.view', $randomBerita->id) }}">
                        <div class="row p-0 m-0">
                            <div class="col-6 img-berita-random">
                                <img src="{{ asset('storage/' . $randomBerita->gambar) }}" alt=""
                                    class="">
                            </div>
                            <div class="col-6 mb-auto py-0 ps-0">
                                <div class="m-0 p-0 badge-kategori">
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
                                <h5 class="small m-0 py-2">{{ $randomBerita->judul }}</h5>
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
