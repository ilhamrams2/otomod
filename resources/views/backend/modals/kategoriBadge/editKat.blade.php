<div class="modal fade" id="editKategoriModal-{{ $kategori->id }}" tabindex="-1" role="dialog" aria-labelledby="editKategoriModalLabel-{{ $kategori->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ubah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('kategori.update', $kategori->id) }}" class="px-3">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kategori" class="form-label small">Kategori*</label>
                        <input type="kategori" name="kategori"
                            class="form-control @error('kategori') is-invalid @enderror" required id="kategori"
                            value="{{ $kategori->kategori }}">
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
                <button type="submit" class="btn btn-primary text-white">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="editKategoriModal-{{ $kategori->id }}" tabindex="-1" role="dialog" aria-labelledby="editKategoriModalLabel-{{ $kategori->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKategoriModalLabel-{{ $kategori->id }}">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kategori_update', $kategori->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama Kategori</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $kategori->name }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
