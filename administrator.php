<?php
session_start();
if (!empty($_SESSION["username_petugas"])) {
	header("Location: petugas/index.php");
} elseif (!empty($_SESSION["username_admin"])) {
	header("Location: admin/index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<title>Administrator | Login Page</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="assets/css/login.css" />
	<link rel="stylesheet" href="assets/plugins/magic/magic.css" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/theme.css" />
	<link rel="stylesheet" href="assets/css/MoneAdmin.css" />
	<link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
</head>

<body>

	<div class="container">
		<div class="text-center">
			<br />
			<div class="row">
				<div class="col-lg-12">
					<div class="col-lg-3">
						&nbsp;
					</div>
					<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2 class="text-primary"><b>Halaman Login</b></h2>
							</div>
							<div class="panel-body">
								<ul class="nav nav-pills">
									<li class="active"><a href="#petugas" data-toggle="tab">PETUGAS</a>
									</li>
									<li><a href="#admin" data-toggle="tab">KETUA MASJID</a>
									</li>
								</ul>

								<div class="tab-content">
									<div class="tab-pane fade in active" id="petugas">
										<h3 class="text-muted">Login ke halaman petugas</h3>
										<div class="tab-content">
											<div class="tab-pane active">
												<div class="col-lg-12">
													<form action="proses-login-petugas.php" method="post" class="form-horizontal">
														<div class="form-group">
															<p class="text-center text-primary">
																Masukkan username dan password
															</p>
														</div>

														<div class="form-group">
															<div class="input-group">
																<span class="input-group-addon"><i class="icon-user"></i></span>
																<input type="text" name="username" placeholder="Username" class="form-control" required autocomplete="new" />
															</div>
														</div>

														<div class="form-group">
															<div class="input-group">
																<span class="input-group-addon"><i class="icon-lock"></i></span>
																<input type="password" name="password" placeholder="Password" class="form-control" required autocomplete="new-password" />
															</div>
														</div>

														<div class="form-group">
															<button class="btn btn-md btn-block btn-success" name="LoginPetugas" type="submit"><i class="icon-signin"></i>
																<b>LOGIN</b>
															</button>
															<button class="btn text-muted btn-md btn-block btn-danger" type="reset"><i class="icon-undo"></i>
																<b>BATAL</b>
															</button>
															<button type="button" class="btn btn-md btn-block btn-primary" data-toggle="modal" data-target="#registerModal">
																<i class="icon-user"></i> <b>DAFTAR</b>
															</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>

									<div class="tab-pane fade" id="admin">
										<h3 class="text-muted">Login ke halaman ketua masjid</h3>
										<div class="tab-content">
											<div class="tab-pane active">
												<div class="col-lg-12">
													<form action="proses-login-admin.php" method="post" class="form-horizontal">
														<div class="form-group">
															<p class="text-center text-primary">
																Masukkan username dan password
															</p>
														</div>

														<div class="form-group">
															<div class="input-group">
																<span class="input-group-addon"><i class="icon-user"></i></span>
																<input type="text" name="username" placeholder="Username" class="form-control" required autocomplete="new" />
															</div>
														</div>

														<div class="form-group">
															<div class="input-group">
																<span class="input-group-addon"><i class="icon-lock"></i></span>
																<input type="password" name="password" placeholder="Password" class="form-control" required autocomplete="new-password" />
															</div>
														</div>

														<div class="form-group">
															<button class="btn btn-md btn-block btn-success" name="LoginAdmin" type="submit"><i class="icon-signin"></i>
																<b>LOGIN</b>
															</button>
															<button class="btn text-muted btn-md btn-block btn-danger" type="reset"><i class="icon-undo"></i>
																<b>BATAL</b>
															</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>


								</div>
							</div>
						</div>
					</div>

					<!-- Modal Registrasi -->
					<div id="registerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registrasi Petugas</h4>
            </div>
            <div class="modal-body">
                <form action="proses-registrasi-petugas.php" method="post">
                    <div class="form-group">
                        <label>No KTP</label>
                        <input type="text" name="no_ktp" class="form-control" pattern="\d+" maxlength="16" placeholder="Masukkan No KTP (angka)" required />
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required />
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat Lengkap" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="form-control" pattern="\d+" maxlength="15" placeholder="Masukkan No HP (angka)" required />
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required />
                    </div>
                    <input type="hidden" name="id_admin" value="AD-002" />
                    <button type="submit" name="registerPetugas" class="btn btn-success btn-block">
                        <i class="icon-save"></i> <b>DAFTAR</b>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


					<script src="assets/plugins/jquery-2.0.3.min.js"></script>
					<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
					<script src="assets/js/login.js"></script>

</body>

</html>