<div class="card">
	<div class="card-header">
		<h4 class="m-0 p-0">Table Peminjam</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive pt-0">
			<table class="table" id="dataTable">
				<thead>
					<tr>
						<th>No</th>
						<th>Identitas</th>
						<th>Waktu Peminjaman</th>
						<th>Waktu Pengembalian</th>
						<th>Disetujui Oleh</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($pinjam as $p) :
						?> 
						<tr>
							<th><?= $p->id_peminjaman; ?></th>
							<td><?= $p->no_identitas; ?></td>
							<td><?= $p->waktu_pinjam; ?></td>
							<td><?= $p->waktu_pengembalian; ?></td>
							<td><?= $p->nama_user; ?></td>
							<td class="fw-bold text-warning" style="text-transform:capitalize;font-size: small;"><?= $p->status_peminjaman; ?></td>
							<td>
								<button type="button" class="btn btn-sm btn-outline-primary mx-auto" id="id-<?=$p->id_peminjaman?>" data-bs-toggle="modal" data-bs-target="#modalCenter-<?=$p->id_peminjaman?>">
									Lihat Detail
								</button> 
							</td>
							<!-- Modal -->
							<div class="modal fade" id="modalCenter-<?=$p->id_peminjaman?>" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modalCenterTitle" style="text-transform: capitalize;"><?=$p->id_peminjaman?></h5>
											<button
											type="button"
											class="btn-close"
											data-bs-dismiss="modal"
											aria-label="Close"></button>
										</div>
										<div class="modal-body">  
											<div class="row">
												<div class="col-md-12">  
													<ul class="list-group list-group-flush">
														<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center fw-bold">
															Nama Barang
															<span class="badge bg-primary fw-bold"> Kode Barang</span>
														</li>
														<?php 
														$this->db->select('tb_history.kode_barang,tbbarang.nama_barang')->from('tb_history');
														$this->db->join('tbbarang', 'tb_history.kode_barang = tbbarang.kode_barang', 'inner');
														$this->db->where('tb_history.id_peminjaman', $p->id_peminjaman);
														$barang = $this->db->get()->result(); 
														foreach ($barang as $b) { ?> 
															<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="text-transform:capitalize;">
																<?=$b->nama_barang;?>  
																<span class="badge bg-primary"> 
																	<?=$b->kode_barang;?> 
																</span>
															</li>
														<?php } ?>  
													</ul>
												</div> 
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-sm btn-label-secondary" data-bs-dismiss="modal">
												Close
											</button> 
										</div>
									</div>
								</div>
							</div>
							<!-- Tutup Modal -->
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
	<script>
		$(document).ready(function(){
			$('#dataTable').DataTable();
		});
	</script>