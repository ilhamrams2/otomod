@extends('frontend.main')

@section('title', $title)

@section('contents')
    <div class="col-12 top-kat d-flex align-items-center mt-4">
        <div class="kategori-merah"></div>
        <h4 class="text-uppercase px-3 m-0">Hasil pencarian dari : <span class="text-warning">{{ $query }}</span>
        </h4>
    </div>
    @php
        $countBerita = 0;
    @endphp

    @if ($beritas->count() == 0)
        {{-- centered vertikal and horizontal --}}
        <div class="col-12 d-flex justify-content-center align-items-center mt-2" style="height: 60vh;">
            <h3 class="text-uppercase text-center">Berita Tidak Ditemukan ..<a href="/">Kembali</a></h3><br>

        </div>


        @else
        <div class="col-lg-8 p5px">
            @foreach ($beritas as $berita)
                @if ($countBerita < 5)
                    <a class="link-detail" href="{{ route('berita.detail.view', $berita->id) }}">
                        <div class="col-12 mt-4">
                            <div class="row p-0 m-0">
                                <div class="col-12 col-lg-6 px-0 mb-2">
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="" class="img-fluid">
                                </div>
                                <div class="col-12 col-lg-6 px-2">
                                    <div class="m-0 p-0">
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
                                    <span class="text-dark d-none d-lg-block"
                                        style="font-size: 14px !important;">{!! Str::limit($berita->artikel, 200) !!}</span>
                                    <p class="m-0" style="font-size: 9px !important;"></p>
                                </div>
                            </div>
                            <!-- Template khusus untuk kategori dengan ID 1 -->
                        </div>
                    </a>

                    @php
                        $countBerita++;
                    @endphp
                @endif
            @endforeach
    @endif

    </div>

@endsection
