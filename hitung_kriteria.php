<?php
include_once 'header.php';
include_once 'includes/kriteria.inc.php';
$kri1 = new Kriteria($db);
$count = $kri1->countAll();
include_once 'includes/nilai.inc.php';
$kri2 = new Nilai($db);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Ubah Kriteria </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class = "col-md-12">
		<p style = "margin-bottom: 10px;margin-top: 10px;">
			<strong style = "font-size: 18pt;"><span class = "fa fa-check-square-o"></span> Tentukan Kriteria</strong>
		</p>
		<div class="panel panel-default">
			<div class="panel-body">

				<form method="post" action="tabel_daftar_kriteria.php">
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label>Kriteria Pertama</label>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label>Pernilaian</label>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label>Kriteria Kedua</label>
							</div>
						</div>
					</div>
					


					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $kri1->readSatu('K1');
								while($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row1['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K11" value="<?php echo $row1['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" style="height: 35px;" name="kr1">
									<?php
									$stmt1 = $kri2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
										?>
										<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> - <?php echo $row2['ket_nilai'] ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $kri1->readSatu('K2');
								while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row3['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K21" value="<?php echo $row3['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $kri1->readSatu('K1');
								while($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row1['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K12" value="<?php echo $row1['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" style="height: 35px;" name="kr2">
									<?php
									$stmt1 = $kri2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
										?>
										<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> - <?php echo $row2['ket_nilai'] ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $kri1->readSatu('K3');
								while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row3['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K31" value="<?php echo $row3['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $kri1->readSatu('K1');
								while($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row1['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K13" value="<?php echo $row1['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" style="height: 35px;" name="kr3">
									<?php
									$stmt1 = $kri2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
										?>
										<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> - <?php echo $row2['ket_nilai'] ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $kri1->readSatu('K4');
								while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row3['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K41" value="<?php echo $row3['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $kri1->readSatu('K1');
								while($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row1['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K14" value="<?php echo $row1['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" style="height: 35px;" name="kr4">
									<?php
									$stmt1 = $kri2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
										?>
										<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> - <?php echo $row2['ket_nilai'] ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $kri1->readSatu('K5');
								while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row3['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K51" value="<?php echo $row3['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $kri1->readSatu('K2');
								while($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row1['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K22" value="<?php echo $row1['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" style="height: 35px;" name="kr5">
									<?php
									$stmt1 = $kri2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
										?>
										<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> - <?php echo $row2['ket_nilai'] ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $kri1->readSatu('K3');
								while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row3['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K32" value="<?php echo $row3['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $kri1->readSatu('K2');
								while($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row1['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K23" value="<?php echo $row1['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" style="height: 35px;" name="kr6">
									<?php
									$stmt1 = $kri2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
										?>
										<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> - <?php echo $row2['ket_nilai'] ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $kri1->readSatu('K4');
								while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row3['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K42" value="<?php echo $row3['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $kri1->readSatu('K2');
								while($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row1['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K24" value="<?php echo $row1['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" style="height: 35px;" name="kr7">
									<?php
									$stmt1 = $kri2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
										?>
										<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> - <?php echo $row2['ket_nilai'] ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $kri1->readSatu('K5');
								while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row3['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K52" value="<?php echo $row3['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $kri1->readSatu('K3');
								while($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row1['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K33" value="<?php echo $row1['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" style="height: 35px;" name="kr8">
									<?php
									$stmt1 = $kri2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
										?>
										<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> - <?php echo $row2['ket_nilai'] ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $kri1->readSatu('K4');
								while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row3['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K43" value="<?php echo $row3['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $kri1->readSatu('K3');
								while($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row1['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K34" value="<?php echo $row1['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" style="height: 35px;" name="kr9">
									<?php
									$stmt1 = $kri2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
										?>
										<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> - <?php echo $row2['ket_nilai'] ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $kri1->readSatu('K5');
								while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row3['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K53" value="<?php echo $row3['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt2 = $kri1->readSatu('K4');
								while($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row1['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K44" value="<?php echo $row1['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<select class="form-control" style="height: 35px;" name="kr10">
									<?php
									$stmt1 = $kri2->readAll();
									while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
										?>
										<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> - <?php echo $row2['ket_nilai'] ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<?php
								$stmt3 = $kri1->readSatu('K5');
								while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
									?>
									<input type="text" class="form-control" value="<?php echo $row3['nama_kriteria'] ?>" readonly />
									<input type="hidden" name="K54" value="<?php echo $row3['id_kriteria'] ?>" />
									<?php
								}
								?>
							</div>
						</div>
					</div>

					
					<div class="col-md-12 text-right">
						<button type="submit" name="subhit" class="btn btn-default" style="background: #50d8af; color: black"><span class="fa fa-arrow-right"></span>Selanjutnya</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<?php
		include_once 'footer.php';
		?>
	</div>
</body>
</html>