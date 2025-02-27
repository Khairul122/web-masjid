<?php
if (!isset($_SESSION["username_admin"]))
	header("Location: ../administrator.php");
?>
<?php include_once "library/database.php"; ?>
<div class="inner" style="min-height: 700px;">
	<div class="row">
		<div class="col-lg-12">
			<h1> Manajemen Cetak Data </h1>
		</div>
	</div>
	<hr />
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					Cetak Data Petugas
				</div>
				<div class="panel-body">
					<form method="post" action="contents/laporan-petugas.php">
						<div class="form-group">
							<label for="pimpinan" class="col-lg-2 control-label">Nama Pimpinan:</label>
							<div class="col-lg-4">
								<input type="text" name="pimpinan" id="pimpinan" class="form-control" placeholder="Masukkan Nama Pimpinan" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-2">
								<button class="btn btn-md btn-success" type="submit" name="cetak">
									<i class="icon-print"></i> Cetak
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>