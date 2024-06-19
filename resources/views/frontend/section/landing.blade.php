@php
    $countBerita = 0;
@endphp
<div class="col-lg-7 p5px">
    <div class="card h-420">
        <!-- Carousel -->
        <div id="demo" class="carousel slide h-100" data-bs-ride="carousel">
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner h-100">
                @php
                    $countBerita = 0;
                @endphp
                @foreach ($randomBeritas as $randomBerita)
                    @if ($randomBerita->status_id == 2 && $countBerita < 3)
                        <div class="carousel-item {{ $countBerita == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $randomBerita->gambar) }}" alt="{{ $randomBerita->judul }}"
                                class="w-100">
                            <div class="carousel-caption">
                                <div class="mt-auto">
                                    <span
                                        class="h5 text-warning text-uppercase text-shadow">{{ $randomBerita->judul }}</span><br>
                                    <span class="small text-light">{{ $randomBerita->created_at->format('d-m-Y') }}</span>
                                </div>
                            </div>
                        </div>
                        @php
                            $countBerita++;
                        @endphp
                    @endif
                @endforeach
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</div>
<div class="col-lg-5 p5px">
    <div class="col-12">
        <a class="link-detail" href="{{ route('berita.detail.view', $beritaKat1->id) }}">
            <div class="card h-205" style="background-image: url('{{ asset('storage/' . $beritaKat1->gambar) }}');">
                <div class="mt-auto">
                    <div class="py-2">
                        @if ($beritaKat1->status->id == 2)
                            <span class="badge crown text-white">
                                <i class="fas fa-crown text-warning"></i>
                            </span>
                        @endif
                        <span class="badge bg-danger">{{ $beritaKat1->badge->badge }}</span>
                        <span
                            class="badge bg-warning text-uppercase text-white">{{ $beritaKat1->kategori->kategori }}</span>
                        <span
                            class="badge bg-primary text-uppercase text-white">{{ $beritaKat1->created_at->diffForHumans() }}</span>
                    </div>

                    <span class="h5 text-warning text-uppercase text-shadow">{{ $beritaKat1->judul }}</span><br>
                    <span class="small text-light">{{ $beritaKat1->created_at->format('d-m-Y') }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12" style="margin-top: 10px">
        <a class="link-detail" href="{{ route('berita.detail.view', $beritaKat2->id) }}">
            <div class="card h-205" style="background-image: url('{{ asset('storage/' . $beritaKat2->gambar) }}');">
                <div class="mt-auto">
                    <div class="py-2">
                        @if ($beritaKat2->status->id == 2)
                            <span class="badge crown text-white">
                                <i class="fas fa-crown text-warning"></i>
                            </span>
                        @endif
                        <span class="badge bg-danger">{{ $beritaKat2->badge->badge }}</span>
                        <span
                            class="badge bg-warning text-uppercase text-white">{{ $beritaKat2->kategori->kategori }}</span>
                        <span
                            class="badge bg-primary text-uppercase text-white">{{ $beritaKat2->created_at->diffForHumans() }}</span>
                    </div>

                    <span class="h5 text-warning text-uppercase text-shadow">{{ $beritaKat2->judul }}</span><br>
                    <span class="small text-light">{{ $beritaKat2->created_at->format('d-m-Y') }}</span>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="col-12 col-lg-4 p5px">
    <a class="link-detail" href="{{ route('berita.detail.view', $beritaKat3->id) }}">
        <div class="card h-205" style="background-image: url('{{ asset('storage/' . $beritaKat3->gambar) }}');">
            <div class="mt-auto">
                <div class="py-2">
                    @if ($beritaKat3->status->id == 2)
                        <span class="badge crown text-white">
                            <i class="fas fa-crown text-warning"></i>
                        </span>
                    @endif
                    <span class="badge bg-danger">{{ $beritaKat3->badge->badge }}</span>
                    <span
                        class="badge bg-warning text-uppercase text-white">{{ $beritaKat3->kategori->kategori }}</span>
                    <span
                        class="badge bg-primary text-uppercase text-white">{{ $beritaKat3->created_at->diffForHumans() }}</span>
                </div>

                <span class="h5 text-warning text-uppercase text-shadow">{{ $beritaKat3->judul }}</span><br>
                <span class="small text-light">{{ $beritaKat3->created_at->format('d-m-Y') }}</span>
            </div>
        </div>
    </a>
</div>
<div class="col-12 col-lg-4 p5px">
    <a class="link-detail" href="{{ route('berita.detail.view', $beritaKat4->id) }}">
        <div class="card h-205" style="background-image: url('{{ asset('storage/' . $beritaKat4->gambar) }}');">
            <div class="mt-auto">
                <div class="py-2">
                    @if ($beritaKat4->status->id == 2)
                        <span class="badge crown text-white">
                            <i class="fas fa-crown text-warning"></i>
                        </span>
                    @endif
                    <span class="badge bg-danger">{{ $beritaKat4->badge->badge }}</span>
                    <span
                        class="badge bg-warning text-uppercase text-white">{{ $beritaKat4->kategori->kategori }}</span>
                    <span
                        class="badge bg-primary text-uppercase text-white">{{ $beritaKat4->created_at->diffForHumans() }}</span>
                </div>

                <span class="h5 text-warning text-uppercase text-shadow">{{ $beritaKat4->judul }}</span><br>
                <span class="small text-light">{{ $beritaKat4->created_at->format('d-m-Y') }}</span>
            </div>
        </div>
    </a>
</div>
<div class="col-12 col-lg-4 p5px">
    <a class="link-detail" href="{{ route('berita.detail.view', $beritaKat5->id) }}">
        <div class="card h-205" style="background-image: url('{{ asset('storage/' . $beritaKat5->gambar) }}');">
            <div class="mt-auto">
                <div class="py-2">
                    @if ($beritaKat5->status->id == 2)
                        <span class="badge crown text-white">
                            <i class="fas fa-crown text-warning"></i>
                        </span>
                    @endif
                    <span class="badge bg-danger">{{ $beritaKat5->badge->badge }}</span>
                    <span
                        class="badge bg-warning text-uppercase text-white">{{ $beritaKat5->kategori->kategori }}</span>
                    <span
                        class="badge bg-primary text-uppercase text-white">{{ $beritaKat5->created_at->diffForHumans() }}</span>
                </div>

                <span class="h5 text-warning text-uppercase text-shadow">{{ $beritaKat5->judul }}</span><br>
                <span class="small text-light">{{ $beritaKat5->created_at->format('d-m-Y') }}</span>
            </div>
        </div>
    </a>
</div>
