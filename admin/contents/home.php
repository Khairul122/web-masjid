<?php include_once "library/fungsi.php";
include 'library/database.php'; ?>
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
                            if (!$conn1) {
                                die("Koneksi gagal: " . mysqli_connect_error());
                            }

                            $query1 = "SELECT COUNT(*) AS jml1 FROM tbl_petugas";
                            $sql1 = mysqli_query($conn1, $query1);

                            if ($sql1) {
                                $row1 = mysqli_fetch_assoc($sql1); 
                                $jml1 = $row1['jml1']; 
                            } else {
                                $jml1 = 0; 
                                echo "Error: " . mysqli_error($conn1);
                            }

                            mysqli_close($conn1);
                            ?>
                            <h4> <?php echo $jml1; ?></h4> 
                        </div>
                        <div class="panel-body">
                            <span> Petugas </span>
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
                    <h5>Data Petugas</h5>
                    <div class="toolbar">
                        <div class="btn-group">
                            <a href="#sortableTable1" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                <i class="icon-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                </header>
                <div id="sortableTable1" class="body collapse in">
                    <table class="table table-bordered sortableTable responsive-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID User</th>
                                <th>Nama User</th>
                                <th>No KTP</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $tampil = $koneksi->prepare("SELECT id_petugas,no_ktp,nama,no_hp,alamat FROM tbl_petugas");
                            $tampil->execute();
                            $tampil->store_result();
                            $tampil->bind_result($id_user, $nama, $noktp, $nohp, $alamat);
                            while ($tampil->fetch()) {
                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $id_user; ?></td>
                                    <td><?php echo $nama; ?></td>
                                    <td><?php echo $noktp; ?></td>
                                    <td><?php echo $nohp; ?></td>
                                    <td><?php echo $alamat; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>