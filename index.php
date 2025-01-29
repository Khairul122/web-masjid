<?php

include('fungsi.php');
include_once "library/database.php";
include_once "library/fungsi.php";
require_once("urut_transaksi.php");

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Selamat Datang - Masjid Baiturrahman</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="assets/apple-touch-icon.png">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="assets/css/fontAwesome.css">
	<link rel="stylesheet" href="assets/css/light-box.css">
	<link rel="stylesheet" href="assets/css/owl-carousel.css">
	<link rel="stylesheet" href="assets/css/templatemo-style.css">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f9;
			margin: 0;
			padding: 0;
		}

		form {
			max-width: 500px;
			margin: 50px auto;
			padding: 20px;
			background: #fff;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		}

		form label {
			font-weight: bold;
			margin-bottom: 5px;
			display: block;
			color: #333;
		}

		form input[type="text"],
		form input[type="date"],
		form input[type="file"],
		form button {
			width: 100%;
			padding: 10px;
			margin: 10px 0 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
			font-size: 14px;
		}

		form input[type="file"] {
			padding: 3px;
		}

		form button {
			background-color: #007bff;
			color: #fff;
			font-weight: bold;
			cursor: pointer;
			border: none;
			transition: background-color 0.3s ease;
		}

		form button:hover {
			background-color: #0056b3;
		}
	</style>
</head>

<body>
	<header class="nav-down responsive-nav hidden-lg hidden-md">
		<!-- untuk memanggil header.php-->
		<?php require_once "header.php"; ?>
	</header>

	<div class="sidebar-navigation hidde-sm hidden-xs">
		<!-- untuk memanggil sidebar.php-->
		<?php require_once "sidebar.php"; ?>
	</div>

	<div class="slider">
		<!-- untuk memanggil sidebar.php-->
		<?php require_once "slider.php"; ?>
	</div>
	<div class="page-content">
		<section id="featured" class="content-section">
			<div class="section-heading">
				<h1><!--<php echo $_SESSION['username'];?>,--> Agenda Kegiatan<br><em>Masjid Baiturrahman</em></h1>
				<p>Alhamdulillah, kami ucapkan terimakasih atas
					<br>Nikmat Allah yang Maha Kuasa.
				</p>
			</div>
			<div class="table-responsive">
				<table class="table table-condesed table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Kegiatan</th>
							<th>Waktu</th>
							<th>Tanggal</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$tampil = $koneksi->prepare("SELECT id_agenda,judul,jam_awal,jam_akhir,tgl_awal,tgl_akhir,keterangan from tbl_agenda where tgl_awal = CURDATE()");
						$tampil->execute();
						$tampil->store_result();
						$tampil->bind_result($id, $judul, $jamawal, $jamakhir, $tglawal, $tglakhir, $ket);
						if ($tampil->num_rows() == 0) {
							echo "<tr align='center' bgcolor='pink'><td  colspan='6'><b>BELUM ADA DATA!</b></td></tr>";
						} else {
							while ($tampil->fetch()) {
						?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $judul; ?></td>
									<td><?php echo $jamawal . " s/d " . $jamakhir; ?></td>
									<td><?php echo $tglawal . " s/d " . $tglakhir; ?></td>
									<td><?php echo $ket; ?></td>
								</tr>
						<?php
							}
						}
						?>
					</tbody>
				</table>
			</div>

			<div class="table-responsive">
				<table class="table table-bordered table-condesed">
					<thead>
						<tr>
							<th width="1%">No</th>
							<th>Foto</th>
							<th>Tanggal Upload</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$tampil = $koneksi->prepare("SELECT id_album,file_name,tgl_upload FROM tbl_album");
						$tampil->execute();
						$tampil->store_result();
						$tampil->bind_result($id, $nama, $tgl);
						if ($tampil->num_rows() == 0) {
							echo "<tr align='center' bgcolor='pink'><td  colspan='10'><b>BELUM ADA DATA!</b></td></tr>";
						} else {
							while ($tampil->fetch()) {
						?>
								<tr>
									<form method="get" action="library/proses-upload.php">
										<td><?php echo $i++; ?></td>
										<td><img src="petugas/library/files/<?php echo $nama; ?>" width="auto" height="150"></td>
										<td><?php echo $tgl; ?></td>
									</form>
								</tr>
						<?php
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</section>

		<section id="projects" class="content-section">
			<div class="section-heading">
				<h1>Jadwal<br><em>Adzan</em></h1>
				<p>Alhamdulillah, kami ucapkan terimakasih atas
					<br>Nikmat Allah yang Maha Kuasa.
				</p>
				<div class="section-content">
					<div class="masonry">
						<div class="row">
							<div class="item">
								<div class="col-md-12">
									<iframe src="https://www.jadwalsholat.org/adzan/monthly.php?id=14" height="900" width="430" frameborder="0"></iframe>
								</div>
							</div>
						</div>
					</div>
				</div>
		</section>

		<section id="datakeuangan" class="content-section">
			<div class="section-heading">
				<h1>Data Keuangan<br><em>Masjid Baiturrahman</em></h1>
				<p>Alhamdulillah, kami ucapkan terimakasih atas
					<br>Nikmat Allah yang Maha Kuasa.
				</p>
				<div>
					<br>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Data uang yang masuk ke kas masjid
							</div>
							<div class="icons"><i class="icon-money"></i></div>
							<div class="toolbar">
								<ul class="nav">
									<li>
										<div class="btn-group">
											<a class="accordion-toggle btn btn-xs minimize-box" data-toggle="collapse"
												href="#collapse2">
												<i class="icon-chevron-up"></i>
											</a>
										</div>
									</li>
								</ul>
							</div>
							</header>
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr class="default">
											<th>ID Transaksi</th>
											<th>Tanggal</th>
											<th>Nominal</th>
										</tr>
									</thead>

									<?php
									$tampil = $koneksi->prepare("SELECT id_pemasukan, tgl_pemasukan, totalbayar from tbl_pemasukan order by id_pemasukan desc");
									$tampil->execute();
									$tampil->store_result();
									$tampil->bind_result($id, $tgl, $tot);
									while ($tampil->fetch()) {

									?>
										<tbody>
											<tr>
												<td width="13%"><?php echo $id; ?></td>
												<td width="13%"><?php echo $tgl; ?></td>
												<td width="17%"><?php echo rupiah($tot); ?></td>
											</tr>
										<?php } ?>
										</tr>
										</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Data uang yang keluar dari kas masjid
							</div>
							<div class="panel-body">
								<!-- FORM SEARCH -->
								<!--<div class="row">
                                        <div class="col-xs-9">
                                            &nbsp;
                                        </div> 
										<div class="col-lg-3 form-group input-group">
                                            <input type="text" placeholder="ketikkan sesuatu..." class="form-control" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button">
                                                    <i class="icon-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                        </div>-->
								<!-- END FORM SEARCH -->
								<div class="table-responsive">
									<table class="table table-condesed table-bordered table-hover">
										<thead>
											<tr>
												<th width="1%">No</th>
												<th width="6%">ID Transaksi</th>
												<th width="10%">Nominal</th>
												<th width="15%">Tanggal</th>
												<th width="30%">Keterangan</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											$tampil = $koneksi->prepare("SELECT id_pengeluaran,nominal,tgl_pengeluaran,keterangan FROM tbl_pengeluaran");
											$tampil->execute();
											$tampil->store_result();
											$tampil->bind_result($id, $jml, $tgl, $ket);
											if ($tampil->num_rows() == 0) {
												echo "<tr align='center' bgcolor='pink'><td  colspan='10'><b>BELUM ADA DATA!</b></td></tr>";
											} else {
												while ($tampil->fetch()) {
											?>
													<tr>
														<td><?php echo $i++; ?></td>
														<td><?php echo $id; ?></td>
														<td><?php echo rupiah($jml); ?></td>
														<td><?php echo $tgl; ?></td>
														<td class="text-danger"><?php echo $ket; ?></td>
													</tr>
											<?php
												}
											}
											?>
										</tbody>
									</table>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="donate" class="content-section">
			<div class="section-heading">
				<h1>Donasi<br><em>Sedekah</em></h1>
				<p>Alhamdulillah, kami ucapkan terimakasih atas
					<br>Nikmat Allah yang Maha Kuasa.
				</p>
			</div>
			<form action="tambah-pembayaran.php" method="POST" enctype="multipart/form-data">
            <label for="idtrx">ID Transaksi:</label>
            <input type="text" id="idtrx" name="idtrx" value="PM-006" required readonly>

            <label for="nama_user">Nama Pengguna:</label>
            <input type="text" id="nama_user" name="nama_user" placeholder="Masukkan Nama Pengguna" maxlength="50" required>

            <label for="tgl">Tanggal:</label>
            <input type="date" id="tgl_transfer" name="tgl" value="2025-01-29" readonly>

            <label for="bank">Nama Bank:</label>
            <input type="text" id="bank" name="bank" placeholder="Masukkan Nama Bank" required>

            <label for="rekening">Nomor Rekening:</label>
            <input type="text" id="rekening" name="rekening" placeholder="Masukkan Nomor Rekening" required>

            <label for="jumlah">Jumlah Pembayaran:</label>
            <input type="text" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah Pembayaran" required>

            <label for="file">Unggah Bukti Pembayaran:</label>
            <input type="file" id="file" name="file" accept="image/jpeg, image/png, image/gif" required>

            <button type="submit">Kirim</button>
        </form>
		</section>

		<section id="contact" class="content-section">
			<div class="section-heading">
				<h1>Hubungi<br><em>Kami</em></h1>
				<p>Alhamdulillah, kami ucapkan terimakasih atas<br>Nikmat Allah yang Maha Kuasa.</p>
			</div>

			<div class="contact-info" style="max-width: 760px; margin: 0 auto; padding: 20px;">
				<form action="action-input-data.php" method="POST" name="form-input-data">
					<table style="width: 100%; border-collapse: collapse;">
						<tr style="height: 46px;">
							<td style="padding: 10px; font-weight: bold; border: 1px solid #ddd;">Whatsapp</td>
							<td style="padding: 10px; border: 1px solid #ddd;">+62 812-7154-2060</td>
						</tr>
						<tr style="height: 46px;">
							<td style="padding: 10px; font-weight: bold; border: 1px solid #ddd;">Instagram</td>
							<td style="padding: 10px; border: 1px solid #ddd;">@Mutiiarajuwita</td>
						</tr>
					</table>
				</form>
			</div>
		</section>

		<style>
			#contact {
				background-color: #f9f9f9;
				padding: 40px 20px;
				text-align: center;
			}

			.section-heading h1 {
				font-size: 2.5rem;
				margin-bottom: 10px;
				color: #333;
			}

			.section-heading em {
				color: #007bff;
				font-style: normal;
			}

			.section-heading p {
				font-size: 1.2rem;
				color: #555;
				margin-bottom: 30px;
			}

			table {
				width: 100%;
				border: 1px solid #ddd;
				border-radius: 8px;
				overflow: hidden;
			}

			table td {
				text-align: left;
				font-size: 1rem;
				color: #333;
			}

			table td:first-child {
				font-weight: bold;
				background-color: #f1f1f1;
			}
		</style>



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>
			window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.11.2.min.js"><\/script>')
		</script>

		<script src="assets/js/vendor/bootstrap.min.js"></script>

		<script src="assets/js/plugins.js"></script>
		<script src="assets/js/main.js"></script>

		<script language="javascript">
			function hanyaAngka(e, decimal) {
				var key;
				var keychar;
				if (window.event) {
					key = window.event.keyCode;
				} else
				if (e) {
					key = e.which;
				} else return true;

				keychar = String.fromCharCode(key);
				if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27)) {
					return true;
				} else
				if ((("0123456789").indexOf(keychar) > -1)) {
					return true;
				} else
				if (decimal && (keychar == ".")) {
					return true;
				} else return false;
			}
		</script>

		<script>
			// Hide Header on on scroll down
			var didScroll;
			var lastScrollTop = 0;
			var delta = 5;
			var navbarHeight = $('header').outerHeight();

			$(window).scroll(function(event) {
				didScroll = true;
			});

			setInterval(function() {
				if (didScroll) {
					hasScrolled();
					didScroll = false;
				}
			}, 250);

			function hasScrolled() {
				var st = $(this).scrollTop();

				// Make sure they scroll more than delta
				if (Math.abs(lastScrollTop - st) <= delta)
					return;

				// If they scrolled down and are past the navbar, add class .nav-up.
				// This is necessary so you never see what is "behind" the navbar.
				if (st > lastScrollTop && st > navbarHeight) {
					// Scroll Down
					$('header').removeClass('nav-down').addClass('nav-up');
				} else {
					// Scroll Up
					if (st + $(window).height() < $(document).height()) {
						$('header').removeClass('nav-up').addClass('nav-down');
					}
				}

				lastScrollTop = st;
			}
		</script>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

</body>

</html>