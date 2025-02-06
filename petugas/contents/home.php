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
    <div class="row">
        <div class="col-lg-12">
            <div style="text-align: center;">
                <div class="col-md-3">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <i class="icon-signal icon-5x"></i>
                            <?php
                            $conn2 = mysqli_connect("localhost", "root", "", "db_masjid");
                            $query2 = "SELECT COUNT(*) AS jml2 FROM tbl_agenda";
                            $sql2 = mysqli_query($conn2, $query2);
                            $row2 = mysqli_fetch_assoc($sql2);
                            ?>
                            <h4> <?php echo $row2['jml2']; ?></h4>
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
                            <i class="icon-download icon-5x"></i>
                            <?php
                            $conn6 = mysqli_connect("localhost", "root", "", "db_masjid");
                            $query6 = "SELECT SUM(totalbayar) AS total_pemasukan FROM tbl_pemasukan";
                            $sql6 = mysqli_query($conn6, $query6);
                            $row6 = mysqli_fetch_assoc($sql6);
                            ?>
                            <h4> <?php echo rupiah($row6['total_pemasukan']); ?></h4>
                        </div>
                        <div class="panel-body">
                            <span> Total Pemasukan </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <i class="icon-upload icon-5x"></i>
                            <?php
                            $conn7 = mysqli_connect("localhost", "root", "", "db_masjid");
                            $query7 = "SELECT SUM(nominal) AS total_pengeluaran FROM tbl_pengeluaran";
                            $sql7 = mysqli_query($conn7, $query7);
                            $row7 = mysqli_fetch_assoc($sql7);
                            ?>
                            <h4> <?php echo rupiah($row7['total_pengeluaran']); ?></h4>
                        </div>
                        <div class="panel-body">
                            <span> Total Pengeluaran </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="icon-wallet icon-5x"></i>
                            <?php
                            $saldo = $row6['total_pemasukan'] - $row7['total_pengeluaran'];
                            ?>
                            <h4> <?php echo rupiah($saldo); ?></h4>
                        </div>
                        <div class="panel-body">
                            <span> Sisa Saldo </span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <hr />
    <div class="row">
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
                            $conn4 = mysqli_connect("localhost", "root", "", "db_masjid");
                            $query4 = "SELECT COUNT(*) AS tf FROM tbl_transfer";
                            $sql4 = mysqli_query($conn4, $query4);
                            $row4 = mysqli_fetch_assoc($sql4);
                            ?>
                            <span class="pull-right text-muted small"><em> <?php echo $row4['tf']; ?></em></span>
                        </a>
                        <a href="index.php?m=contents&p=kegiatan" class="list-group-item">
                            <?php
                            $conn5 = mysqli_connect("localhost", "root", "", "db_masjid");
                            $query5 = "SELECT COUNT(*) AS agenda FROM tbl_agenda";
                            $sql5 = mysqli_query($conn5, $query5);
                            $row5 = mysqli_fetch_assoc($sql5);
                            ?>
                            <i class="icon-tasks"></i> Kegiatan yang dilaksanakan
                            <span class="pull-right text-muted small"><em> <?php echo $row5['agenda']; ?></em></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
