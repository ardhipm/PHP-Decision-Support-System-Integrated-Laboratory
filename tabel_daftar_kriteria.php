<?php
include_once 'header.php';
include_once 'includes/kriteriahit.inc.php';
$hit = new Krihit($db);
$stmt2 = $hit->readAll2();
$stmt3 = $hit->readAll2();
$count = $hit->countAll();
include_once 'includes/kriteria.inc.php';
$hit2 = new Kriteria($db);
if(isset($_POST['subhit'])){

	$hit->insert($_POST['K11'],$_POST['kr1'],$_POST['K21']); 
	$hit->update($_POST['K11'],$_POST['kr1'],$_POST['K21']);
	$hit->insert($_POST['K12'],$_POST['kr2'],$_POST['K31']);
	$hit->update($_POST['K12'],$_POST['kr2'],$_POST['K31']);
	$hit->insert($_POST['K13'],$_POST['kr3'],$_POST['K41']);
	$hit->update($_POST['K13'],$_POST['kr3'],$_POST['K41']);
	$hit->insert($_POST['K14'],$_POST['kr4'],$_POST['K51']);
	$hit->update($_POST['K14'],$_POST['kr4'],$_POST['K51']);
	$hit->insert($_POST['K22'],$_POST['kr5'],$_POST['K32']);
	$hit->update($_POST['K22'],$_POST['kr5'],$_POST['K32']);
	$hit->insert($_POST['K23'],$_POST['kr6'],$_POST['K42']);
	$hit->update($_POST['K23'],$_POST['kr6'],$_POST['K42']);
	$hit->insert($_POST['K24'],$_POST['kr7'],$_POST['K52']);
	$hit->update($_POST['K24'],$_POST['kr7'],$_POST['K52']);
	$hit->insert($_POST['K33'],$_POST['kr8'],$_POST['K43']);
	$hit->update($_POST['K33'],$_POST['kr8'],$_POST['K43']);
	$hit->insert($_POST['K34'],$_POST['kr9'],$_POST['K53']);
	$hit->update($_POST['K34'],$_POST['kr9'],$_POST['K53']);
	$hit->insert($_POST['K44'],$_POST['kr10'],$_POST['K54']);
	$hit->update($_POST['K44'],$_POST['kr10'],$_POST['K54']);


	$hit->insert($_POST['K21'],1/$_POST['kr1'],$_POST['K11']); 
	$hit->update($_POST['K21'],1/$_POST['kr1'],$_POST['K11']);
	$hit->insert($_POST['K31'],1/$_POST['kr2'],$_POST['K12']);
	$hit->update($_POST['K31'],1/$_POST['kr2'],$_POST['K12']);
	$hit->insert($_POST['K41'],1/$_POST['kr3'],$_POST['K13']);
	$hit->update($_POST['K41'],1/$_POST['kr3'],$_POST['K13']);
	$hit->insert($_POST['K51'],1/$_POST['kr4'],$_POST['K14']);
	$hit->update($_POST['K51'],1/$_POST['kr4'],$_POST['K14']);
	$hit->insert($_POST['K32'],1/$_POST['kr5'],$_POST['K22']);
	$hit->update($_POST['K32'],1/$_POST['kr5'],$_POST['K22']);
	$hit->insert($_POST['K42'],1/$_POST['kr6'],$_POST['K23']);
	$hit->update($_POST['K42'],1/$_POST['kr6'],$_POST['K23']);
	$hit->insert($_POST['K52'],1/$_POST['kr7'],$_POST['K24']);
	$hit->update($_POST['K52'],1/$_POST['kr7'],$_POST['K24']);
	$hit->insert($_POST['K43'],1/$_POST['kr8'],$_POST['K33']);
	$hit->update($_POST['K43'],1/$_POST['kr8'],$_POST['K33']);
	$hit->insert($_POST['K53'],1/$_POST['kr9'],$_POST['K34']);
	$hit->update($_POST['K53'],1/$_POST['kr9'],$_POST['K34']);
	$hit->insert($_POST['K54'],1/$_POST['kr10'],$_POST['K44']);
	$hit->update($_POST['K54'],1/$_POST['kr10'],$_POST['K44']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perhitungan Kriteria</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style type="text/css">
	.bs-example{
		margin: 20px;
	}
</style>
</head>
<body>
	<div class = "col-md-12">
		<p style = "margin-top: 10px;">
			<strong style="font-size: 18pt;"><span class="fa fa-table"></span>Tabel Kriteria</strong>
		</p>
		<table width="100%" border="1" class="table table-bordered table-striped" id="tabelkriteria">
			<thread>
				<tr>
					<th>Kriteria</th>
					<?php
					while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
						?>
						<th><?php echo $row['nama_kriteria'] ?></th>
						<?php
					}
					?>
				</tr>
			</thread>

			<tbody>
				<?php
				while ($row2 = $stmt3->fetch(PDO::FETCH_ASSOC)){
					?>
					<tr>
						<th><?php echo $row2['nama_kriteria'] ?></th>
						<?php
						$stmt4 = $hit->readAll2();
						while ($row3 = $stmt4->fetch(PDO::FETCH_ASSOC)){
							?>
							<td>
								<?php
								if ($row2['id_kriteria'] == $row3['id_kriteria']){
									echo '1.000';
									if($hit->insert($row2['id_kriteria'],'1',$row3['id_kriteria'])){
									}else{
										$hit->update($row2['id_kriteria'],'1',$row3['id_kriteria']);
									}
								}else{
									$hit->readAll3($row2['id_kriteria'], $row3['id_kriteria']);
									echo number_format($hit->ra, 3, '.', ',');
								}
								?>
							</td>
							<?php
						}
						?>

					</tr>
					<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>Jumlah</th>
					<?php
					$stmt5 = $hit->readAll2();
					while ($row4 = $stmt5->fetch(PDO::FETCH_ASSOC)){
						?>
						<th><?php 
						$hit->sum1($row4['id_kriteria']);
						echo number_format($hit->nak, 3, '.', ',');
						$hit->update3($hit->nak,$row4['id_kriteria']);
						?></th>
						<?php
					}
					?>
				</tr>
			</tfoot>
		</table>

		<div class="col-md-12">
			<p style = "margin-top: 10px;">
				<strong style="font-size: 18pt;"><span class="fa fa-table"></span>Perhitungan Kriteria</strong>
			</p>

			<table width="100%" border="1" class="table table-striped table-bordered">
				<thread>
					<tr>
						<th>Perbandingan</th>
						<?php
						$stmt1t = $hit->readAll2();
						while($row1t = $stmt1t->fetch(PDO::FETCH_ASSOC)){
							?>
							<th> <?php echo $row1t['nama_kriteria'] ?></th>
							<?php
						}
						?>
						<th>Eigen Vektor Normalisasi</th>
					</tr>
				</thread>

				<tbody>
					<?php
					$stmt2t = $hit->readAll2();
					while($row2t=$stmt2t->fetch(PDO::FETCH_ASSOC)){
						?>
						<tr>
							<th><?php echo $row2t['nama_kriteria'] ?> </th>
							<?php
							$stmt3t = $hit->readAll2();
							while($row3t = $stmt3t->fetch(PDO::FETCH_ASSOC)){
								?>
								<td>
									<?php
									if($row2t['id_kriteria'] == $row2t['nama_kriteria']) {
										$hsl = 1/$row3t['jumlah_kriteria'];
										$hit->update2($hsl, $row2t['id_kriteria'], $row3t['id_kriteria']);
										echo number_format($hsl,3,'.',',');
									}else{
										$hit->readAll3($row2t['id_kriteria'],$row3t['id_kriteria']);
										$hsl2 = $hit->ra/$row3t['jumlah_kriteria'];
										$hit->update2($hsl2,$row2t['id_kriteria'],$row3t['id_kriteria']);
										echo number_format($hsl2,3,'.',',');
									}
									?>
								</td>
								<?php
							}
							?>

							<th><?php
							$hit->avg($row2t['id_kriteria']);
							$bobot=$hit->hak;
							$hit->update4($bobot,$row2t['id_kriteria']);
							echo number_format($bobot,3,'.',',');
							?></th>
						</tr>
						<?php
					}
					?>
				</tbody>

				<tfoot>
					<tr>
						<th>Jumlah</th>
						<?php
						$stmt4t = $hit->readAll2();
						while($row4t = $stmt4t->fetch(PDO::FETCH_ASSOC)){
							?>
							<th> 
								<?php
								$hit->sum2($row4t['id_kriteria']);
								echo number_format($hit->nak,3,'.',',');
								?>
							</th>
							<?php
						}
						?>

						<th>
							<?php
							$hit->sum3();
							echo number_format($hit->bb,3,'.',',');
							?>
						</th>
					</tr>
				</tfoot>

			</table>


			<div class="row">
				<div class="col-md-12">
					<p style="margin-top: 10px;">
						<strong style="font-size: 18pt;"><span class="fa fa-balance-scale"></span>Perhitungan Concistency Index</strong>
					</p>
				<!--table width="100%" class="table table-bordered table-striped">

					<thread-->
					<div class="row">
						<div class="panel panel-default">
							<div class="panel-body">
								<p style="font-size: 15pt;" style="text-align: center;"><strong><?php echo 'CR=CI/RI'?></strong></p> 
								<br>
								<p style="font-size: 15pt;" style="text-align: center;"><strong><?php echo 'CI=(λ Maks-n) / n-1'?></strong></p> 
								<br>
								<p style="font-size: 15pt;" style="text-align: center;"><strong><?php echo 'RI=1.12'?></strong></p> 
								<br>
								<br>

								<table width="100%" class="table table-bordered table-striped">
									<tr>
										<th>Jumlah Kriteria</th>
										<?php
										$stmt=$hit2->readAll();
										while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
											?>
											<th>
												<?php
												$jml=$row['jumlah_kriteria'];
												echo number_format($jml,3,'.',',');
											}
											?>
										</th>

										<tr>
											<th>Eigen Vektor Kriteria</th>
											<?php
											$stmt2=$hit2->readAll();
											while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
												?>
												<th>
													<?php
													$skr=$row2['bobot_kriteria'];
													echo number_format($skr,3,'.',',');
												}
												?>
											</th>
										</tr>

										<tr>
											<th>Principal Eigen Vektor</th>
											<?php
											$stmt3=$hit2->readAll();
											while($row3=$stmt3->fetch(PDO::FETCH_ASSOC)){
												?>
												<th>
													<?php
													$kali=$row3['jumlah_kriteria']*$row3['bobot_kriteria'];
													$hit2->insert2($kali,$row3['id_kriteria']);
													echo number_format($kali,3,'.',',');
												}
												?>
											</th>
										</tr>

										<tr>
											<th>Jumlah Perkalian</th>
											<th colspan="5" style="text-align: center;">
												<?php
												$hit2->sum();
												echo number_format($hit2->hjb,3,'.',',');
												
												?>
											</th>
										</tr>
									</tr>
								</table>
							</div>


							<br>
							<?php
							$sm=$hit2->hjb;
							;
							?>


							<label>Menghitung CI : </label>
							<br>
							<p>(<?php echo number_format($sm,3,'.',',');?> - 5) / (5-1) </p>
							<?php
							$ci=($sm-5)/(5-1);
							echo number_format($ci,3,'.',',');
							?>

							<br>
							<br>

							<label>Menghitung CR : </label>
							<br>
							<p> <?php echo number_format($ci,3,'.',',');?> / 1.12 </p>
							<?php
							$cr=$ci/1.12;
							echo number_format($cr,3,'.',',');
							?>

							<br>
							<br>
							<?php
							if($cr<=0.100){
								echo 'Karena CR < 0,100 berarti preferensi pembobotan adalah '; ?> 
								<strong>KONSISTEN</strong>
								<?php
							}else{
								echo 'Karena CR > 0,100 berarti preferensi pembobotan adalah '; ?>
								<strong>TIDAK KONSISTEN</strong>
								<?php
							}
							?>





						</div>
						<div class="col-md-12">
							<?php
							include_once 'footer.php';
							?>
						</div>
					</body>
					</html>                            