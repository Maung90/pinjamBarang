<div class="row">
<!-- Basic Layout -->
<div class="col-xxl">
    <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form Barang</h5>
    </div>
    <div class="card-body">
    <?php
        if ($this->session->userdata('pesan')){
            echo $this->session->userdata('pesan');
        }
    ?>
        <form method="POST" action="<?php echo base_url ('Barang/simpanB')?>">
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Kode Barang</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="basic-default-name" name="kode_barang" placeholder="Masukan Kode" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Barang</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="basic-default-name" name="nama_barang" placeholder="Masukan Nama" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Merk Barang</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="basic-default-name" name="merk_barang" placeholder="Masukan Merk" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Status Barang</label>
            <div class="col-sm-10">
            <select class="form-control phone-mask" id="basic-default-name" name="status_barang" placeholder="Masukan Status">
            <option selected disabled>Pilih</option>
            <option value="Tersedia">Tersedia</option>
            <option value="Tidak Tersedia">Tidak Tersedia</option>
            <option value="Dipinjam">Dipinjam</option>
            </select>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Gambar Barang</label>
            <div class="col-sm-10">
            <input
                type="file"
                class="form-control"
                id="basic-default-message"
                name="image"
                placeholder="Masukan Gambar"
            />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Kategori</label>
            <div class="col-sm-10">
            <select class="form-control phone-mask" id="basic-default-name" name="status_barang" placeholder="Masukan Status">
              <option selected disabled>Pilih</option>
              <?php
              $data=$this->db->get('tbkategori')->result();
              foreach ($data as $d):
              ?>
              <option value='<?php echo $d->id_kategori?>'><?php echo $d->nama_kategori?></option>
              <?php
              endforeach;
              ?>
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
<table class="table">
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
    $data = $this->db->get('tbbarang')->result();
    foreach ($data as $value):
    ?>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $value->kode_barang; ?></td>
        <td><?= $value->nama_barang; ?></td>
        <td><?= $value->merk_barang; ?></td>
        <td><?= $value->status_barang; ?></td>
        <td><?= $value->image; ?></td>
        <td><?= $value->id_kategori; ?></td>
        <td>
        	<button type="button" class="btn btn-sm btn-primary">Edit</button>
        	<button type="reset" onclick="hapusBarang(<?php echo $value->kode_barang; ?>)" class="btn btn-sm btn-danger">Hapus</button>
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

<script language="javascript">
  	function hapusBarang(kode_barang)
	{
		if(confirm("Apakah yakin menghapus data ini?"))
		{
			window.open("<?php echo base_url() ?>Barang/hapusBarang/"+kode_barang,"_self");
		}	
	}
</script>