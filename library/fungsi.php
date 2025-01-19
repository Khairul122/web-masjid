<?php

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}



function idpg(){
	$kon = mysqli_connect("localhost", "root", "", "db_masjid");
	$query  = "SELECT max(id_pengeluaran) as maxID FROM tbl_pengeluaran";
	$tampil = mysqli_query($kon,$query);
	$data   = mysqli_fetch_array($tampil);
	$idPG  = $data['maxID'];
	$noUrut  = (int) substr($idPG,3,3);
	$noUrut++;
	
	$char    = "PG";
	$newPG   = $char.sprintf("-%03s", $noUrut); 

	echo $newPG;
}


?>
