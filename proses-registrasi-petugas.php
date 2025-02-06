<?php
include "koneksidb.php";

if (isset($_POST["registerPetugas"])) {
    $id_petugas = 'PT-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
    $no_ktp = $mysqli->escape_string($_POST["no_ktp"]);
    $nama = $mysqli->escape_string($_POST["nama"]);
    $alamat = $mysqli->escape_string($_POST["alamat"]);
    $no_hp = $mysqli->escape_string($_POST["no_hp"]);
    $username = $mysqli->escape_string($_POST["username"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $id_admin = "AD-002";

    // Validasi panjang no_ktp
    if (!preg_match('/^\d{1,16}$/', $no_ktp)) {
        echo "<script>alert('No KTP harus berupa angka dengan maksimal 16 digit!'); window.location.href='administrator.php';</script>";
        exit;
    }

    // Check if username already exists
    $checkUser = $mysqli->query("SELECT * FROM tbl_petugas WHERE username = '$username'");
    if ($checkUser->num_rows > 0) {
        echo "<script>alert('Username sudah digunakan!'); window.location.href='administrator.php';</script>";
        exit;
    }

    // Insert new petugas
    $sql = "INSERT INTO tbl_petugas (id_petugas, no_ktp, nama, alamat, no_hp, username, password, id_admin) 
            VALUES ('$id_petugas', '$no_ktp', '$nama', '$alamat', '$no_hp', '$username', '$password', '$id_admin')";

    if ($mysqli->query($sql)) {
        echo "<script>alert('Registrasi berhasil!'); window.location.href='administrator.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan, coba lagi!'); window.location.href='administrator.php';</script>";
    }
}
?>
