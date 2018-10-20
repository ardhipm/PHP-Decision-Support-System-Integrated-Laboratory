<?php
include_once 'header.php';
include_once 'includes/alternatifhit.inc.php';
$rang=new Althit($db);
include_once 'includes/kriteria.inc.php';
$rang2=new Kriteria($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hitung Perangkingan</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class = "col-md-12">
		<p style = "margin-top: 20px;">
			<strong style="font-size: 18pt;"><span class = "fa fa-table"></span>Tabel Perangkingan</strong> 
		</p>
	</div>
	<div class="col-md-12">
		<table style="width: 100%" border="1" class="table table-bordered table-striped">
			<thread>
				<th>Perhitungan</th>
				<?php
				$stmt = $rang2->readAll();
				while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					?>
					<th>
						<?php
						echo $row['nama_kriteria'];	
					}
					?>
				</th>
			</thread>

			<tbody>
				<?php
				$stmt2=$rang->readAll();
				while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
					?>
					<tr>
						<th>
							<?php
							echo $row2['nama_alternatif'];
							?>
							<?php
							$x=$row2['id_alternatif'];
							$stmt4=$rang2->readAll();
							while($row4=$stmt4->fetch(PDO::FETCH_ASSOC)){
								$y=$row4['id_kriteria'];
								$stmt5=$rang->readAll5($x,$y);
								while($row5=$stmt5->fetch(PDO::FETCH_ASSOC)){
									?>
									<td>
										<?php
										$hsl=$row5['skor_alterntif'];
										echo number_format($hsl,3,'.',',');
										?>
									</td>
									<?php
								}
							}
							?>
						</th>
						<?php
					}
					?>
				</tr>
			</tbody>
		</table>

		<table style="width: 15%;" class="table table-bordered table-striped" border="1">
			<thread>
				<th>Kriteria</th>
				<?php
				$stmtx=$rang2->readAll();
				while($rowx=$stmtx->fetch(PDO::FETCH_ASSOC)){
					?>
					<tr>
						<td>
							<?php
							$hsl2=$rowx['bobot_kriteria'];
							echo number_format($hsl2,3,'.',',');
							?>
						</td>
					</tr>
					<?php
				}
				?>
			</thread>
		</table>

		<div class = "col-md-12">
			<p style = "margin-top: 20px;">
				<strong style="font-size: 18pt;"><span class = "fa fa-balance-scale"></span>Tabel Perhitungan Perangkingan</strong> 
			</p>
		</div>

		<div class="col-md-12">
			<table style="width=100%" border="1" class="table table-bordered table-striped">
				<thead>
					<th>Perhitungan</th>
					<?php
					$stmt2y=$rang2->readAll();
					while ($row2 = $stmt2y->fetch(PDO::FETCH_ASSOC)){
						?>
						<th><?php echo $row2['nama_kriteria'] ?></th>
						<?php
					}
					?>
					<th>Hasil Akhir</th>
				</thead>

				<tbody>
					<?php
					$stmty=$rang->readAll();
					while ($row1 = $stmty->fetch(PDO::FETCH_ASSOC)){
						?>
						<tr>
							<th><?php echo $row1['nama_alternatif'] ?></th>
							<?php
							$a1= $row1['id_alternatif'];
							$stmt2y = $rang2->readAll();
							while ($row2y = $stmt2y->fetch(PDO::FETCH_ASSOC)){
								$b2= $row2y['id_kriteria'];
								$stmt3y = $rang->readAll5($a1,$b2);
								while ($row3y = $stmt3y->fetch(PDO::FETCH_ASSOC)){
									?>
									<td>
										<?php 
										$norx = $row3y['skor_alterntif']*$row2y['bobot_kriteria'];
										echo number_format($norx,3,'.',',');
										$rang->ia = $a1;
										$rang->ik = $b2;
										$rang->ha = $norx;
										$rang->insert7();
										?>
									</td>
									<?php
								}
							}
							?>
							<td>
								<?php 
								$stmthasil = $rang->sum5($a1);
								$hasil = $stmthasil->fetch(PDO::FETCH_ASSOC);
								echo number_format($hasil['hsl'],3,'.',',');
								$rang->ia = $a1;
								$rang->has1 = $hasil['hsl'];
								$rang->insert8();
								?>
							</td>
						</tr>
						<?php
					}
					?>
				</table>


				<div class = "col-md-12">
					<p style = "margin-top: 20px;">
						<strong style="font-size: 18pt;"><span class = "fa fa-trophy"></span>Hasil Perangkingan</strong> 
					</p>
				</div>

				<div class="col-md-12">
					<table style="width=10%" border="1" class="table table-bordered table-striped">
						<?php
						$no=0;
						?>
						<thread>
							<th>Hasil</th>
							<th>Nama Alternatif</th>
							<th>Hasil Akhir</th>
						</thread>

						<tbody>
							<?php
							$stmtr=$rang->readAll6();
							while($rowr=$stmtr->fetch(PDO::FETCH_ASSOC)){
								$no++;
								echo "<tr>";
								echo "<td> Peringkat $no</td>";
								echo "<td>" .$rowr['nama_alternatif']."</td>";
								echo "<td>" .number_format($rowr['hasil_akhir'],3,'.',',')."</td>";

								echo "</tr>";
							}
							?>

						</tbody>
					</table>
				</div>
			</tbody>
		</table>
	</div>
</div>
<div class="col-md-12">
	<?php
	include_once 'footer.php';
	?>
</div>
</body>
</html>