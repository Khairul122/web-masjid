<?php
include 'koneksidb.php';
include_once 'fungsi.php';

$id_transaksi = $_POST['idtrx'];
$tgl = $_POST['tgl'];
$bank = $_POST['bank'];
$rekening = $_POST['rekening'];
$nama = $_POST['nama_user'];
$jumlah = $_POST['jumlah'];
$status = "tertunda";
$lokasi_file = $_FILES['file']['tmp_name'];
$nama_file = $_FILES['file']['name'];
$folder = "petugas/library/files/$nama_file";

if (strlen($nama) > 50) {
    die("Error: Nama terlalu panjang. Maksimal 50 karakter.");
}

if (!empty($_FILES["file"]["tmp_name"])) {
    $jenis_gambar = $_FILES['file']['type'];
    if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/png") {
        $lampiran = basename($_FILES['file']['name']);

        if (move_uploaded_file($lokasi_file, $folder)) {
            $res = $mysqli->query("SELECT SUM(subtotal) AS total FROM tbl_sementaratrf");
            if ($res) {
                $row = $res->fetch_array();
                $tot = $row['total'];

                $status = "sukses";

                $query = "INSERT INTO tbl_transfer(id_transfer, nama, no_rekening, nama_bank, jumlah, tgl_transfer, image, status) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $tambah = $mysqli->prepare($query);

                if ($tambah) {
                    $tambah->bind_param("ssssssss", $id_transaksi, $nama, $rekening, $bank, $jumlah, $tgl, $lampiran, $status);

                    if ($tambah->execute()) {
                        $ress = $mysqli->query("SELECT id_transfer, id_kategori, subtotal FROM tbl_sementaratrf");
                        while ($r = $ress->fetch_row()) {
                            $mysqli->query("INSERT INTO tbl_detailtransfer VALUES('$r[0]', '$r[1]', '$r[2]')");
                        }

                        $mysqli->query("TRUNCATE TABLE tbl_sementaratrf");
                        echo "<script>window.alert('Transaksi Berhasil'); window.location=('index.php');</script>";
                    } else {
                        echo "Error: " . $mysqli->error;
                    }
                } else {
                    echo "Error prepare: " . $mysqli->error;
                }
            } else {
                echo "Error: " . $mysqli->error;
            }
        } else {
            echo "Gagal mengunggah file.";
        }
    } else {
        echo "Jenis gambar yang Anda kirim salah. Harus .jpg, .gif, atau .png.";
    }
} else {
    echo "Anda belum memilih gambar.";
}
?>
