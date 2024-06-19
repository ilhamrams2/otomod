<div class="modal fade" id="modal-editpenulis{{ $penulis->id }}" tabindex="-1" role="dialog"
    aria-labelledby="label-editpenulis{{ $penulis->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header py-2">
                <h5 class="modal-title">Ubah User Penulis</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body px-4" style="">
                <form method="post" action="{{ route('penulis.update', $penulis->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="role_id" value="2">
                    <input type="hidden" name="status_id" value="2">

                    <div class="mb-3">
                        <label for="name" class="form-label small">Nama Lengkap*</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ old('name', $penulis->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label small">Email*</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" value="{{ old('email', $penulis->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label small">Password Baru*</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" id="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer py-1">
                <button type="button" class="btn btn-secondary py-1" data-dismiss="modalss"><a
                        href="{{ route('profile') }}" class="text-white">Close</a></button>
                <button type="submit" class="btn btn-primary text-white py-1">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>
