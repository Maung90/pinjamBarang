
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">DataMaster /</span> Kategori</h4>
<div class="card p-4">
	<?php 
	if ($this->session->userdata('crud')): 
		echo $this->session->userdata('crud'); 
	endif
	?>
	<div class="row">
		<div class="col-md-5"> 
			<div class="mb-4">
				<form action="<?= base_url('Kategori/insertData'); ?>" method="POST" id="form">
					<div class="my-3 px-4 py-3" style="border:1px solid #dbdade;">
						<div>
							<label for="defaultFormControlInput" class="form-label">Nama Kategori</label>
							<input
							type="text"
							class="form-control"
							id="defaultFormControlInput"
							placeholder="Kabel Roll"
							name="nama_kategori"
							aria-describedby="defaultFormControlHelp" required autocomplete="off"/>
							<div id="defaultFormControlHelp" class="form-text"> 
								*Masukan nama kategori barang
							</div>
						</div>
						<div class="mt-3 d-flex justify-content-end">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-7"> 
			<div class="table-responsive pt-0">
				<table class="table-bordered table" id="dataTable">
					<thead>
						<tr>
							<th>No</th>
							<th>Kategori</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no=1;
						$data = $this->db->get('tbkategori')->result();
						foreach ($data as $d) {
							?>
							<tr>
								<th> <?=$no; ?> </th>
								<th>
									<?=$d->nama_kategori;?> 
								</th>
								<th>
									<button type="button" id="update-<?=$d->id_kategori;?>" class="btn btn-sm btn-primary">
										<label class="ti ti-edit "></label>
									</button>
									<button  onclick="hapus(<?=$d->id_kategori;?>)" class="btn btn-sm btn-danger">
										<label class="ti ti-trash"></label>
									</button>
								</th> 
							</tr>
							<?php $no++;} ?>
						</tbody>
					</table> 
				</div>
			</div>
		</div> 
	</div>

	<script>
		$(document).ready(function(){
			$('#dataTable').DataTable();
		});
	</script>
	<script>

		function hapus(id) {
			Swal.fire({
				icon: "question",
				title: "Apakah yakin ingin menghapus data ini?",
				showCancelButton: true,
				confirmButtonText: "Hapus"
			}).then((result) => {
				if (result.isConfirmed) {
					document.location = '<?= base_url('Kategori/deleteData/')?>'+id;
				}
			});
		}


		$(document).ready(function(){

			$('[id^=update]').on('click',function(){
				var id = $(this).attr('id').split('-')[1]; 

				$.ajax({
					url : '<?= base_url('Kategori/get_data/');?>'+id,
					type :'GET',
					dataType : 'json', 
					success : function (response){

						$('#form').attr('action','<?= base_url('Kategori/updateData/')?>'+id); 
						// $('#inputHide').val(response[0]['id_kategori']);
						$('#defaultFormControlInput').val(response[0]['nama_kategori']);	  
					},
					error : function (xhr, status, error) {
						console.error('gagal mengubah form' + error);
					}

				});
			});

		});

	</script>