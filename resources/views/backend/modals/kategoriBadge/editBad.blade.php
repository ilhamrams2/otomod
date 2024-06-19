<div class="modal fade" id="editBadgeModal-{{ $badge->id }}" tabindex="-1" role="dialog" aria-labelledby="editBadgeModalLabel-{{ $badge->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ubah badge</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('badge.update', $badge->id) }}" class="px-3">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="badge" class="form-label small">badge*</label>
                        <input type="badge" name="badge"
                            class="form-control @error('badge') is-invalid @enderror" required id="badge"
                            value="{{ $badge->badge }}">
                        @error('badge')
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
