<?php
include_once 'database.php';
include_once 'fungsi.php';

if (isset($_POST['proses'])) {
    session_start();

    // Periksa apakah id_petugas tersedia di sesi
    if (!isset($_SESSION['id_petugas'])) {
        echo "<script>
            alert('ID Petugas tidak ditemukan. Silakan login ulang.');
            window.location = '../index.php?m=contents&p=login';
        </script>";
        exit;
    }

    $idpm = $_POST['idpm'];
    $nama = $_POST['nama'];
    $tgl = $_POST['tgl'];
    $idpetugas = $_SESSION['id_petugas'];
    $iduser = null; // Isi kolom id_user dengan NULL

    // Menghitung total dari tabel sementara
    $res = $koneksi->query("SELECT SUM(jumlah) AS total FROM tbl_sementara");
    $row = $res->fetch_assoc();
    $tot = $row['total'];

    // Memasukkan data ke tabel tbl_pemasukan
    $tambah = $koneksi->prepare("INSERT INTO tbl_pemasukan(id_petugas, id_pemasukan, nama, tgl_pemasukan, totalbayar, id_user) VALUES (?, ?, ?, ?, ?, ?)");
    $tambah->bind_param("ssssss", $idpetugas, $idpm, $nama, $tgl, $tot, $iduser);

    if ($tambah->execute()) {
        // Memindahkan data dari tbl_sementara ke tbl_detailpemasukan
        $res = $koneksi->query("SELECT id_kategori, jumlah FROM tbl_sementara");
        while ($r = $res->fetch_assoc()) {
            $detail = $koneksi->prepare("INSERT INTO tbl_detailpemasukan(id_pemasukan, id_kategori, jumlah) VALUES (?, ?, ?)");
            $detail->bind_param("sss", $idpm, $r['id_kategori'], $r['jumlah']);
            $detail->execute();
        }

        // Mengosongkan tabel sementara
        $koneksi->query("TRUNCATE TABLE tbl_sementara");

        echo "<script>
            window.alert('Transaksi Berhasil');
            window.location = '../index.php?m=contents&p=view-pembayaran';
        </script>";
    } else {
        echo "<script>
            window.alert('Gagal Menambahkan Data Transaksi');
            window.location = '../index.php?m=contents&p=view-pembayaran';
        </script>";
    }
}
?>
