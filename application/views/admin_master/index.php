<div class="row">
<!-- Basic Layout -->
<div class="col-xxl">
    <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form Admin</h5>
    </div>
    <div class="card-body">
    <?php
        if ($this->session->userdata('pesan')){
            echo $this->session->userdata('pesan');
        }
        ?>
        <form id="form" method="POST" action="<?php echo base_url ('Master/simpanAdmin')?>">
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="no_user">No Identitas</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="no_user" name="no_user" placeholder="Masukan No Identitas" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="username">Username</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-company">Email</label>
            <div class="col-sm-10">
            <input
                type="email"
                class="form-control"
                id="basic-default-company"
                name="email"
                placeholder="Masukan Email" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="nama">Nama</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama_user" placeholder="Masukan Nama" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="no_telp">No.Telepon</label>
            <div class="col-sm-10">
            <input
                type="text"
                id="no_telp"
                class="form-control phone-mask"
                aria-describedby="no_telp"
                name="no_telp" 
                placeholder="Masukan No.Telepon" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
            <div class="col-sm-10">
            <textarea
                id="alamat"
                class="form-control"
                name="alamat"
                placeholder="Masukan Alamat"
            ></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="kerja">Unit Kerja</label>
            <div class="col-sm-10">
            <select id="kerja" class="select2 form-select" data-allow-clear="true" name="unit_kerja">
                <option disbaled >Masukan Unit Kerja</option>
                <option value="Lab MI">Lab MI</option>
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
      <th scope="col">No Identitas</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Nama</th>
      <th scope="col">No.Telp</th>
      <th scope="col">Alamat</th>
      <th scope="col">Unit Kerja</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
    <?php
    $no = 1;
    $data = $this->db->get('tbuser')->result();
    foreach ($data as $value):
    ?>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $value->no_user; ?></td>
        <td><?= $value->username; ?></td>
        <td><?= $value->email; ?></td>
        <td><?= $value->nama_user; ?></td>
        <td><?= $value->no_telp; ?></td>
        <td><?= $value->alamat; ?></td>
        <td><?= $value->unit_kerja; ?></td>
        <td>
        	<button onclick="edit('<?= $value->no_user; ?>')" type="button" class="btn btn-sm btn-primary">
                <label class="ti ti-edit "></label>
            </button>
        	<a onclick="return confirm('apakah yakin dihapus?');" href="<?= base_url('Master/delete/'.$value->no_user) ?>" class="btn btn-sm btn-danger">
				<label class="ti ti-trash"></label>
			</a>
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
  function edit(id) {
        $.ajax({
            url: '<?=  base_url('master/get/') ?>' + id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var data = data[0];
                console.log(data);
                var form = "<?= base_url('master/update/') ?>" + data.no_user;
                $('#form').attr('action', form);
                $('#no_user').val(data.no_user);
                $('#username').val(data.username);
                $('#nama').val(data.nama_user);
                $('#alamat').val(data.alamat);
                $('#no_telp').val(data.no_telp);
                $('#kerja').val(data.unit_kerja);
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