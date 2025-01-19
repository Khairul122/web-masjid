<?php
if (!isset($_SESSION["username_petugas"]))
    header("Location: ../administrator.php");
?>
<?php include_once "library/database.php"; ?>
<?php include_once "library/fungsi.php"; ?>
<div class="inner" style="min-height: 700px;">
    <div class="row">
        <div class="col-lg-12">
            <h1>Dashboard</h1>
        </div>
    </div>
    <hr />
    <!--BLOCK SECTION -->
    <div class="row">
        <div class="col-lg-12">
            <div style="text-align: center;">

                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="icon-user-md icon-5x"></i>
                            <?php
                            // Koneksi ke database
                            $conn1 = mysqli_connect("localhost", "root", "", "db_masjid");

                            // Periksa koneksi
                            if (!$conn1) {
                                die("Koneksi gagal: " . mysqli_connect_error());
                            }

                            // Query untuk menghitung jumlah pengguna
                            $query1 = "SELECT COUNT(*) AS jml1 FROM tbl_user";
                            $sql1 = mysqli_query($conn1, $query1);

                            // Periksa hasil query
                            if ($sql1) {
                                $row1 = mysqli_fetch_assoc($sql1); // Ambil hasil query
                                $jml1 = $row1['jml1']; // Jumlah pengguna
                            } else {
                                $jml1 = 0; // Default jumlah pengguna jika query gagal
                                echo "Error: " . mysqli_error($conn1);
                            }

                            // Tutup koneksi
                            mysqli_close($conn1);
                            ?>
                            <h4> <?php echo $jml1; ?></h4>
                        </div>
                        <div class="panel-body">
                            <span> Pengguna </span>
                        </div>
                    </div>

                </div>

                <div class="col-md-3">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <i class="icon-signal icon-5x"></i>
                            <?php
                            // Koneksi ke database
                            $conn2 = mysqli_connect("localhost", "root", "", "db_masjid");

                            // Periksa koneksi
                            if (!$conn2) {
                                die("Koneksi gagal: " . mysqli_connect_error());
                            }

                            // Query untuk menghitung jumlah kegiatan
                            $query2 = "SELECT COUNT(*) AS jml2 FROM tbl_agenda";
                            $sql2 = mysqli_query($conn2, $query2);

                            // Periksa hasil query
                            if ($sql2) {
                                $row2 = mysqli_fetch_assoc($sql2); // Ambil hasil query
                                $jml2 = $row2['jml2']; // Jumlah kegiatan
                            } else {
                                $jml2 = 0; // Default jika query gagal
                                echo "Error: " . mysqli_error($conn2);
                            }

                            // Tutup koneksi
                            mysqli_close($conn2);
                            ?>
                            <h4> <?php echo $jml2; ?></h4>
                        </div>
                        <div class="panel-body">
                            <span> Kegiatan </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <i class="icon-money icon-5x"></i>
                            <?php
                            $conn3 = mysqli_connect("localhost", "root", "", "db_masjid");
                            $query3 = "SELECT SUM(total) AS totaldana FROM tbl_dana";
                            $sql3 = mysqli_query($conn3, $query3);
                            $row3 = mysqli_fetch_assoc($sql3);
                            ?>
                            <h4> <?php echo rupiah($row3['totaldana']); ?></h4>
                        </div>
                        <div class="panel-body">
                            <span> Total Dana </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <i class="icon-retweet icon-5x"></i>
                            <?php
                            // Koneksi ke database
                            $conn4 = mysqli_connect("localhost", "root", "", "db_masjid");

                            // Periksa koneksi
                            if (!$conn4) {
                                die("Koneksi gagal: " . mysqli_connect_error());
                            }

                            // Query untuk menghitung jumlah transfer masuk
                            $query4 = "SELECT COUNT(*) AS tf FROM tbl_transfer";
                            $sql4 = mysqli_query($conn4, $query4);

                            // Periksa hasil query
                            if ($sql4) {
                                $row4 = mysqli_fetch_assoc($sql4); // Ambil hasil query
                                $tf = $row4['tf']; // Jumlah transfer masuk
                            } else {
                                $tf = 0; // Default jika query gagal
                                echo "Error: " . mysqli_error($conn4);
                            }

                            // Tutup koneksi
                            mysqli_close($conn4);
                            ?>
                            <h4> <?php echo $tf; ?></h4>
                        </div>
                        <div class="panel-body">
                            <span> Transfer Masuk </span>
                        </div>
                    </div>
                </div>



            </div>

        </div>

    </div>
    <!--END BLOCK SECTION -->
    <hr />

    <!--TABLE, PANEL, ACCORDION AND MODAL  -->
    <div class="row">
        <div class="col-lg-6">
            <div class="box">
                <header>
                    <h5>User Baru <span class="btn btn-xs btn-line btn-info">5</span></h5>
                    <div class="toolbar">
                        <div class="btn-group">
                            <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                <i class="icon-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                </header>
                <div id="sortableTable" class="body collapse in">
                    <table class="table table-bordered sortableTable responsive-table">
                        <thead>
                            <tr>
                                <th>No<i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                <th>ID<i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                <th>Nama<i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                <th>Nomor HP<i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $tampil = $koneksi->prepare("SELECT id_user,nama_user,nohp_user FROM tbl_user order by id_user desc limit 5");
                            $tampil->execute();
                            $tampil->store_result();
                            $tampil->bind_result($id, $nama, $no);
                            while ($tampil->fetch()) {
                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $nama; ?></td>
                                    <td><?php echo $no; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <i class="icon-bell"></i> Notifikasi
                </div>
                <div class="panel-body">
                <div class="list-group">
    <a href="index.php?m=contents&p=cek-transfer" class="list-group-item">
        <i class="icon-money"></i> Transfer menunggu konfirmasi
        <?php
        // Koneksi ke database untuk transfer
        $conn4 = mysqli_connect("localhost", "root", "", "db_masjid");
        if (!$conn4) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // Query untuk menghitung transfer yang menunggu konfirmasi
        $query4 = "SELECT COUNT(*) AS tf FROM tbl_transfer";
        $sql4 = mysqli_query($conn4, $query4);
        if ($sql4) {
            $row4 = mysqli_fetch_assoc($sql4);
            $tf = $row4['tf'];
        } else {
            $tf = 0;
            echo "Error: " . mysqli_error($conn4);
        }

        // Tutup koneksi
        mysqli_close($conn4);
        ?>
        <span class="pull-right text-muted small"><em> <?php echo $tf; ?></em></span>
    </a>

    <a href="index.php?m=contents&p=kegiatan" class="list-group-item">
        <?php
        // Koneksi ke database untuk kegiatan
        $conn5 = mysqli_connect("localhost", "root", "", "db_masjid");
        if (!$conn5) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // Query untuk menghitung kegiatan yang dilaksanakan
        $query5 = "SELECT COUNT(*) AS agenda FROM tbl_agenda";
        $sql5 = mysqli_query($conn5, $query5);
        if ($sql5) {
            $row5 = mysqli_fetch_assoc($sql5);
            $agenda = $row5['agenda'];
        } else {
            $agenda = 0;
            echo "Error: " . mysqli_error($conn5);
        }

        // Tutup koneksi
        mysqli_close($conn5);
        ?>
        <i class="icon-tasks"></i> Kegiatan yang dilaksanakan
        <span class="pull-right text-muted small"><em> <?php echo $agenda; ?></em></span>
    </a>
</div>

                </div>

            </div>



        </div>
    </div>
    <!--TABLE, PANEL, ACCORDION AND MODAL  -->


</div>