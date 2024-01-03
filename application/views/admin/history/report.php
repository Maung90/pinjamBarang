<?php 
$this->db->select("DATE_FORMAT(tb_peminjaman.waktu_pinjam, '%d %b %Y %H:%i:%s') as waktu_pinjam2, DATE_FORMAT(tb_peminjaman.waktu_pengembalian, '%d %b %Y %H:%i:%s') as waktu_pengembalian2,tb_history.kode_barang, tb_peminjaman.id_peminjaman,tb_peminjaman.no_identitas, tb_peminjaman.approved_by, tbuser.nama_user");
$this->db->from('tb_history'); 
$this->db->join('tb_peminjaman', 'tb_peminjaman.id_peminjaman = tb_history.id_peminjaman', 'inner');
$this->db->join('tbuser', 'tb_peminjaman.approved_by = tbuser.no_user', 'inner');
$this->db->where('tb_peminjaman.status_peminjaman','dikembalikan');
$this->db->where('tb_peminjaman.waktu_pinjam >=',date('Y-m-01'));
$this->db->where('tb_peminjaman.waktu_pinjam <=',date('Y-m-d'));
$this->db->order_by('tb_peminjaman.waktu_pinjam', 'DESC'); 
$barang = $this->db->get()->result();  

setlocale(LC_TIME, 'id_ID'); 
?> 
		<div class="container d-print"> 
			<div class="card">
				<div class="card-header">
					<div class="text-center"> 
						<h3 align="center">POLITEKNIK NEGERI BALI</h3>  
						<h3 align="center">Laporan Peminjaman</h3>  
						<h4 align="center">Lab MI - <?= strftime('%B %Y');?></h4> 
					</div>
				</div>
				<div class="card-body">  
					<div class="table-responsive pt-0">
						<table class="table" id="dataTable" border="1" >
							<thead>
								<tr>
									<th align="center">No</th>
									<th align="center">No Identitas</th>
									<th align="center">Waktu Peminjaman</th>
									<th align="center">Waktu Pengembalian</th>
									<th align="center">Disetujui Oleh</th> 
									<th align="center">Kode Barang</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach ($barang as $p) :
									?> 
									<tr>
										<th align="center"><?= $p->id_peminjaman; ?></th>
										<td align="center"><?= $p->no_identitas; ?></td>
										<td align="center"><?= $p->waktu_pinjam2; ?></td>
										<td align="center"><?= $p->waktu_pengembalian2; ?></td>
										<td align="center"><?= $p->nama_user; ?></td> 
										<th align="center"><?= $p->kode_barang; ?></th> 
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div> 
				</div>
			</div>
		</div> 
	</div> 

 