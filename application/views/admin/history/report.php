<?php 
setlocale(LC_TIME, 'id_ID'); 
?>


<html>
<head>
	<title>Cetak PDF</title>
</head>
<style>
	th,td{
		padding: 3px;
	}
	h2{
		margin: 15px;
	}
</style>
<body>
<table width="100%">
  <tr>
        <td width="20%px" align="right">
        <img src="<?php echo base_url() ?>assets/img/logo.png" width="90px"/></td>
        <td align="center">
        <font size="3">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RESET, DAN TEKNOLOGI</font> <br/>
        <font size="5"><b>POLITEKNIK NEGERI BALI</b></font><br/>
 		<font size="2">Jalan Kampus Bukit Jimbaran, Kuta Selatan, Kabupaten Badung, Bali - 80364</font> <br/>
 		<font size="2">Telp.(0361)701981 (Hunting) Fax. 701128</font> <br/>
 		<font size="1">Laman : www.pnb.ac.id, Email : poltek@pnb.ac.id </font>
        
        </td>
    </tr> 
</table>

<hr/>

<h2>
	Riwayat Peminjaman
</h2>
<table border="1" width="100%">
    <thead>
      <tr>
        <th>Tanggal Pinjam</th>
        <th>Jumlah Barang</th>
        <th>Jumlah Peminjam</th> 
      </tr>
    </thead>
    <tbody>

    <?php
		if(empty($barang))
		{
			echo "Data Kosong";	
		}
		else
		{
			$no=1;
			foreach ($barang as $p):
	?>
		<tr>
		<th align="center"><?= $p->waktu; ?></th>
		<td align="center"><?= $p->jumlah; ?></td>
		<td align="center"><?= $p->peminjam; ?></td> 
      </tr>
      
     <?php
	 		$no++;
	 		endforeach;
		}
	 ?>
      
      
    </tbody>
  </table>

  <h2>
	Riwayat Penggunaan Barang
  </h2>

  
<table border="1" width="100%">
    <thead>
      <tr>
        <th>No</th> 
        <th>Kode Barang</th>
        <th>Jumlah Penggunaan</th> 
      </tr>
    </thead>
    <tbody>

    <?php
		if(empty($kesimpulan))
		{
			echo "Data Kosong";	
		}
		else
		{
			$no=1;
			foreach ($kesimpulan as $p):
	?>
		<tr>
		<th><?=$no; ?></th>
		<td align="center"><?= $p->kode_barang; ?></td>
		<td align="center"><?= $p->jumlah; ?></td>  
      </tr>
      
     <?php
	 		$no++;
	 		endforeach;
		}
	 ?>
      
      
    </tbody>
  </table>


</body>
</html>
 