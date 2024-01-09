<?php 

$jumlah = intval($total); 
?>
<div class="container"> 
  <?php  
  if ($this->session->flashdata('checkout')) {
    echo $this->session->flashdata('checkout'); 
    echo '<script>
    window.open("'.base_url("User/Status/").'","_self");
    </script>';
  }
  if ( $jumlah > 0) : 
    ?>
    <div class="accordion mt-3 " id="accordionExample">
      <?php foreach ($data as $d): ?>
        <div class="card accordion-item">
          <h2 class="accordion-header" id="<?=$d->id_kategori;?>">
            <button type="button" class="accordion-button collapsed d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#accordion-<?=$d->id_kategori;?>"  aria-expanded="false" aria-controls="accordion-<?=$d->id_kategori;?>"> 
              <img class="img-fluid d-flex me-2 rounded" src="<?= base_url('assets/img/elements/4.jpg'); ?>" alt="Card image cap" style="width:8%;"/>
              <?=$d->nama_kategori;?>
            </button>
          </h2>
          <div id="accordion-<?=$d->id_kategori;?>" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="d-flex align-items-center justify-content-center gap-1">
                <span class="fa-solid fa-circle-minus cursor-pointer fs-4 text-primary" id="<?=$d->id_order;?>"></span>
                <input class="text-center py-1 mx-1 rounded-1" id="inputValue-<?=$d->id_order;?>" type="text" value="<?=$d->jumlah;?>" 
                max="<?=$d->jumlah_max;?> " disabled style="width:13%;color:#808080;background: none;background-color: #F3F3F3;border:none;border: 1px solid #E1E0E0;">
                <span class="fa-solid fa-circle-plus cursor-pointer fs-4 text-primary" id="<?=$d->id_order;?>"></span>
              </div>
              <span class="text-secondary">
                *Jumlah tersedia : <?=$d->jumlah_max;?>
              </span>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  <?php else: ?>
    <div class="d-flex justify-content-center align-items-center gap-2" style="height: 70vh;color:#E4E4E4;">
      <label class="fa-solid fa-face-dizzy" style="font-size: 8rem;" onclick="berhasil();"></label>
      <span style="font-size: 2rem;">Belum ada barang yang di order </span>
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
              Total : <span class="ms-1 fw-bold" id="jumlahtxt"><?= $jumlah  ?> </span>
            </p>
          </div> 
          <div>
            <?php if ($jumlah > 0) : ?>
              <button class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#modalCenter">
                Checkout
              </button>
            <?php else: ?>
              <button class="btn btn-success">
                Checkout
              </button>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </footer>
</section>
<!-- Modal -->
<form method="POST" id="form-checkout">
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
                <label for="waktuPengembalian" class="col-md-2 col-form-label">Datetime</label>
                <div class="col-md-10">
                  <input class="form-control" type="datetime-local" required name="Waktu-Pengembalian" id="waktuPengembalian" />
                </div>
              </div>
            </div> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-label-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-sm btn-primary" id="save">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- Tutup Modal -->


<script> 
  $(document).ready(function(){
    $('#waktuPengembalian').on('input',()=>{
      if(new Date().getTime() >= new Date($('#waktuPengembalian').val()).getTime()){
        $('#form-checkout').attr('action','');
        $('#save').attr('type','button');
      }else{
        $('#form-checkout').attr('action','<?=base_url('User/ProsesCheckout/') ?>');
        $('#save').attr('type','submit'); 
      }
    });

    $('#save').on('click',()=>{ 
      if ($.trim($('#waktuPengembalian').val()) != '' && $.trim($('#waktuPengembalian').val()) != null) {
        if(new Date().getTime() > new Date($('#waktuPengembalian').val()).getTime()){ 
          toastr.error("Waktu yang anda masukan salah!", 'Error', {
            closeButton: true,
            tapToDismiss: false,
            progressBar: true
          });
        } 
      }
    });
    $('.fa-circle-minus').on('click',function(){ 
      var id_order = $(this).attr('id');
      if ( $('#inputValue-'+id_order).val() > 0) {
        $.ajax({
          url : '<?= base_url('User/update_order_minus/');?>'+id_order,
          type : 'POST',
          dataType: 'json',
          success : function (response){ 
           if (response['status'] == false) {
            console.error('Tidak boleh kurang dari nol');
          }else{ 
            $('#inputValue-'+id_order).val(response['jumlah_order']);
            $('#jumlahtxt').text(response['jumlah_total']);
          }
        },
        error : function (xhr, status, error) {
          console.error('gagal mengurangi  ' + error);
        }

      });
      }
    }); 

    $('.fa-circle-plus').on('click',function(){ 
      var id_order = $(this).attr('id');
      if ( $('#inputValue-'+id_order).val() >= 0) {
        $.ajax({
          url : '<?= base_url('User/update_order_plus/');?>'+id_order,
          type : 'POST',
          dataType: 'json',
          success : function (response){ 
            if (response['status'] == false) {
              console.error('Melebihi jumlah tersedia');
            }else{ 
              $('#inputValue-'+id_order).val(response['jumlah_order']);
              $('#jumlahtxt').text(response['jumlah_total']);
            }
          },
          error : function (xhr, status, error) {
            console.error('gagal menambah  ' + error);
          }

        });
      }
    });

  }); 
</script>