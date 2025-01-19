<?php
include_once 'database.php';
session_start();

$id_admin  = $_SESSION['id_admin'];
$id_petugas = $_POST['id_petugas'];
$no_ktp    = $_POST['no_ktp'];
$nama      = $_POST['nama_petugas'];
$alamat    = $_POST['alamat'];
$no_hp     = preg_replace('/[^0-9]/', '', $_POST['no_hp']); // Hanya angka
$username  = $_POST['username'];
$password  = $_POST['password'];
$password2 = $_POST['password2'];

if ($password !== $password2) {
    echo "<script> 
        alert('Konfirmasi password tidak sesuai');
        javascript:history.back();
    </script>";
} else {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $tambah = $koneksi->prepare("INSERT INTO tbl_petugas(id_petugas, no_ktp, nama, alamat, no_hp, username, password, id_admin)
                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $tambah->bind_param("ssssssss", $id_petugas, $no_ktp, $nama, $alamat, $no_hp, $username, $password, $id_admin);

    if ($tambah->execute()) {
        echo "<script>
            window.alert('Data Berhasil Ditambah!');
            window.location.href='../index.php?m=contents&p=listdatapetugas';
        </script>";
    } else {
        echo "<script> 
            alert('Data Tidak Lengkap & Valid');
            javascript:history.back();
        </script>";
    }
}
?>
