<h4 class="fw-bold py-2"><span class="text-muted fw-light">DataMaster /</span> Barang</h4>
<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4"> 
            <div class="card-body">
                <?php
                if ($this->session->flashdata('pesan')){
                    echo $this->session->flashdata('pesan');
                }

                ?>
                <small class="text-danger"> 
                   <?= $this->session->flashdata('error_validation');  ?> 
               </small>
               <form action="<?= base_url('Barang/simpan')?>" method="POST" id="form" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Kode Barang</label>
                    <div class="col-sm-10">
                        <input
                        required type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Masukan Kode" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Barang</label>
                    <div class="col-sm-10">
                        <input
                        required type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukan Nama" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Merk Barang</label>
                    <div class="col-sm-10">
                        <input
                        required type="text" class="form-control" id="merk_barang" name="merk_barang" placeholder="Masukan Merk" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name" >Status Barang</label>
                    <div class="col-sm-10">
                        <select class="form-control phone-mask" id="status_barang" name="status_barang" placeholder="Masukan Status" required>
                            <option selected disabled>Pilih</option>
                            <option value="tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                            <option value="dipinjam">Dipinjam</option>

                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Gambar Barang</label>
                    <div class="col-sm-10">
                        <input
                        required
                        type="file"
                        class="form-control"
                        id="image"
                        name="image"
                        placeholder="Masukan Gambar"
                        />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-control phone-mask" id="id_kategori" name="id_kategori">
                          <option selected disabled>Pilih</option>
                          <?php
                          $data=$this->db->get('tbkategori')->result();
                          foreach ($data as $d):
                              ?>
                              <option value="<?php echo $d->id_kategori?>"><?php echo $d->nama_kategori?></option>
                              <?php
                          endforeach;
                          ?>
                      </select>
                  </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button id="btn_tambah" type="submit" class="btn btn-primary me-2">Simpan</button>
                    <button id="btn_update" type="submit" class="btn btn-primary me-2" disabled>Edit</button>
                    <button type="reset" class="btn btn-danger">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>


<div class="card">
  <div class="card-body">
    <div class="table-responsive pt-0">
        <table class="table" id="datatable">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kode Barang</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Merk Barang</th>
              <th scope="col">Status Barang</th>
              <th scope="col">Gambar Barang</th>
              <th scope="col">Kategori</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
          <?php
          $no = 1;
          foreach ($dataBarang as $value):
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $value->kode_barang; ?></td>
                <td><?= $value->nama_barang; ?></td>
                <td><?= $value->merk_barang; ?></td>
                <td><?= $value->status_barang; ?></td>
                <td><img src="<?= base_url('assets/img/imgBarang/'.$value->image); ?>" alt="Gambar Barang" width="50px" height="50px"></td>
                <td><?= $value->nama_kategori; ?></td>
                <td>
                  <button onclick="edit('<?= $value->kode_barang; ?>')" type="button" class="btn btn-sm btn-primary">
                    <label class="ti ti-edit "></label>
                </button>
                <button onclick="hapus('<?= $value->kode_barang;?>')" type="button" class="btn btn-sm btn-danger">
                  <label class="ti ti-trash"></label>
              </button>

          </td>
      </tr>
      <?php 
      $no++;
  endforeach; 
  ?>
</tbody>
</table>
</div>
</div>
</div>
<script>
    $(document).ready(function(){
      $('#datatable').DataTable();
  });   
</script>

<script>

  function hapus(id) {
     Swal.fire({
        icon: "question",
        title: "Apakah yakin ingin menghapus data ini?",
        showCancelButton: true,
        confirmButtonText: "Hapus"
    }).then((result) => {
        if (result.isConfirmed) {
           document.location = '<?= base_url('Barang/hapus/')?>'+id;
       }
   });
}

function edit(id) {
    $.ajax({
        url: '<?=  base_url('barang/get/') ?>' + id,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var data = data[0];
            console.log(data);
            var form = "<?= base_url('barang/update/') ?>" + data.kode_barang;
            $('#form').attr('action', form);
            $('#kode_barang').val(data.kode_barang);
            $('#nama_barang').val(data.nama_barang);
            $('#merk_barang').val(data.merk_barang);
            $('#status_barang').val(data.status_barang);
            $('#image').val(data.image);
            $('#id_kategori').val(data.nama_kategori);

            $('#btn_tambah').prop('disabled', true);
            $('#btn_update').prop('disabled', false);
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

$(document).ready(function(){
  $('#datatable').DataTable();
});   
</script>