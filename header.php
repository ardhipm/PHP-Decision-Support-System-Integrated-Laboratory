<?php
include "includes/koneksi.php";
session_start();
if (!isset($_SESSION['nama_lengkap'])) {
  echo "<script>location.href='login1.php'</script>";
}
$koneksi = new Koneksi();
$db = $koneksi->getConnection();
include_once 'includes/kriteria.inc.php';
$pro1 = new Kriteria($db);
?>
<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

</head>
<body><body id="body">

  <!--==========================
    Top Bar
    ============================-->
    <section id="topbar">
      <div class="container clearfix">
        <div class="contact-info float-left">
          <i class="fa fa-envelope-o"></i> <a href="mailto:ardhip63@gmail.com">ardhip63@gmail.com</a>
          <i class="fa fa-phone"></i> +62 87870520434
        </div>
        <div class="social-links float-right">
          <a href="https://twitter.com/Ardhimhrdika" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
          <a href="https://www.facebook.com/ardhi.p.mahardika" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="https://www.instagram.com/ardhipm/" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </section>

  <!--==========================
    Header
    ============================-->
    <header id="header">
      <div class="container">

        <div id="logo" class="pull-left">
          <h1><a href="halaman_utama.php" class="scrollto">SPK<span>ILAB</span></a></h1>

        </div>

        <nav id="nav-menu-container navbar-left">
          <ul class="nav-menu">
            <li class="menu-has-children"><a href="">Analisis Data</a>
              <ul>
                <li><a href="hitung_kriteria.php">Analisis Data Kriteria</a></li>
                <li><a href="hitung_alternatif.php ?>">Analisis Data Alternatif</a></li>
              </ul>
            </li>
            <li><a onclick="konsistensi()" style="cursor: pointer;">Rangking</a></li>
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
          </ul>
        </nav>

        <ul class="nav navbar-nav navbar-right" style="margin-right: 10px;">
          <ul class="nav-menu">
            <li class="menu-has-children"><a href=""><?php echo $_SESSION['nama_lengkap']?></a>
              <ul>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </ul>
          </ul>
        </div>
      </header><!-- #header -->

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    </body>
    </html>