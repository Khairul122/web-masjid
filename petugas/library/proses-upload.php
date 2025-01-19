<?php
include "database.php";
if (isset($_POST['kirim'])) {
    // Ambil informasi file
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $nama_file = $_FILES['fupload']['name'];
    $ukuran_file = $_FILES['fupload']['size'];
    $tipe_file = $_FILES['fupload']['type'];

    session_start();
    $idpetugas = $_SESSION['id_petugas'];
    $tgl = date('Ymd');

    // Folder tujuan upload
    $folder = "files/";

    // Periksa apakah folder tujuan ada
    if (!is_dir($folder)) {
        mkdir($folder, 0755, true); // Buat folder jika belum ada
    }

    // Path lengkap file yang diunggah
    $path_file = $folder . basename($nama_file);

    // Validasi file (jenis dan ukuran)
    $allowed_types = ['image/jpeg', 'image/png', 'application/pdf'];
    $max_size = 2 * 1024 * 1024; // 2MB

    if (!in_array($tipe_file, $allowed_types)) {
        echo "<script>
                alert('Jenis file tidak diizinkan. Hanya JPG, PNG, atau PDF.');
                window.location.href=('../index.php?m=contents&p=album');
              </script>";
        exit;
    }

    if ($ukuran_file > $max_size) {
        echo "<script>
                alert('Ukuran file terlalu besar. Maksimal 2MB.');
                window.location.href=('../index.php?m=contents&p=album');
              </script>";
        exit;
    }

    // Proses upload file
    if (move_uploaded_file($lokasi_file, $path_file)) {
        // Simpan informasi file ke database
        $query = $koneksi->prepare("INSERT INTO tbl_album (id_petugas, file_name, tgl_upload) VALUES (?, ?, ?)");
        $query->bind_param("sss", $idpetugas, $nama_file, $tgl);

        if ($query->execute()) {
            echo "<script>
                    alert('Berhasil diunggah!');
                    window.location.href=('../index.php?m=contents&p=album');
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menyimpan data ke database.');
                    window.location.href=('../index.php?m=contents&p=album');
                  </script>";
        }
    } else {
        echo "<script>
                alert('Gagal mengunggah file.');
                window.location.href=('../index.php?m=contents&p=album');
              </script>";
    }
}

// Proses hapus file
if (isset($_GET['del'])) {
    $id_album = $_GET['del'];

    // Hapus file dari database dan server
    $query = $koneksi->prepare("SELECT file_name FROM tbl_album WHERE id_album = ?");
    $query->bind_param("i", $id_album);
    $query->execute();
    $query->bind_result($file_name);
    $query->fetch();
    $query->close();

    if ($file_name && file_exists("files/$file_name")) {
        unlink("files/$file_name"); // Hapus file dari server
    }

    $delete = $koneksi->prepare("DELETE FROM tbl_album WHERE id_album = ?");
    $delete->bind_param("i", $id_album);
    if ($delete->execute()) {
        echo "<script>
                alert('File berhasil dihapus.');
                window.location.href=('../index.php?m=contents&p=album');
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus file.');
                window.location.href=('../index.php?m=contents&p=album');
              </script>";
    }
}
?>
