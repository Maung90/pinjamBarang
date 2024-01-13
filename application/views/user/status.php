 <?php 
 $data = $this->db->query('SELECT * FROM tb_peminjaman WHERE no_identitas = '.$this->session->userdata('no_identitas'). ' ORDER BY status_peminjaman DESC')->result();
 $data2 = $this->db->query('SELECT * FROM tb_peminjaman WHERE no_identitas = '.$this->session->userdata('no_identitas'). ' ORDER BY status_peminjaman DESC')->result();

 echo $this->session->userdata('notif'); 
 ?>
 <div class="container"> 
  <div class="p-2">
      <div class="row">
        <?php foreach ($data as $d): ?>
          <div class="card my-2 p-3">
            <div class="col-md-12 d-flex justify-content-between"> 
              <label class="fw-bold text-capitalize">
                <?php if ($d->status_peminjaman == 'pending'){ ?> 
                  <span class="fas fa-circle fs-5 text-danger"></span> 
                  <?= $d->status_peminjaman?>
                <?php }else if ($d->status_peminjaman == 'dipinjam'){ ?>
                  <span class="fas fa-circle fs-5 text-success"></span> 
                  <?= $d->status_peminjaman?>
                <?php }else if ($d->status_peminjaman == 'dikembalikan'){ ?>
                  <span class="fas fa-circle fs-5 text-primary"></span> 
                  <?= $d->status_peminjaman?>
                <?php  }else{} ?>  
              </label>
              <span class="fs-6 fw-bold">
                <?=$d->waktu_pinjam;?> 
              </span>
            </div>
            <div class="col-md-12 d-flex justify-content-between align-items-center">
              <span class="fw-bold my-3">
                <?=$d->id_peminjaman;   ?> 
              </span>
              <div>
                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalCenter-<?=$d->id_peminjaman?>">
                  <span class="fa fa-info "></span>
                </button>
                <?php if ($d->status_peminjaman == 'dipinjam'){ ?>
                  <?php 
                  $this->db->select('*')->from('tbnote'); 
                  $this->db->where('tbnote.id_peminjaman', $d->id_peminjaman);
                  $data = $this->db->get();
                  if ($data->num_rows() >= 1) :
                    $photo = $data->row(); ?>
                    <button type="button" class="btn btn-sm btn-outline-danger mx-auto" data-bs-toggle="modal" data-bs-target="#modalPhoto-<?=$d->id_peminjaman?>">
                      <label class="fa fa-eye px-1"></label>
                    </button> 
                  <?php else: ?> 
                    <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalBukti-<?=$d->id_peminjaman?>">
                      <span class="fa fa-camera "></span>
                    </button>
                    <?php 
                  endif;
                }else{}?>
              </div>
            </div> 
            <?php if ($d->status_peminjaman == 'dipinjam'){ ?> 
              <div class="col-md-12">
                <span class="text-danger fs-6">*Kirimkan photo jika admin pengelola tidak ada di tempat</span>
              </div>
            <?php }else{}?>
          </div> 
        <?php endforeach; ?>
      </div>

      <?php foreach ($data2 as $d): ?>
      <!-- Modal -->
      <div class="modal fade" id="modalPhoto-<?=$d->id_peminjaman?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle" style="text-transform: capitalize;">Photo Bukti - <?=$d->id_peminjaman?></h5>
              <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"></button>
            </div>
            <div class="modal-body">  
              <div class="row">
                <div class="col-md-12"> 
                  <div class="card border">
                    <img src="<?=base_url('assets/img/bukti/'.$photo->keterangan)?>" alt="photo bukti" class="img rounded">
                  </div> 
                </div> 
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                Close
              </button> 
            </div>
          </div>
        </div>
      </div>
      <!-- Tutup Modal -->

      <!-- Modal -->
      <div class="modal fade" id="modalCenter-<?=$d->id_peminjaman?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle" style="text-transform: capitalize;"><?=$d->id_peminjaman?></h5>
              <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"></button>
            </div>
            <div class="modal-body">  
              <div class="row">
                <div class="col-md-12">  
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item list-group-item-action d-flex justify-content-around align-items-center fw-bold">
                      Nama Barang
                      <span class="badge bg-primary fw-bold"> Kode Barang</span>
                    </li>
                    <?php 
                    $this->db->select('tb_history.kode_barang,tbbarang.nama_barang')->from('tb_history');
                    $this->db->join('tbbarang', 'tb_history.kode_barang = tbbarang.kode_barang', 'inner');
                    $this->db->where('tb_history.id_peminjaman', $d->id_peminjaman);
                    $barang = $this->db->get()->result(); 
                    foreach ($barang as $b) { ?> 
                      <li class="list-group-item list-group-item-action d-flex justify-content-around align-items-center" style="text-transform:capitalize;">
                        <?=$b->nama_barang;?>  
                        <span class="badge bg-primary"> 
                          <?=$b->kode_barang;?> 
                        </span>
                      </li>
                    <?php } ?>  
                  </ul>
                </div> 
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                Close
              </button> 
            </div>
          </div>
        </div>
      </div>
      <!-- Tutup Modal -->


      <!-- Modal -->
      <form action="<?= base_url('user/note')?>" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="modalBukti-<?=$d->id_peminjaman?>" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle" style="text-transform: capitalize;">Lampirkan bukti</h5>
                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
              </div>
              <div class="modal-body">  
                <div class="row">
                  <div class="col-md-12">  
                    <div class="card mb-4"> 
                      <div class="card-body dropzone needsclick" id="dropzone-basic">
                        <div class="dz-message needsclick">
                          Letakan file  photo disini atau klik tombol upload 
                          <span class="note needsclick" >
                            (Photo yang dikirimkan menjadi <strong>bukti</strong> bahwa telah mengembalikan barang.)
                          </span>
                        </div>
                        <div class="fallback">
                          <input type="hidden" name="id_peminjaman" value="<?=$d->id_peminjaman?>">
                          <input name="file" type="file" />
                        </div>
                      </div>
                    </div>
                  </div> 
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-label-primary">
                  Simpan
                </button>
                <button type="button" class="btn btn-sm  btn-secondary" data-bs-dismiss="modal">
                  Close
                </button> 
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- Tutup Modal -->
      <?php endforeach; ?>
    
  </div>
</div> 