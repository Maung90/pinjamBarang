<div class="card">
    <div class="card-header">
        <h4 class="m-0 p-0">Data Peminjaman</h4>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('success'); ?>
        <?= $this->session->flashdata('error'); ?> 
        <div class="table-responsive pt-0">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Identitas</th>
                        <th>Waktu Peminjaman</th>
                        <th>Waktu Pengembalian</th> 
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $data = $this->db->where('status_peminjaman', 'pending')->order_by('waktu_pinjam', 'DESC')->get('tb_peminjaman')->result();
                    foreach ($data as $row) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->no_identitas; ?></td>
                            <td><?= $row->waktu_pinjam; ?></td>
                            <td><?= $row->waktu_pengembalian; ?></td> 
                            <td><span class="badge bg-warning rounded-pill text-capitalize"><?= $row->status_peminjaman; ?></span></td>
                            <td><button onclick="edit('<?= $row->id_peminjaman; ?>')" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#redeem"><i class="ti ti-edit"></i></button><button onclick="hapus('<?= $row->id_peminjaman; ?>')" class="ms-1 btn btn-sm btn-danger"><i class="ti ti-trash"></i></button></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->

<div class="modal fade" id="redeem" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form action="<?= base_url('History/Modal/') ?>" method="POST" class="modal-content" id="form">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

    function edit(id){
        $.ajax({
            url: '<?= base_url('History/Modal/') ?>' + id,
            type: 'GET',
            dataType: 'HTML',
            success: function(data) {
                var form = "<?= base_url('History/update/') ?>" + id + '/pending';
                $('#form').attr('action', form);
                $('#modal-body').html(data);
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
                window.open('<?= base_url('History/delete/') ?>'+id);
            }
        });
    }
</script>