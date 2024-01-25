<?php
$no = 1;
// $data = $this->db->query('SELECT * FROM tb_history WHERE id_peminjaman = "' . $id_peminjaman . '"')->result();
$data = $this->db->query('SELECT * FROM tb_history th
                          JOIN tbbarang tb ON th.kode_barang = tb.kode_barang
                          JOIN tbkategori tk ON tb.id_kategori = tk.id_kategori
                          WHERE th.id_peminjaman = "' . $id_peminjaman . '"')->result();
foreach ($data as $d) {
?>
    <div class="mb-1">
        <label for="barang_<?= $no ?>">Barang <?= $no ?> / <?= $d->nama_kategori ?></label>
        <select class="form-select selectpicker w-100 " data-style="btn-default" data-live-search="true" name="kode_barang[]" id="barang_<?= $no ?>">
        <option value="-"></option>
            <?php
            $data = $this->db->query('SELECT * FROM tbbarang WHERE status_barang = "tersedia" AND id_kategori = "'.$d->id_kategori.'"')->result();
            foreach ($data as $key) :
            ?>
                <option data-tokens="<?= $key->kode_barang; ?>" value="<?= $key->kode_barang; ?>" <?php if($d->kode_barang == $key->kode_barang){ echo "selected"; }  ?>><?= $key->kode_barang; ?> / <?= $key->nama_barang; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
<?php $no++;
} ?>