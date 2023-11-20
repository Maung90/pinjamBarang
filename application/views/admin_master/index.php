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
        <form method="POST" action="<?php echo base_url ('Master/simpanAdmin')?>">
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">No Identitas</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="basic-default-name" name="no_user" placeholder="Masukan No Identitas" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Username</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="basic-default-name" name="username" placeholder="Masukan Username" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-company">Password</label>
            <div class="col-sm-10">
            <input
                type="password"
                class="form-control"
                id="basic-default-company"
                name="password"
                placeholder="Masukan Password" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="basic-default-name" name="nama_user" placeholder="Masukan Nama" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">No.Telepon</label>
            <div class="col-sm-10">
            <input
                type="text"
                id="basic-default-phone"
                class="form-control phone-mask"
                aria-describedby="basic-default-phone"
                name="no_telp" 
                placeholder="Masukan No.Telepon" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Alamat</label>
            <div class="col-sm-10">
            <textarea
                id="basic-default-message"
                class="form-control"
                name="alamat"
                placeholder="Masukan Alamat"
            ></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Unit Kerja</label>
            <div class="col-sm-10">
            <select id="formtabs-Unit" class="select2 form-select" data-allow-clear="true" name="unit_kerja">
                <option disbaled >Masukan Unit Kerja</option>
                <option value="Lab MI">Lab MI</option>
            </select>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
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
        <td><?= $value->nama_user; ?></td>
        <td><?= $value->no_telp; ?></td>
        <td><?= $value->alamat; ?></td>
        <td><?= $value->unit_kerja; ?></td>
        <td>
        	<button type="button" class="btn btn-sm btn-primary">Edit</button>
        	<button type="button" class="btn btn-sm btn-danger">Hapus</button>
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