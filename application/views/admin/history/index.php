<div class="card">
    <div class="card-header">
        <h4 class="m-0 p-0">Table Peminjam</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive pt-0">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Identitas</th>
                        <th>Waktu Peminjaman</th>
                        <th>Waktu Pengembalian</th>
                        <th>Disetujui Oleh</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $data = $this->db->order_by('waktu_pinjam', 'DESC')->get('tb_peminjaman')->result();
                    $pending = [];
                    $item = [];
                    foreach ($data as $row) {
                        if ($row->status_peminjaman == 'pending') {
                            $pending[] = $row;
                        } else {
                            $item[] = $row;
                        }
                    }

                    foreach ($pending as $row) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->no_identitas; ?></td>
                            <td><?= $row->waktu_pinjam; ?></td>
                            <td><?= $row->waktu_pengembalian; ?></td>
                            <td><?= $row->approved_by; ?></td>
                            <td><?= $row->status_peminjaman; ?></td>
                            <td>
                                    <?php 
                                    $data = $this->db->query('SELECT * FROM tb_history WHERE id_peminjaman = "'.$row->id_peminjaman.'"')->result();
                                    foreach ($data as $d) {
                                    ?>

                                <select name="kode_barang" id="">
                                    <?php 
                                    $data = $this->db->query('SELECT * FROM tbbarang WHERE status_barang = "tersedia"')->result();
                                    foreach ($data as $key) :
                                    ?>
                                    <option value=""><?=$key->kode_barang; ?></option>
                                    <?php endforeach;?>
                                </select>

                                <?php }?>
                            </td>
                        </tr>
                    <?php
                    }

                    foreach ($item as $row) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->no_identitas; ?></td>
                            <td><?= $row->waktu_pinjam; ?></td>
                            <td><?= $row->waktu_pengembalian; ?></td>
                            <td><?= $row->approved_by; ?></td>
                            <td><?= $row->status_peminjaman; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>