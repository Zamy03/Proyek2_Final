<?= $this->extend('layout/template2'); ?>

<?php foreach ($namapakaian as $p) : ?>
    <?= $this->section('menu'); ?>


    <div class="content-4" id="beli/<?= $p['idpakaian'] ?>">
        <div class="title-goods">
            <h1>Beli <?= $p['namapakaian']; ?></h1>
            <div class="img-content">
                <img src="<?= base_url('uploads/' . $p['gambar']) ?>" alt="Uploaded Image" width="250">
                <div class="text-content">
                    <p><?= $p['deskripsi']; ?></p>
                    <p>Tersedia : <?= $p['stok']; ?></p>
                    <p>Ukuran : <?= $p['ukuran']; ?></p>
                    <p>Warna : <?= $p['warna']; ?></p>
                    <p>Harga satuan : Rp. <?= number_format($p['hargapakaian'], 0, ',', '.'); ?></p>
                    <p id="totalHarga">Total Harga : Rp. 0 </p>
                    <div class="pembelian d-flex gap-3">
                        <input type="number" class="form-control w-75" id="jumlahBeli" oninput="hitungTotal()" max="<?= $p['stok']; ?>" min="1">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#beli<?= $p['idpakaian']; ?>" onclick="hitungTotal()">
                            Beli
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?= $this->endSection(); ?>
    <?= $this->section('script'); ?>

    <script>
        var totalHarga = 0;

        function hitungTotal() {
            var jumlah = document.getElementById('jumlahBeli').value;
            var hargaSatuan = <?= $p['hargapakaian']; ?>;
            totalHarga = jumlah * hargaSatuan;

            var formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            document.getElementById('totalHarga').innerHTML = 'Total Harga : ' + formatter.format(totalHarga);

            // Batasi nilai jumlah beli agar tidak melebihi stok yang tersedia
            if (jumlah > <?= $p['stok']; ?>) {
                alert("Tidak dapat membeli lebih dari stok yang tersedia.");
                document.getElementById('jumlahBeli').value = <?= $p['stok']; ?>;
                jumlah = <?= $p['stok']; ?>;
            }

            // Tampilkan totalHargaModal di dalam modal
            document.getElementById('totalHargaModal').innerHTML = ' ' + formatter.format(totalHarga);
            document.getElementById('totalHargaInput').value = totalHarga;
            document.getElementById('jumlahBeliInput').value = jumlah;

        }
    </script>

    <script>
        var myModal = new bootstrap.Modal(document.getElementById('beli<?= $p['idpakaian']; ?>'));
    </script>

    <!-- <script>
        var totalHarga = 0;

        function hitungTotal(jumlah) {
            var hargaSatuan = <?= $p['hargapakaian']; ?>;
            totalHarga = jumlah * hargaSatuan;

            var formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            document.getElementById('totalHarga').innerHTML = 'Total Harga = ' + formatter.format(totalHarga);

            // Tampilkan totalHargaModal di dalam modal
            document.getElementById('totalHargaModal').innerHTML = 'Total Harga = ' + formatter.format(totalHarga);
        }

        // Contoh panggilan fungsi dengan parameter (misalnya saat halaman dimuat)
        // hitungTotal(5); // Gantilah 5 dengan jumlah yang sesuai
    </script> -->
    <!-- <script>
        function hitungTotal() {
            // Ambil nilai jumlah dari input
            var jumlah = document.getElementById('jumlahBeli').value;

            // Ganti nilai total harga sesuai dengan jumlah yang diinputkan
            var hargaSatuan = <?= $p['hargapakaian']; ?>;
            var totalHarga = jumlah * hargaSatuan;

            // Format totalHarga sebagai mata uang Rupiah
            var formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });

            // Tampilkan totalHarga yang sudah diformat
            document.getElementById('totalHarga').innerHTML = 'Total Harga: ' + formatter.format(totalHarga);
        }
    </script> -->


    <?= $this->include('Beli/modal_beli'); ?>

<?php endforeach; ?>
<?= $this->endSection(); ?>