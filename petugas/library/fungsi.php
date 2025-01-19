<?php

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}

function idpm() {
    $conn = mysqli_connect("localhost", "root", "", "db_masjid");

    // Periksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Query untuk mendapatkan ID maksimum
    $query  = "SELECT max(id_pemasukan) as maxID FROM tbl_pemasukan";
    $tampil = mysqli_query($conn, $query);

    if ($tampil) {
        $data   = mysqli_fetch_array($tampil);
        $idPM   = $data['maxID'];

        // Periksa apakah $idPM null
        if ($idPM === null) {
            $noUrut = 1; // Jika tabel kosong, mulai dari 1
        } else {
            $noUrut = (int) substr($idPM, 3, 3); // Ambil angka dari ID terakhir
            $noUrut++;
        }

        $char    = "PM";
        $newPM   = $char . sprintf("-%03s", $noUrut);

        echo $newPM;
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
}

function idpg() {
    $kon = mysqli_connect("localhost", "root", "", "db_masjid");

    // Periksa koneksi
    if (!$kon) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Query untuk mendapatkan ID maksimum
    $query  = "SELECT MAX(id_pengeluaran) AS maxID FROM tbl_pengeluaran";
    $tampil = mysqli_query($kon, $query);
    $data   = mysqli_fetch_array($tampil);

    $idPG = $data['maxID'];

    // Periksa apakah $idPG null
    if ($idPG === null) {
        $noUrut = 1; // Jika tabel kosong, mulai dari 1
    } else {
        $noUrut = (int) substr($idPG, 3, 3); // Ambil angka dari ID terakhir
        $noUrut++;
    }

    $char  = "PG";
    $newPG = $char . sprintf("-%03s", $noUrut);

    // Tutup koneksi
    mysqli_close($kon);

    // Kembalikan ID baru
    return $newPG;
}



?>
