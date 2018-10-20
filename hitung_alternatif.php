<?php
include_once 'header.php';
include_once 'includes/alternatifhit.inc.php';
$pro1 = new Althit($db);
$count1 = $pro1->countAll();
include_once 'includes/kriteria.inc.php';
$pro3 = new Kriteria($db);
include_once 'includes/nilai.inc.php';
$pro2 = new Nilai($db);
?>
<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Ubah Kriteria </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class = "col-md-12" >
		<p style = "margin-bottom: 10px; margin-top: 10px;">
			<strong style = "font-size: 18pt;"><span class = "fa  fa-check-square-o"></span>Tentukan Alternatif</strong>
		</p>
		<div class="panel panel-default">
			<div class="panel-body">
				<form method="post" action="tabel_daftar_alternatif.php">
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<p style="padding:10px 0;"><label>Pilih Kriteria</label></p>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<select class="form-control" style="height: 35px;" id="kriteria" name="kriteria">
									<?php
									$stmt4 = $pro3->readAll();
									while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
										?>
										<option value="<?php echo $row4['id_kriteria'] ?>"><?php echo $row4['nama_kriteria'] ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<form method="post" action="tabel_daftar_kriteria.php">
						<div class="row">
							<div class="col-xs-12 col-md-3">
								<div class="form-group">
									<label>Alternatif Pertama</label>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label>Pernilaian</label>
								</div>
							</div>
							<div class="col-xs-12 col-md-3">
								<div class="form-group">
									<label>Alternatif Kedua</label>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-xs-12 col-md-3">
								<div class="form-group">
									<?php
									$stmt2 = $pro1->readAlternatif('A1');
									while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row1['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A11" value="<?php echo $row1['id_alternatif'] ?>" />
										<?php 
									}
									?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<select class="form-control" style="height: 35px;" name="al1">
										<?php
										$stmt1 = $pro2->readAll();
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
									$stmt3 = $pro1->readAlternatif('A2');
									while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row3['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A21" value="<?php echo $row3['id_alternatif'] ?>" />
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
									$stmt2 = $pro1->readAlternatif('A1');
									while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row1['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A12" value="<?php echo $row1['id_alternatif'] ?>" />
										<?php
									}
									?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<select class="form-control" style="height: 35px;" name="al2">
										<?php
										$stmt1 = $pro2->readAll();
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
									$stmt3 = $pro1->readAlternatif('A3');
									while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row3['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A31" value="<?php echo $row3['id_alternatif'] ?>" />
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
									$stmt2 = $pro1->readAlternatif('A1');
									while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row1['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A13" value="<?php echo $row1['id_alternatif'] ?>" />
										<?php
									}
									?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<select class="form-control" style="height: 35px;" name="al3">
										<?php
										$stmt1 = $pro2->readAll();
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
									$stmt3 = $pro1->readAlternatif('A4');
									while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row3['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A41" value="<?php echo $row3['id_alternatif'] ?>" />
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
									$stmt2 = $pro1->readAlternatif('A1');
									while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row1['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A14" value="<?php echo $row1['id_alternatif'] ?>" />
										<?php
									}
									?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<select class="form-control" style="height: 35px;" name="al4">
										<?php
										$stmt1 = $pro2->readAll();
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
									$stmt3 = $pro1->readAlternatif('A5');
									while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row3['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A51" value="<?php echo $row3['id_alternatif'] ?>" />
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
									$stmt2 = $pro1->readAlternatif('A2');
									while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row1['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A22" value="<?php echo $row1['id_alternatif'] ?>" />
										<?php
									}
									?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<select class="form-control" style="height: 35px;" name="al5">
										<?php
										$stmt1 = $pro2->readAll();
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
									$stmt3 = $pro1->readAlternatif('A3');
									while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row3['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A32" value="<?php echo $row3['id_alternatif'] ?>" />
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
									$stmt2 = $pro1->readAlternatif('A2');
									while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row1['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A23" value="<?php echo $row1['id_alternatif'] ?>" />
										<?php
									}
									?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<select class="form-control" style="height: 35px;" name="al6">
										<?php
										$stmt1 = $pro2->readAll();
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
									$stmt3 = $pro1->readAlternatif('A4');
									while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row3['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A42" value="<?php echo $row3['id_alternatif'] ?>" />
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
									$stmt2 = $pro1->readAlternatif('A2');
									while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row1['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A24" value="<?php echo $row1['id_alternatif'] ?>" />
										<?php
									}
									?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<select class="form-control" style="height: 35px;" name="al7">
										<?php
										$stmt1 = $pro2->readAll();
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
									$stmt3 = $pro1->readAlternatif('A5');
									while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row3['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A52" value="<?php echo $row3['id_alternatif'] ?>" />
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
									$stmt2 = $pro1->readAlternatif('A3');
									while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row1['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A33" value="<?php echo $row1['id_alternatif'] ?>" />
										<?php
									}
									?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<select class="form-control" style="height: 35px;" name="al8">
										<?php
										$stmt1 = $pro2->readAll();
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
									$stmt3 = $pro1->readAlternatif('A4');
									while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row3['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A43" value="<?php echo $row3['id_alternatif'] ?>" />
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
									$stmt2 = $pro1->readAlternatif('A3');
									while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row1['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A34" value="<?php echo $row1['id_alternatif'] ?>" />
										<?php
									}
									?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<select class="form-control" style="height: 35px;" name="al9">
										<?php
										$stmt1 = $pro2->readAll();
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
									$stmt3 = $pro1->readAlternatif('A5');
									while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row3['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A53" value="<?php echo $row3['id_alternatif'] ?>" />
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
									$stmt2 = $pro1->readAlternatif('A4');
									while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row1['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A44" value="<?php echo $row1['id_alternatif'] ?>" />
										<?php
									}
									?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<select class="form-control" style="height: 35px;" name="al10">
										<?php
										$stmt1 = $pro2->readAll();
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
									$stmt3 = $pro1->readAlternatif('A5');
									while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
										?>
										<input type="text" class="form-control" value="<?php echo $row3['nama_alternatif'] ?>" readonly />
										<input type="hidden" name="A54" value="<?php echo $row3['id_alternatif'] ?>" />
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