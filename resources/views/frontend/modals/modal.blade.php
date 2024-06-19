<style>

</style>
{{-- @if (session('success'))
    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="alert alert-dismissible m-0">
                        <h5><i class="fas fa-check"></i> Success!</h5>
                        <p id="alertMessage"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif (session('error'))
    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="alert alert-dismissible m-0">
                        <h5><i class="icon fas fa-ban"></i> Warning!</h5>
                        <p id="alertMessage"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif


<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            showAlert('{{ session('success') }}', 'success');
        @elseif (session('error'))
            showAlert('{{ session('error') }}', 'danger');
        @endif
    });

    function showAlert(message, type) {
        let alertMessage = document.getElementById('alertMessage');
        alertMessage.textContent = message;

        let alertModal = new bootstrap.Modal(document.getElementById('alertModal'));
        alertModal.show();

        setTimeout(function() {
            alertModal.hide();
        }, 3000); // Hide modal after 5 seconds
    }
</script> --}}

@if (session('success'))
    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" style="width: 450px;">
            <div class="modal-content" style="border-radius: 10px; border: 3px solid green">
                <div class="modal-body text-center">
                    <div class="checkmark animate__animated animate__zoomIn mx-auto mt-3">
                        <i class="fas fa-check animate__animated animate__rotateIn"></i>
                    </div>
                    <div class="my-3 mx-auto">
                        <h3 class="alert-heading m-0 mb-1">Berhasil!</h3>
                        <p id="alertMessage" class="text-capitalize"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif (session('error'))
<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" style="width: 450px;">
        <div class="modal-content" style="border-radius: 10px; border: 3px solid red">
            <div class="modal-body text-center">
                <div class="checkmarks animate__animated animate__zoomIn mx-auto mt-3">
                    <i class="icon fas fa-ban animate__animated animate__rotateIn"></i>
                </div>
                <div class="my-4 mx-auto">
                    <h3 class="alert-heading m-0">Waduuh!</h3>
                    <p id="alertMessage" class="text-capitalize"></p>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif (session('warning'))
    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" style="width: 450px;">
            <div class="modal-content" style="border-radius: 10px; border: 3px solid red">
                <div class="modal-body text-center">
                    <div class="checkmarks animate__animated animate__zoomIn mx-auto mt-3">
                        <i class="icon fas fa-ban animate__animated animate__rotateIn"></i>
                    </div>
                    <div class="my-3 mx-auto">
                        <h1 class="alert-heading m-0 mb-1">Eits!</h1>
                        <p id="alertMessage" class="text-capitalize mx-auto" style="width: 300px;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="User Icon">
                    <p id="alertMessage"></p>
                    <p>Untuk melihat detail berita dan mencari silahkan login terlebih dahulu</p>

                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-login" data-bs-dismiss="modal">LOGIN</button>
                </div>
            </div>
        </div>
    </div> --}}
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            showAlert('{{ session('success') }}', 'success');
        @elseif (session('error'))
            showAlert('{{ session('error') }}', 'danger');
        @elseif (session('warning'))
            showAlert('{{ session('warning') }}', 'warning');
        @endif
    });

    function showAlert(message, type) {
        let alertMessage = document.getElementById('alertMessage');
        alertMessage.textContent = message;

        let alertModal = new bootstrap.Modal(document.getElementById('alertModal'));
        alertModal.show();

        setTimeout(function() {
            alertModal.hide();
        }, 5000); // Hide modal after 3 seconds
    }
</script>
