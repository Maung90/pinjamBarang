<?php
$peminjam = $this->db->query('SELECT * FROM tb_peminjaman WHERE id_peminjaman = "' . $id_peminjaman . '"')->row();
$no = 1;
$data = $this->db->query('SELECT * FROM tb_history WHERE id_peminjaman = "' . $id_peminjaman . '"')->result();
foreach ($data as $d) {
?>
    <div class="mb-1">
        <label for="barang_<?= $no ?>">Barang <?= $no ?></label>
        <select class="form-select" name="kode_barang[]" id="barang_<?= $no ?>">
            <?php
            $data = $this->db->query('SELECT * FROM tbbarang WHERE status_barang = "tersedia"')->result();
            foreach ($data as $key) :
            ?>
                <option value="<?= $key->kode_barang; ?>" <?php if($d->kode_barang == $key->kode_barang){ echo "selected"; }  ?>><?= $key->kode_barang; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
<?php $no++;
} ?>

<div class="mb-1">
    <label for="status_peminjam">Status Peminjaman</label>
    <select class="form-select" name="status_peminjaman" id="status_peminjaman">
        <option disabled selected>-- Pilih salah satu --</option>
        <option value="Pending" <?php if($peminjam->status_peminjaman == "Pending") { echo "selected"; } ?>>Pending</option>
        <option value="Dipinjam" <?php if($peminjam->status_peminjaman == "Dipinjam") { echo "selected"; } ?>>Dipinjam</option>
        <option value="Dikembalikan" <?php if($peminjam->status_peminjaman == "Dikembalikan") { echo "selected"; } ?>>Dikembalikan</option>
    </select>
</div>