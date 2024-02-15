<?php foreach ($namapakaian as $p) : ?>
    <div class="modal fade" id="beli<?= $p['idpakaian']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Beli Pakaian</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="<?= base_url('/beli_katalog/orderPakaian') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <i>Bayar dengan scan QR dibawah dengan DANA untuk membeli <?= $p['namapakaian']; ?> </i><br>
                        <img src="<?= base_url('QRS/QRS_DANA.png') ?>" width="300">
                        <p id="totalHargaModal" style="font-weight: 600; font-size: 2pc;"></p>
                        <input type="hidden" name="id_user" value="<?= user()->id; ?>" class="form-control" required>
                        <input type="hidden" name="id_pakaian" value="<?= $p['idpakaian']; ?>" class="form-control" required>
                        <br>
                        <label for="">Upload bukti pembayaran :</label>
                        <input type="file" name="gambar" class="form-control" placeholder="Bukti Pembayaran" required>
                        <br>
                        <label for="jumlahBeli">Jumlah Beli:</label>
                        <input type="number" name="jumlah_beli" id="jumlahBeliInput" class="form-control" required readonly>
                        <br>
                        <input type="hidden" name="harga_pakaian" value="<?= $p['hargapakaian']; ?>" id="hargaPakaian">
                        <input type="hidden" name="total_harga" id="totalHargaInput" value="0">
                        <div>
                            <input class="form-check-input" type="checkbox" value="" id="agreeCheckbox" required>
                            <label class="form-check-label" for="agreeCheckbox">
                                Apakah jumlah produk yang akan ada beli sudah benar ?
                            </label>
                        </div><br>
                        <button type="submit" class="btn btn-primary" name="addnewtransaksi" onclick="return validateCheckbox()">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        // Hitung total harga secara dinamis berdasarkan jumlah beli
        document.getElementById('jumlahBeli').addEventListener('input', function() {
            var jumlahBeli = this.value;
            var hargaPakaian = <?= $p['hargapakaian']; ?>;
            var totalHarga = jumlahBeli * hargaPakaian;
            document.getElementById('totalHargaModal').innerText = 'Rp. ' + totalHarga;
            document.getElementById('totalHarga').value = value + totalHarga;
        });
    </script>
    <script>
        function validateCheckbox() {
            if (!document.getElementById("agreeCheckbox").checked) {
                alert("Anda harus menyetujui syarat dan ketentuan.");
                return false;
            }
            return true;
        }
    </script>
<?php endforeach; ?>