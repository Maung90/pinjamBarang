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
          $id_kategori = $this->db->query("SELECT COUNT(*) AS count FROM tb_order WHERE id_peminjam = 1 AND id_kategori = '$d->id_kategori'")->row();
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
      <form id="peminjamanForm">
        <div class="modal fade" id="modalCenter-<?=$d->id_kategori?>" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle"><?=$d->nama_kategori;?></h5>
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
                    id="jumlah-<?=$d->id_kategori?>"
                    name="jumlah"
                    class="form-control"
                    placeholder="Masukan Jumlah" min="0" max='<?=$d->jumlah_max;?>'/>
                    <span class="text-danger" id="errorMessage"></span>
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
      </form>
      <!-- Tutup Modal -->
    </div> 

    <?php 
  endforeach;
  ?>
</div>
</div>

<script>

  $(document).ready(function(){

    var angkaNotif = 0;
    $('[id^=simpan]').on('click',function(){
      var id = $(this).attr('id').split('-')[1]; 
      if ($.trim($('#jumlah-'+id).val()) === '' || $('#jumlah-'+id).val() == null || $('#jumlah-'+id).val() == 0) {
        $('#errorMessage').html(`<div class="alert alert-danger" role="alert">
          Field Tidak Boleh Kosong!
          </div>`);
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
    });

    $('[id^=id]').on('click',function(){
      if ($(this).hasClass('btn-outline-danger')){
        var id = $(this).attr('id').split('-')[1];

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
  });
</script>
