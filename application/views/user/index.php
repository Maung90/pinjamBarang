
<div class="container-fluid m-0 p-0" style="height: 40vh;">
  <div id="carouselExample" class="carousel slide " data-bs-ride="carousel">
    <ol class="carousel-indicators">
      <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
      <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item vw-100 active">
        <img class="d-block" width="100%" height="250px" src="11145.jpg" alt="First slide" />
        <div class="carousel-caption d-none d-md-block">
          <h4>First slide</h4>
          <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p>
        </div>
      </div>
      <div class="carousel-item vw-100" >
        <img class="d-block" width="100%" height="250px" src="11145.jpg" alt="Second slide" />
        <div class="carousel-caption d-none d-md-block">
          <h4>Second slide</h4>
          <p>In numquam omittam sea.</p>
        </div>
      </div>
      <div class="carousel-item vw-100">
        <img class="d-block" width="100%" height="250px" src="11146.jpeg" alt="Third slide" />
        <div class="carousel-caption d-none d-md-block">
          <h4>Third slide</h4>
          <p>Lorem ipsum dolor sit amet, virtute consequat ea qui, minim graeco mel no.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </a>
  </div>
</div>

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
        id="Search"
        aria-describedby="basic-addon-search31" />
      </div>
    </div>
  </div>
  <div class="row mt-3" id="result">
    <?php   
    foreach ($data as $d)  :
     ?>
     <div class="col-6 col-lg-3  my-2">
      <div class="card  h-100 w-100">
        <div class="card-header fw-bold my-0" style="text-transform: capitalize;">
          <?= $d->nama_kategori;  ?> 
        </div>
        <div class="card-body my-0">
          <img
          class="img-fluid d-flex rounded mb-3"
          src="<?= base_url('assets/img/elements/4.jpg'); ?>"
          alt="Card image cap" />
          <?php
          $id_kategori = $this->db->query("SELECT COUNT(*) AS count FROM tb_order WHERE id_peminjam = '".$this->session->userdata('no_identitas')."' AND id_kategori = '$d->id_kategori'")->row();
          if (intval($id_kategori->count) > 0): ?>
            <button type="button" class="btn btn-sm btn-outline-danger mx-auto" id="id-<?=$d->id_kategori?>">
              Batal
            </button>  
          <?php else: ?>
            <button type="button" class="btn btn-sm btn-outline-primary mx-auto" id="id-<?=$d->id_kategori?>" data-bs-toggle="modal" data-bs-target="#modalCenter-<?=$d->id_kategori?>">
              Pinjam Barang
            </button> 
          <?php endif ?>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="modalCenter-<?=$d->id_kategori?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle" style="text-transform: capitalize;"><?=$d->nama_kategori;?></h5>
              <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"></button>
            </div>
            <div class="modal-body"> 
              <div class="alert alert-danger d-none" id="alert-<?=$d->id_kategori?>" role="alert" >

              </div>
              <div class="row">
                <div class="col-12">
                  <label for="jumlah" class="form-label">Jumlah</label>
                  <input
                  type="number"
                  id="jumlah-<?=$d->id_kategori?>"
                  name="jumlah"
                  class="form-control"
                  placeholder="Masukan Jumlah" min="0" max='<?=$d->jumlah_max;?>'/> 
                </div>
                <div class="col-12 text-secondary" style="font-size:0.8rem">
                  *Stok Tersedia : <?=$d->jumlah_max;?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-label-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="button" class="btn btn-sm btn-primary" id="simpan-<?=$d->id_kategori?>">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Tutup Modal -->
    </div> 

    <?php 
  endforeach;
  ?>
</div>
</div>

<script>

  $(document).ready(function(){
    const no_identitas = "<?= $this->session->userdata('no_identitas')?>" ? "<?= $this->session->userdata('no_identitas')?>"  : null;
    $('#Search').on('input',function(){
      
        $.ajax({
          url : '<?= base_url('User/searching/');?>'+$.trim($(this).val()),
          type : 'GET',  
          // dataType :'html',
          success : function (response){
            console.log(response);
            $('#result').html(response);
          },
          error : function (xhr, status, error) {
            console.error('gagal mendapatkan hasil ' + error);
          } 
        });  
    });


    $('[id^=simpan]').on('click',function(response){
      if ( no_identitas != null) {
        simpanData(response);
      }else{
        toastr.error("Silahkan login terlebih dahulu!", 'Error', {
          closeButton: true,
          tapToDismiss: false,
          progressBar: true
        });
      }
    });

    $('[id^=jumlah]').on('keyup',function(response){
      if(event.keyCode == 13){ 
        if ( no_identitas != null) {
          simpanData(response);
        }else{
          toastr.error("Silahkan login terlebih dahulu!", 'Error', {
            closeButton: true,
            tapToDismiss: false,
            progressBar: true
          });
        }
      }
    });

    $('[id^=id]').on('click',function(){
      const id = $(this).attr('id').split('-')[1];

      $('#alert-'+id).addClass('d-none');
      $('#alert-'+id).removeClass('d-block'); 
      if ($(this).hasClass('btn-outline-danger')){

        var data = {
          id_kategori : id,
        };
        $.ajax({
          url : '<?= base_url('User/delete_order');?>',
          type : 'POST',
          data : data,
          success : function (response){ 
            $('#notif').text(response);
            $('#id-'+id).attr('data-bs-toggle','modal');
            $('#id-'+id).attr('data-bs-target','#modalCenter-'+id);
            $('#id-'+id).addClass('btn-outline-primary');
            $('#id-'+id).text('Pinjam Barang');
            $('#id-'+id).removeClass('btn-outline-danger');
          },
          error : function (xhr, status, error) {
            console.error('gagal mengubah sesi' + error);
          }

        });

      }
    }); 

    function simpanData(response) { 
      const id = $(response.target).attr('id').split('-')[1]; 
      if ($.trim($('#jumlah-'+id).val()) != '' && $('#jumlah-'+id).val() != null && $('#jumlah-'+id).val() != 0) { 
       if ($('#jumlah-'+id).val() > parseInt($('#jumlah-'+id).attr('max')) ) { 
        toastr.error("Inputan yang anda masukan melebihi batas!", 'Error', {
          closeButton: true,
          tapToDismiss: false,
          progressBar: true
        });
      }else{
        var data = { 
          id_kategori :id,
          jumlah : $('#jumlah-'+id).val(),
        };
        $.ajax({
          url : '<?= base_url('User/proses_order');?>',
          type : 'POST',
          data : data,
          success : function (response){ 
            $('#notif').text(response);
            $('#jumlah-'+id).val('0');
            $('#id-'+id).addClass('btn-outline-danger');
            $('#id-'+id).text('Batal');
            $('#id-'+id).removeClass('btn-outline-primary');
            $('#id-'+id).removeAttr('data-bs-toggle');
            $('#id-'+id).removeAttr('data-bs-target');
            $('.modal, .fade').modal('hide');
          },
          error : function (xhr, status, error) {
            console.error('gagal mengubah sesi' + error);
          } 
        });  
      }
    }else{
      toastr.error("masukan inputan dengan benar!", 'Error', {
        closeButton: true,
        tapToDismiss: false,
        progressBar: true
      });
    }
  }
});
</script>
