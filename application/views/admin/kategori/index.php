
<<<<<<< HEAD
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
=======
<!-- DataTable with Buttons -->
<div class="card">
	<div class="card-datatable table-responsive pt-0">
		<table class="datatables-basic table" id="table-artikel">
			<thead>
				<tr>
					<th></th>
					<th></th>
					<th>id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Date</th>
					<th>Salary</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<script>
    var tabel = null;
    $(document).ready(function() {
        tabel = $('#table-artikel').DataTable({
            "processing": true,
            "responsive":true,
            "serverSide": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": "<?= base_url('Kategori/get_data');?>", // URL file untuk proses select datanya
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
            "columns": [
                {"data": 'id_artikel',"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }  
                },
                { "data": "judul" }, // Tampilkan judul
                { "data": "kategori" },  // Tampilkan kategori
                { "data": "penulis" },  // Tampilkan penulis
                { "data": "tgl_posting" },  // Tampilkan tgl posting
                { "data": "id_artikel",
                    "render": 
                    function( data, type, row, meta ) {
                        return '<a href="show/'+data+'">Show</a>';
                    }
                },
            ],
        });
    });
</script>
<!-- Modal to add new record -->
<div class="offcanvas offcanvas-end" id="add-new-record">
	<div class="offcanvas-header border-bottom">
		<h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
		<button
		type="button"
		class="btn-close text-reset"
		data-bs-dismiss="offcanvas"
		aria-label="Close"></button>
	</div>
	<div class="offcanvas-body flex-grow-1">
		<form class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
			<div class="col-sm-12">
				<label class="form-label" for="basicFullname">Full Name</label>
				<div class="input-group input-group-merge">
					<span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
					<input
					type="text"
					id="basicFullname"
					class="form-control dt-full-name"
					name="basicFullname"
					placeholder="John Doe"
					aria-label="John Doe"
					aria-describedby="basicFullname2" />
>>>>>>> f984095bffdba630e69c2ac1d4dde606e6dda58c
				</div>
			</div>
		</div>

	</div>