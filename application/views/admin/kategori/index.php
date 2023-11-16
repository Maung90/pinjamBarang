
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">DataMaster /</span> Kategori</h4>
<div class="card p-4">
	<?php 
	if ($this->session->userdata('crud')): 
		echo $this->session->userdata('crud'); 
	endif
	?>
	<div class="row">
		<div class="col-5"> 
			<div class="mb-4">
				<form action="<?= base_url('Kategori/insertdata'); ?>" method="POST">
					<div class="my-3 px-4 py-3" style="border:1px solid #dbdade;">
						<div>
							<label for="defaultFormControlInput" class="form-label">Nama Kategori</label>
							<input
							type="text"
							class="form-control"
							id="defaultFormControlInput"
							placeholder="Kabel Roll"
							name="nama_kategori"
							aria-describedby="defaultFormControlHelp" />
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
		<div class="col-7"> 
			<div class="table-responsive pt-0 my-3">
				<table class="table-bordered table">
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
									<a href="#" class="btn btn-sm btn-primary">edit</a>
									<a href="<?= base_url('Kategori/deleteData/'.$d->id_kategori) ?>" class="btn btn-sm btn-danger">hapus</a>
								</th>
							</tr>
							<?php $no++;} ?>
						</tbody>
					</table> 
				</div>
			</div>
		</div>

	</div>