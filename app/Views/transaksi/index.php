<?= $this->extend('layout/template2'); ?>
<?= $this->section('menu'); ?>
<section class="content-5">
    <div class="body">
        <table>
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Code Purchases</th>
                    <th scope="col">Code Goods</th>
                    <th scope="col">Name of Items</th>
                    <th scope="col">Total Purchases</th>
                    <th scope="col">Total Payment</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transaksiData as $row) : ?>
                    <tr>
                        <td><?= $row['tanggal_transaksi']; ?></td>
                        <td><?= $row['id_transaksi']; ?></td>
                        <td><?= $row['kode_pakaian']; ?></td>
                        <td><?= $row['namapakaian']; ?></td>
                        <td><?= $row['total_pembelian']; ?></td>
                        <td>Rp. <?= number_format($row['total_pembayaran'], 0, ',', '.'); ?></td>
                        <td><?= $row['status_transaksi']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection(); ?>