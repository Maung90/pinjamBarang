<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4>
<div class="card mb-3">
    <div class="card-body">
        <div class="card-title">
            <h4 id="title">Tambah Peminjam</h4>
        </div>
        <?= $this->session->flashdata('success'); ?>
        <?= $this->session->flashdata('error'); ?>
        <form id="form" action="<?= base_url('Peminjam/insert') ?>" method="POST">
            <div class="mb-3">
                <label for="no_identitas">Identitas</label>
                <input id="no_identitas" name="no_identitas" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input id="nama_peminjam" name="nama_peminjam" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="kelas">Kelas</label>
                <input id="kelas" name="kelas" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="Alamat">Alamat</label>
                <textarea name="alamat" id="alamat" cols="3" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="no_telp">No Telephone</label>
                <input id="no_telp" name="no_telp" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary" id="btn_tambah">Tambah</button>
                <button type="submit" class="btn btn-primary ms-3" id="btn_update" disabled>Update</button>
                <button type="reset" class="btn btn-danger ms-3" id="btn_reset">Reset</button>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h4>Table Peminjam</h4>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Identtitas</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = $this->db->get('tbpeminjam')->result();
                foreach ($data as $row) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row->no_identitas; ?></td>
                        <td><?= $row->nama_peminjam; ?></td>
                        <td><?= $row->kelas; ?></td>
                        <td><?= $row->alamat; ?></td>
                        <td><?= $row->no_telp; ?></td>
                        <td><?= $row->email; ?></td>
                        <td><button onclick="edit('<?= $row->no_identitas; ?>')" class="btn btn-sm btn-primary"><i class="ti ti-edit"></i></button><button onclick="hapus('<?= $row->no_identitas; ?>')" class="ms-1 btn btn-sm btn-danger"><i class="ti ti-trash"></i></button></td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function edit(id) {
        $.ajax({
            url: '<?= base_url('Peminjam/get/') ?>' + id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if(data.length === 0){
                    toastr.error_log("Data tidak di temukan", 'Oops!', {
                        closeButton: true,
                        tapToDismiss: false,
                        progressBar: true
                    });
                }else{
                    var data = data[0];
                    var form = "<?= base_url('Peminjam/update/') ?>" + data.no_identitas;
                    $('#form').attr('action', form);
                    $('#no_identitas').val(data.no_identitas);
                    $('#nama_peminjam').val(data.nama_peminjam);
                    $('#kelas').val(data.kelas);
                    $('#alamat').val(data.alamat);
                    $('#no_telp').val(data.no_telp);
                    $('#title').text('Update Peminjam');
                    $('#btn_tambah').prop('disabled', true);
                    $('#btn_update').prop('disabled', false);
                }
            },
            error: function(error) {
                toastr.error("Data tidak di temukan", 'Error', {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true
                });
            }
        });
    }

    function hapus(id) {
        Swal.fire({
            icon: "question",
            title: "Apakah kamu yakin ingin menghapus data ini?",
            showCancelButton: true,
            confirmButtonText: "Hapus"
        }).then((result) => {
            if (result.isConfirmed) {
                window.open('<?= base_url('Peminjam/delete/') ?>'+id);
            }
        });
    }

    $('#btn_reset').on('click', function() {
        $('#title').text('Tambah Peminjam');
        $('#form').attr('action', '<?= base_url('Peminjam/insert') ?>');
        $('#btn_tambah').prop('disabled', false);
        $('#btn_update').prop('disabled', true);
    });
</script>