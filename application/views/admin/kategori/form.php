<?php if (isset($id)):
	 echo $id;
	?>
	<div class="mb-4">
		<form action="<?= base_url('Kategori/updateData/'.$id); ?>" method="POST">
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
	
<?php else: ?>
	<div class="mb-4">
		<form action="<?= base_url('Kategori/insertData'); ?>" method="POST">
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
	<?php endif; ?>