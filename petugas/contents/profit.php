<?php
// Redirect jika tidak ada sesi aktif
if (!isset($_SESSION["username_petugas"])) {
    header("Location: ../administrator.php");
    exit();
}

// Sertakan file database dan fungsi
include_once "library/database.php";
include_once "library/fungsi.php";
?>

<div class="inner" style="min-height: 700px;">
    <div class="row">
        <div class="col-lg-12">
            <h1>Profit Kas Masjid</h1>
        </div>
    </div>
    <hr />

    <!-- ISI KONTEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-clock-o fa-fw"></i> Total Dana Masjid yang telah terkumpul
                </div>
                <div class="panel-body">
                    <ul class="timeline">
                        <?php
                        // Query untuk menghitung total dana termasuk kategori tanpa transaksi
                        $query = "
                            SELECT 
                                tbl_kategori.id_kategori, 
                                tbl_kategori.nama_kategori, 
                                COALESCE(SUM(tbl_detailpemasukan.jumlah), 0) AS total
                            FROM tbl_kategori
                            LEFT JOIN tbl_detailpemasukan 
                                ON tbl_kategori.id_kategori = tbl_detailpemasukan.id_kategori
                            GROUP BY tbl_kategori.id_kategori, tbl_kategori.nama_kategori";
                        $tampil = $koneksi->query($query);

                        // Periksa apakah ada data
                        if ($tampil->num_rows > 0) {
                            // Loop melalui data
                            while ($row = $tampil->fetch_assoc()) {
                                $id_kategori = $row['id_kategori'];
                                $nama_kategori = $row['nama_kategori'];
                                $total = $row['total'];

                                // Konversi $id_kategori ke integer untuk modulus
                                $timelineClass = (intval(substr($id_kategori, -1)) % 2 === 0) ? "timeline-inverted" : "";
                                $badgeClass = (intval(substr($id_kategori, -1)) % 2 === 0) ? "info" : "warning";
                                $iconClass = (intval(substr($id_kategori, -1)) % 2 === 0) ? "icon-smile" : "icon-thumbs-up";

                                // Cetak elemen timeline
                                echo "
                                <li class='$timelineClass'>
                                    <div class='timeline-badge $badgeClass'>
                                        <i class='$iconClass'></i>
                                    </div>
                                    <div class='timeline-panel'>
                                        <div class='timeline-heading'>
                                            <h4 class='timeline-title'>$nama_kategori</h4>
                                            <p>
                                                <small class='text-muted'><i class='icon-money icon-1x'></i> Total uang yang sudah terkumpul senilai</small>
                                            </p>
                                        </div>
                                        <div class='timeline-body'>
                                            <span class='badge'>" . rupiah($total) . "</span>
                                        </div>
                                    </div>
                                </li>";
                            }
                        } else {
                            // Jika tidak ada data
                            echo "
                            <li>
                                <div class='timeline-panel'>
                                    <div class='timeline-heading'>
                                        <h4 class='timeline-title'>Belum Ada Data</h4>
                                    </div>
                                </div>
                            </li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR KONTEN -->
</div>
