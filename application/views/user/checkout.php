<?php 

$jumlah = 0;
?>
<nav class="navbar navbar-expand bg-primary">
  <div class="container">
    <a class="navbar-brand" href="<?=base_url('User/')   ?> ">Navbar</a>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=base_url('User/')?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Info</a>
        </li> 
      </ul>
    </div>
  </div>
</nav>

<div class="container"> 
  <?php if ($data = $this->session->userdata('session')): ?>
    <div class="accordion mt-3 " id="accordionExample">
      <?php 
      foreach ($data as $d ): ?>
        <div class="card accordion-item">
          <h2 class="accordion-header" id="<?=$d['id_Kategori'];?>">
            <button type="button" class="accordion-button collapsed d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#accordion-<?=$d['id_Kategori'];?>"  aria-expanded="false" aria-controls="accordion-<?=$d['id_Kategori'];?>">
              <img class="img-fluid d-flex me-2 rounded" src="<?= base_url('assets/img/elements/4.jpg'); ?>" alt="Card image cap" style="width:8%;"/>
              <?=$d['nama_kategori'];?> 
            </button>
          </h2>
          <div id="accordion-<?=$d['id_Kategori'];?>" class="accordion-collapse collapse" aria-labelledby="<?=$d['id_Kategori'];?>" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <span class="mx-1">
                jumlah barang : <?=$d['jumlah'];?> 
              </span>
            </div>
          </div>
        </div> 
        <?php 
        $jumlah +=$d['jumlah']; 
      endforeach; 
      ?>
    </div>
  <?php else: ?>
    <div class="d-flex justify-content-center align-items-center gap-2" style="height: 70vh;color:#E4E4E4;">
      <label class="fa-solid fa-face-dizzy" style="font-size: 8rem;"></label>
      <span style="font-size: 2rem;">Belum ada barang di wishlist </span>
    </div>
  <?php endif ?>



</div>


<section id="basic-footer" style="position:fixed;bottom: 0;z-index: 2;width: 100%;"> 
  <footer class="footer bg-light">
    <div class="container">
      <div class="container-fluid d-flex flex-md-row flex-column align-items-md-center gap-1 container-p-x py-3">
        <div class="d-flex justify-content-between align-items-center w-100">
          <div class="footer-text" style="width: 65%;">
            <label class="footer-text fw-bolder">Checkout Barang</label>
            <p>
              Total : <span class="ms-1 fw-bold"><?= $jumlah  ?> </span>
            </p>
          </div> 
          <div>
            <button class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#modalCenter">
              Checkout
            </button>
          </div>
        </div>
      </div>
    </div>
  </footer>
</section>

<?php if ($data = $this->session->userdata('session')): ?>
  <!-- Modal -->
  <form method="POST" action="<?=base_url('User/ProsesCheckout/') ?>">
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">
              Waktu Pengembalian
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="mb-3 row">
                  <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Datetime</label>
                  <div class="col-md-10">
                    <input class="form-control" type="datetime-local" name="Waktu-Pengembalian" value="2021-06-18T12:30:00" id="html5-datetime-local-input" />
                    <input type="hidden" name="jumlah" value="<?=$jumlah  ?> " >    
                  </div>
                </div>
              </div> 
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-label-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- Tutup Modal -->
  <?php endif; ?>