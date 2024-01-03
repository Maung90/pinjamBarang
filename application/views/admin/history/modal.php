<?php
$no = 1;
$data = $this->db->query('SELECT * FROM tb_history WHERE id_peminjaman = "' . $id_peminjaman . '"')->result();
foreach ($data as $d) {
?>
    <div class="mb-1">
        <label for="barang_<?= $no ?>">Barang <?= $no ?></label>
        <select class="form-select" name="kode_barang[]" id="barang_<?= $no ?>">
        <option value="-"></option>
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