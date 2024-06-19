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
        <div class="col-12 mt-2 p-3"
            style="border-bottom-left-radius: 10px;
            border-top-left-radius: 10px; border: 2px solid #dadada">
            <h5 class="text-warning">Rp. 50.000</h5>
            <p class="small">Mendapatkan konten eksklusif selamanya, konten yang sangat akurat dan tidak ada hoax
                sedikitpun</p>
            <ul class="small">
                <li>Akses cepat ke berita terkini, </li>
                <li>Panduan pembelian</li>
                <li>Konten esklusif</li>
            </ul>
            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                data-bs-target="#modal-langganan">
                <span><i class="fas fa-crown"></i></span>
                <span class="text-uppercase">Langganan</span>
            </button>
        </div>
    </div>
    <div class="col-md-9 p-0">
        <div class="tab-content p-3 d-flex justify-content-center align-items-center"
            style="border: 2px solid #dadada; border-bottom-right-radius: 10px; border-top-right-radius: 10px; height: 310px; overflow-y: auto;"
            id="myTabContent">
            <div class="tab-pane fade show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="col-lg-12 p5px text-center">
                    <i class="fa-solid fa-lock" style="font-size: 48px;"></i><br>
                    <div class="col-6 mx-auto mt-2">
                        Silahkan Langganan terlebih dahulu untuk menikmati berita eksklusif kami
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-langganan" tabindex="-1" role="dialog" aria-labelledby="label-langganan"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="label-langganan">Buat Langganan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="langgananForm" method="post" action="{{ route('langganan.store.front') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="no_va" id="no_va">
                    <input type="hidden" name="no_tlpn" id="no_tlpn">

                    <div class="mb-3">
                        <label for="pembayaran_id" class="form-label">Metode Pembayaran*</label>
                        <select class="form-select @error('pembayaran_id') is-invalid @enderror" name="pembayaran_id"
                            id="pembayaran_id">
                            @foreach ($pembayarans as $pembayaran)
                                <option value="{{ $pembayaran->id }}">
                                    {{ $pembayaran->pembayaran }} - {{ $pembayaran->no_va }} {{ old('no_tlpn') }}
                                </option>
                            @endforeach
                        </select>
                        @error('pembayaran_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_tlpn_input" class="form-label">Nomor Telepon*</label>
                        <input type="tel" class="form-control @error('no_tlpn') is-invalid @enderror" id="no_tlpn_input"
                            value="{{ old('no_tlpn') }}" placeholder="Masukkan nomor telepon" required>
                        @error('no_tlpn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- No VA Section -->
                    <div id="noVaSection" style="display: none;">
                        <p>Nomor Virtual Account:</p>
                        <h5 id="noVaDisplay"></h5>
                    </div>
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="bayarButton">Bayar</button>
                <button type="button" class="btn btn-success" id="selesaiButton" style="display: none;">Selesai</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const langgananForm = document.getElementById('langgananForm');
        const noTlpnInput = document.getElementById('no_tlpn_input');
        const noVaSection = document.getElementById('noVaSection');
        const noVaDisplay = document.getElementById('noVaDisplay');
        const bayarButton = document.getElementById('bayarButton');
        const selesaiButton = document.getElementById('selesaiButton');

        let timer;

        bayarButton.addEventListener('click', function() {
            // Simulasi proses pembayaran (contoh: mengambil no_va dari server)
            const pembayaranOption = document.getElementById('pembayaran_id');
            const selectedPembayaran = pembayaranOption.options[pembayaranOption.selectedIndex].text;
            const noVaFromOption = selectedPembayaran.split(' - ')[1]; // Ambil no_va dari opsi pembayaran

            const randomNoVa = generateRandomNoVa(); // Generate random no_va
            noVaDisplay.textContent = noVaFromOption + ' ' + noTlpnInput.value; // Tampilkan no_va yang digabungkan dengan no telepon
            noVaSection.style.display = 'block';

            // Mengisi nilai input no_va dan no_tlpn pada form
            document.getElementById('no_va').value = noVaFromOption + ' ' + noTlpnInput.value;
            document.getElementById('no_tlpn').value = noTlpnInput.value;

            // Menampilkan tombol Selesai dan menyembunyikan tombol Bayar
            bayarButton.style.display = 'none';
            selesaiButton.style.display = 'inline-block';

            // Menjalankan timer 5 menit
            startTimer();
        });

        selesaiButton.addEventListener('click', function() {
            // Submit form saat tombol Selesai diklik
            langgananForm.submit();
        });

        function startTimer() {
            let countDownTime = 5 * 60; // 5 menit dalam detik
            timer = setInterval(function() {
                countDownTime--;
                if (countDownTime < 0) {
                    clearInterval(timer);
                    alert('Waktu untuk pembayaran telah habis.');
                    // Mengirim data ke server
                    langgananForm.submit();
                }
            }, 1000);
        }

        function generateRandomNoVa() {
            // Fungsi sederhana untuk menghasilkan nomor virtual account acak
            return Math.floor(1000000000 + Math.random() * 9000000000);
        }
    });
</script>

<script>
    function validateLength(input) {
        if (input.value.length > 12) {
            input.value = input.value.slice(0, 12);
        }
    }
</script>
