<?php if (count($data) <=0)  {?>  
	<div align="center" class="m-3">
		<img src="<?=base_url('assets/img/carousel/nf.svg'); ?>" class="w-50 h-50" alt="Not Found ... ">
		<h4 class="ms-5">
			Barang tidak ditemukan ...
		</h4>
	</div>
<?php }else{

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
					src="<?= base_url('assets/img/imgBarang/'.$d->image);?>"
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
			<!-- <form id="peminjamanForm"> -->
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
				<!-- </form> -->
				<!-- Tutup Modal -->
			</div> 

			<?php 
		endforeach;
	} 
	?>


	<script>

		$('[id^=simpan]').on('click',function(response){
			simpanData(response);
		});

		$('[id^=jumlah]').on('keyup',function(response){
			if(event.keyCode == 13){ 
				simpanData(response);
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
					$('#alert-'+id).removeClass('d-none');
					$('#alert-'+id).text('Inputan yang anda masukan melebihi batas!');
					$('#alert-'+id).addClass('d-block'); 
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
				$('#alert-'+id).removeClass('d-none');
				$('#alert-'+id).text('Masukan input dengan benar!');
				$('#alert-'+id).addClass('d-block');
			}
		}
	</script>
