<?php
include "includes/koneksi.php";

$koneksi = new Koneksi();
$db = $koneksi->getConnection();

if($_POST){

	include_once 'includes/pengguna.inc.php';
	$eks = new Pengguna($db);

	$eks->nl = $_POST['nl'];
	$eks->un = $_POST['un'];
	$eks->pw = md5($_POST['pw']);

	if($eks->pw == md5($_POST['up'])){

		if($eks->insert()){	

			echo "<script>alert('Data berhasil ditambahkan')</script>";
			echo "<meta http-equiv='refresh' content='0; url=login1.php'>";

		}

		else{

			echo "<script>alert('Data gagal ditambahkan')</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Daftar Akun</title>
	<meta charset="UTF-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/mainreg.css">


	
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-26">
						Daftar Akun
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>


					<div class="wrap-input100 validate-input" id="nl">
						<input class="input100" type="text" id="nl" name="nl" required placeholder="Nama Lengkap">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input" id="un">
						<input class="input100" type="text" id="un" name="un" required placeholder="Username">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input" id="pw">
						<input class="input100" type="password" id="pw" name="pw" required placeholder="Password">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input" id="up">
						<input class="input100" type="password" id="up" name="up" required placeholder="Ulangi Passwords">
						<span class="focus-input100"></span>
					</div>

					<div class ></div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" href="login1.php" >
								Daftar
							</button>
						</div>
					</div>

					<div class="text-center p-t-15">
						<span class="txt1">
							Sudah memiliki akun?
						</span>

						<a class="txt2" href="login1.php">
							<u>Masuk</u>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php
	include_once 'footer.php'
	?>

	<div id="dropDownSelect1"></div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

