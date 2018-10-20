<?php
include_once 'header.php';	
include_once 'includes/kriteria.inc.php';
$pro1 = new Kriteria($db);
include_once 'includes/alternatifhit.inc.php';
$pro = new Althit($db);
$altkriteria = isset($_POST['kriteria']) ? $_POST['kriteria'] : $_GET['kriteria'];
$stmt2 = $pro->readAll2();
$stmt3 = $pro->readAll2();
if(isset($altkriteria)){
	$pro->readKri($altkriteria);
	$count = $pro->countAll();
	if(isset($_POST['subhit'])){

		$pro->insert($_POST['A11'],$_POST['al1'],$_POST['A21'],$altkriteria); 
		$pro->update($_POST['A11'],$_POST['al1'],$_POST['A21'],$altkriteria);
		$pro->insert($_POST['A12'],$_POST['al2'],$_POST['A31'],$altkriteria);
		$pro->update($_POST['A12'],$_POST['al2'],$_POST['A31'],$altkriteria);
		$pro->insert($_POST['A13'],$_POST['al3'],$_POST['A41'],$altkriteria);
		$pro->update($_POST['A13'],$_POST['al3'],$_POST['A41'],$altkriteria);
		$pro->insert($_POST['A14'],$_POST['al4'],$_POST['A51'],$altkriteria);
		$pro->update($_POST['A14'],$_POST['al4'],$_POST['A51'],$altkriteria);
		$pro->insert($_POST['A22'],$_POST['al5'],$_POST['A32'],$altkriteria);
		$pro->update($_POST['A22'],$_POST['al5'],$_POST['A32'],$altkriteria);
		$pro->insert($_POST['A23'],$_POST['al6'],$_POST['A42'],$altkriteria);
		$pro->update($_POST['A23'],$_POST['al6'],$_POST['A42'],$altkriteria);
		$pro->insert($_POST['A24'],$_POST['al7'],$_POST['A52'],$altkriteria);
		$pro->update($_POST['A24'],$_POST['al7'],$_POST['A52'],$altkriteria);
		$pro->insert($_POST['A33'],$_POST['al8'],$_POST['A43'],$altkriteria);
		$pro->update($_POST['A33'],$_POST['al8'],$_POST['A43'],$altkriteria);
		$pro->insert($_POST['A34'],$_POST['al9'],$_POST['A53'],$altkriteria);
		$pro->update($_POST['A34'],$_POST['al9'],$_POST['A53'],$altkriteria);
		$pro->insert($_POST['A44'],$_POST['al10'],$_POST['A54'],$altkriteria);
		$pro->update($_POST['A44'],$_POST['al10'],$_POST['A54'],$altkriteria);


		$pro->insert($_POST['A21'],1/$_POST['al1'],$_POST['A11'],$altkriteria); 
		$pro->update($_POST['A21'],1/$_POST['al1'],$_POST['A11'],$altkriteria);
		$pro->insert($_POST['A31'],1/$_POST['al2'],$_POST['A12'],$altkriteria);
		$pro->update($_POST['A31'],1/$_POST['al2'],$_POST['A12'],$altkriteria);
		$pro->insert($_POST['A41'],1/$_POST['al3'],$_POST['A13'],$altkriteria);
		$pro->update($_POST['A41'],1/$_POST['al3'],$_POST['A13'],$altkriteria);
		$pro->insert($_POST['A51'],1/$_POST['al4'],$_POST['A14'],$altkriteria);
		$pro->update($_POST['A51'],1/$_POST['al4'],$_POST['A14'],$altkriteria);
		$pro->insert($_POST['A32'],1/$_POST['al5'],$_POST['A22'],$altkriteria);
		$pro->update($_POST['A32'],1/$_POST['al5'],$_POST['A22'],$altkriteria);
		$pro->insert($_POST['A42'],1/$_POST['al6'],$_POST['A23'],$altkriteria);
		$pro->update($_POST['A42'],1/$_POST['al6'],$_POST['A23'],$altkriteria);
		$pro->insert($_POST['A52'],1/$_POST['al7'],$_POST['A24'],$altkriteria);
		$pro->update($_POST['A52'],1/$_POST['al7'],$_POST['A24'],$altkriteria);
		$pro->insert($_POST['A43'],1/$_POST['al8'],$_POST['A33'],$altkriteria);
		$pro->update($_POST['A43'],1/$_POST['al8'],$_POST['A33'],$altkriteria);
		$pro->insert($_POST['A53'],1/$_POST['al9'],$_POST['A34'],$altkriteria);
		$pro->update($_POST['A53'],1/$_POST['al9'],$_POST['A34'],$altkriteria);
		$pro->insert($_POST['A54'],1/$_POST['al10'],$_POST['A44'],$altkriteria);
		$pro->update($_POST['A54'],1/$_POST['al10'],$_POST['A44'],$altkriteria);
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perhitungan Alternatif</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="row">
		<div class="col-md-6 text-left">
			<strong style="font-size:18pt;"><span class="fa fa-table"></span> Tabel Alternatif</strong>
		</div>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" >
		<thead>
			<tr>
				<th><?php echo $pro->kri ?></th>
				<?php
				while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					?>
					<th><?php echo $row2['nama_alternatif']?></th>
					<?php
				}
				?>
			</tr>
		</thead>

		<tbody>
			<?php
			while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
				?>
				<tr>
					<th style="vertical-align:middle;"><?php echo $row3['nama_alternatif'] ?></th>
					<?php          
					$stmt4 = $pro->readAll2();
					while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
						?>
						<td style="vertical-align:middle;">
							<?php 
							if($row3['id_alternatif']==$row4['id_alternatif']){
								echo '1.000';
								if($pro->insert($row3['id_alternatif'],'1',$row4['id_alternatif'],$altkriteria)){

								} else{
									$pro->update($row3['id_alternatif'],'1',$row4['id_alternatif'],$altkriteria);
								}
							} else{
								$pro->readAll1($row3['id_alternatif'],$row4['id_alternatif'],$altkriteria);
								echo number_format($pro->kp, 3, '.', ',');
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
				$stmt5 = $pro->readAll2();
				while ($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)){
					?>
					<th><?php 
					$pro->sum1($row5['id_alternatif'],$altkriteria);
					echo number_format($pro->nak, 3, '.', ',');
					if($pro->insert3($row5['id_alternatif'],$altkriteria,$pro->nak,$_SESSION['id_pengguna'])){

					} else{
						$pro->insert5($pro->nak,$row5['id_alternatif'],$altkriteria);
					}
					?></th>
					<?php
				}
				?>
			</tr>
		</tfoot>

	</table>
</form>

<div class="row">
	<div class="col-md-6 text-left">
		<strong style="font-size:18pt;"><span class="fa fa-table"></span> Perhitungan Alternatif</strong>
	</div>
</div>

<table width="100%" class="table table-striped table-bordered" border="1">
	<thead>
		<tr>
			<th>Perbandingan</th>
			<?php
			$stmt2x = $pro->readAll2();
			while ($row2x = $stmt2x->fetch(PDO::FETCH_ASSOC)){
				?>
				<th><?php echo $row2x['nama_alternatif']?></th>
				<?php
			}
			?>
			<th>Eigen Vektor Normalisasi</th>
		</thead>

		<tbody>
			<?php
			$stmt3x = $pro->readAll2();
			while ($row3x = $stmt3x->fetch(PDO::FETCH_ASSOC)){
				?>
				<tr>
					<th style="vertical-align:middle;"><?php echo $row3x['nama_alternatif'] ?></th>
					<?php          
					$stmt4x = $pro->readAll2();
					while ($row4x = $stmt4x->fetch(PDO::FETCH_ASSOC)){
						?>
						<td style="vertical-align:middle;">
							<?php 
							$pro->readAll3($row4x['id_alternatif'],$altkriteria);
							$jakx = $pro->jak;
							$pro->readAll1($row3x['id_alternatif'],$row4x['id_alternatif'],$altkriteria);
							$kpx = $pro->kp;
							$jmk = $kpx/$jakx;	
							$pro->insert2($jmk,$row3x['id_alternatif'],$row4x['id_alternatif'],$altkriteria,$_SESSION['id_pengguna']);
							echo number_format($jmk, 3, '.', ',');
							?>
						</td>
						<?php
					}
					?>
					<th style="vertical-align:middle;"><?php 
					$pro->readAvg($row3x['id_alternatif'],$altkriteria); 
					$bbt = $pro->hak;
					$pro->insert4($bbt,$row3x['id_alternatif'],$altkriteria);
					echo number_format($bbt, 3, '.', ',');
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
				$stmt5x = $pro->readAll2();
				while ($row5x = $stmt5x->fetch(PDO::FETCH_ASSOC)){
					?>
					<th><?php 
					$pro->sum2($row5x['id_alternatif'],$altkriteria);
					echo number_format($pro->nak, 3, '.', ',');
					?></th>
					<?php
				}
				?>
				<th><?php 
				$pro->sum3($altkriteria);
				echo number_format($pro->bb, 3, '.', ',');
				?></th>
			</tr>
		</tfoot>

	</table>

	<div class="row">
		<div class="col-md-12">
			<p style="margin-top: 10px;">
				<strong style="font-size: 18pt;"><span class="fa fa-balance-scale"></span>Perhitungan Concistency Index</strong>
			</p>

			<div class="row" style="margin-left: 10px;">
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
								<th>Jumlah Alternatif</th>
								<?php
								$stmt=$pro->readAll4($altkriteria);
								while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
									?>
									<th>
										<?php
										$jml=$row['jumlah_alternatif'];
										echo number_format($jml,3,'.',',');
									}
									?>
								</th>

								<tr>
									<th>Eigen Vektor Alternatif</th>
									<?php
									$stmt2=$pro->readAll4($altkriteria);
									while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
										?>
										<th>
											<?php
											$skr=$row2['skor_alterntif'];
											echo number_format($skr,3,'.',',');
										}
										?>
									</th>
								</tr>

								<tr>
									<th>Principal Eigen Value</th>
									<?php
									$stmt3=$pro->readAll4($altkriteria);
									while($row3=$stmt3->fetch(PDO::FETCH_ASSOC)){
										?>
										<th>
											<?php
											$kali=$row3['jumlah_alternatif']*$row3['skor_alterntif'];
											$pro->insert6($kali,$row3['id_alternatif'],$altkriteria);
											echo number_format($kali,3,'.',',');
										}
										?>
									</th>
								</tr>

								<tr>
									<th>Jumlah Perkalian</th>
									<th colspan="5" style="text-align: center;">
										<?php
										$pro->sum4($altkriteria);
										echo number_format($pro->hjk,3,'.',',');

										?>
									</th>
								</tr>
							</tr>
						</table>
					</div>


					<br>
					<?php
					$sm=$pro->hjk;
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
					$keterangan;
					if($cr<=0.100){
						echo 'Karena CR < 0,100 berarti preferensi pembobotan adalah '; ?> 
						<strong>KONSISTEN</strong>
						<?php
						$keterangan = 'konsisten';
					}else{
						echo 'Karena CR > 0,100 berarti preferensi pembobotan adalah '; ?>
						<strong>TIDAK KONSISTEN</strong>
						<?php
						$keterangan = 'tidak konsisten';
					}
					$pro->insert10($keterangan,$altkriteria);
					?>

				</div>
			</div>
		</div>
		<div class="col-md-8 text-right">
			<button type="button" onclick="location.href='hitung_alternatif.php'" class="btn btn-default" style="background: #0c2e8a;color: white;"><span class="fa fa-balance-scale"></span> Perhitungan Alternatif Selanjutnya</button>

			<button type="button" onclick="konsistensi()" id="rangking" name="rangking" class="btn btn-default" style="background: #50d8af;"><span class="fa fa-bar-chart"></span> Penentuan Perangkingan</button>
			<script type="text/javascript">				
				
				function konsistensi(){
					<?php
					$pro1->countKonsisten();
					$count = $pro1->count;
					$stmt2y = $pro1->readKonsisten();

					$row2y = $stmt2y->fetch(PDO::FETCH_ASSOC);
						$tk = $row2y['nama_kriteria'];
						if($count > 0){
						$a='Terdapat perbandingan alternatif yang belum konsisten pada kriteria ' .$tk;
						}else if($count <= 0){
						$a='Perbandingan Konsisten, Klik OK untuk menuju halaman perangkingan';
						?>
						location.href="hitung_rangking.php";
						<?php
						}
						
				?>
				var car;
				car = '<?php echo $a ;?>';
				alert(car);
			}
		</script>


	</div>
</div>

<div class="col-md-12">
	<?php
	include_once 'footer.php';
	?>
</div>
</body>
</html>
