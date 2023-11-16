 <?php 
 $this->session->sess_destroy();
 ?>
 <nav class="navbar navbar-expand bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">  
            <i class="fas fa-suitcase text-white"></i>
            <span class="badge bg-danger rounded-pill badge-notifications" id="notif">0</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row mt-5"> 
    <div class="col-12 d-flex justify-content-end">
      <div class="input-group input-group-merge mt-4 " style="width:60%;">
        <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
        <input
        type="text"
        class="form-control"
        placeholder="Search..."
        aria-label="Search..."
        aria-describedby="basic-addon-search31" />
      </div>
    </div>
  </div>
  <div class="row mt-3 ">
    <?php  
    $result = $this->db->get('tbkategori')->result(); 
        // $id = 1;
    foreach ($result as $data)  :
     ?>
     <div class="col-6 col-lg-3  my-2">
      <div class="card  h-100 w-100">
        <div class="card-body">
          <h5 class="card-title"> <?= $data->nama_kategori;  ?> </h5>
          <img
          class="img-fluid d-flex mx-0 my-2 rounded"
          src="<?= base_url('assets/img/elements/4.jpg'); ?>"
          alt="Card image cap" />
          <button type="button" class="btn btn-sm btn-outline-primary" id="id-<?=$data->id_kategori?>" data-bs-toggle="modal" data-bs-target="#modalCenter-<?=$data->id_kategori?>">
            Pinjam Barang
          </button> 
        </div>
      </div>
      <form id="peminjamanForm">
        <div class="modal fade" id="modalCenter-<?=$data->id_kategori?>" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle"><?=$data->nama_kategori;?></h5>
                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input
                    type="number"
                    id="jumlah-<?=$data->id_kategori?>"
                    name="jumlah"
                    class="form-control"
                    placeholder="Masukan Jumlah" min="0"/>
                    <input type="hidden" id='idKategori-<?=$data->id_kategori?>' name="idKategori" value="<?=$data->id_kategori?>">
                  </div>
                  <div class="col-12 text-secondary" style="font-size:0.8rem">
                    *Stok Tersedia : 8
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                  Close
                </button>
                <button type="button" class="btn btn-primary" id="simpan-<?=$data->id_kategori?>">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div> 

    <?php 
  endforeach;
  ?>
</div>
</div>


<section id="adv-footer"> 
  <footer class="footer bg-light">
    <div class="container-fluid container-p-x pt-3 pb-2">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3 mb-4 mb-sm-0">
          <h4 class="fw-bolder mb-3">
            <a
            href="#"
            target="_blank"
            class="footer-text"
            >Politeknik Negeri Bali
          </a>
        </h4>
        <div class="col-12 col-sm-6 col-md-3 mb-4 mb-md-0">
          <h5>Contact</h5>
          <ul class="list-unstyled">
            <li><a href="javascript:void(0)" class="footer-link d-block pb-2">Admin I </a></li> 
          </div> 
          <p class="pt-4">
            <script>
              document.write(new Date().getFullYear());
            </script>
            © Team2One
          </p>
        </div>
      </div>
    </div>
  </footer>
</section>

<!-- </div> -->

<script>

  $(document).ready(function(){

    var angkaNotif = 0;
    $('[id^=simpan]').on('click',function(){
      var id = $(this).attr('id').split('-')[1]; 
      var data = { 
        idKategori : $('#idKategori-'+id).val(),
        jumlah : $('#jumlah-'+id).val()
      };
      $.ajax({
        url : '<?= base_url('Kategori/proses_session');?>',
        type : 'POST',
        data : data,
        success : function (response){ 
          $('#notif').text(response);
          $('#jumlah-'+id).val('0');
        },
        error : function (xhr, status, error) {
          console.error('gagal mengubah sesi' + error);
        }

      });
    });

  });

</script>
