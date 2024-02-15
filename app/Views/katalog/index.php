<?= $this->extend('layout/template'); ?>
<?= $this->section('menu'); ?>



<div class="body">


    <section class="content-1" id="card">
        <div class="container-card">
            <?php foreach ($namapakaian as $p) : ?>
                <div class="card" style="--clr: #009688">
                    <div class="img-box">
                        <img src="<?= base_url('uploads/' . $p['gambar']) ?>" alt="Uploaded Image" width="100" height="100">
                    </div>
                    <div class="content">
                        <h2><?= $p['namapakaian']; ?></h2>
                        <p><?= $p['deskripsi']; ?></p>
                        <div class="harstok">
                            <p>Harga : Rp. <?= number_format($p['hargapakaian'], 0, ',', '.'); ?> | Tersedia : <?= $p['stok']; ?></p>
                        </div>

                        <?php if (!logged_in()) : ?>
                            <a href="#" onclick="<?= logged_in() ? '' : 'showLoginAlert()' ?>">Beli</a>
                        <?php endif; ?>

                        <?php if (in_groups('user') && logged_in()) : ?>
                            <a href=" <?= base_url('beli/' . $p['idpakaian']) ?>">Beli</a>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>
</div>

<div class="background-modal" onclick="toggleModal()"></div>

<div class="modal">
    <div class="modal-content">
        <h2><?php  ?></h2>
        <p>
            You have opened the modal, they are great for confirming actions or
            displaying critical information.
        </p>
    </div>
</div>

<script>
    function showLoginAlert() {
        alert('Anda harus login terlebih dahulu untuk melakukan pembelian.');
        // Tambahkan logika untuk membuka form login atau melakukan tindakan lain sesuai kebutuhan.
    }
</script>

<?= $this->endSection(); ?>