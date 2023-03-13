<?php
//koneksi
session_start();
include("koneksi.php");

// //pemberian kode id secara otomatis
// $carikode = $koneksi->query("SELECT id_kriteria FROM tab_kriteria") or die(mysqli_error());
// $datakode = $carikode->fetch_array();
// $jumlah_data = mysqli_num_rows($carikode);

// if ($datakode) {
//   $nilaikode = substr($jumlah_data[0], 1);
//   $kode = (int) $nilaikode;
//   $kode = $jumlah_data + 1;
//   $kode_otomatis = str_pad($kode, 0, STR_PAD_LEFT);
// } else {
//   $kode_otomatis = "1";
// }

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SPK PEMILIHAN SUNSCREEN SPF 50++ TERBAIK MENGGUNAKAN METODE TOPSIS</title>
  <!--bootstrap-->
  <link href="tampilan/css/bootstrap.min.css" rel="stylesheet">
  <link href="styles/slider.css" rel="stylesheet" type="text/css" media="all">

  <!--icon-->
  <link href="tampilan/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Load Require CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
</head>

<body><br>
<!-- Header -->
<nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" href="home.php">
              <span class="text-dark h4">SPK</span> <span class="text-primary h4">Metode Topsis</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="navbar-toggler-success">
                <div class="flex-fill mx-xl-5 mb-2">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="kriteria.php">Kriteria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="alternatif.php">Alternatif</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="nilmat.php">Nilai Matriks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="hastop.php">Hasil Topsis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

  <div class="container">

    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading text-center">
            Kriteria
          </div>

          <ul class="nav nav-tabs">
            <li>
              <a href="kriteria.php" data-toggle="tab">Tabel Kriteria</a>
            </li>
            <li class="active">
              <a href="kriteriatambah.php" data-toggle="tab">Tambah Kriteria</a>
            </li>
          </ul>

          <div class="panel-body">
            <!-- Tab panes -->
            <div class="tab-content">
              <!--form kriteria-->
              <form class="form" action="tambahkriteria.php" method="post">
                <div class="form-group">
                  <input class="form-control" type="text" name="id_krit" placeholder="ID Kriteria">
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" name="nm_krit" placeholder="Nama Kriteria">
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" name="bobot" placeholder="Bobot">
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" name="status" placeholder="Status">
                </div>
                <div class="form-group">
                  <input class="btn btn-success" type="submit" name="simpan" value="Tambah">
                </div>
              </form>
              <!--form kriteria-->
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!--footer-->
  <div class="w-100 bg-primary py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-lg-6 col-sm-12">
                        <p class="text-lg-start text-center text-light light-300">
                          SPK Pemilihan Sunscreen SPF 50+++ 
                        </p>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <p class="text-lg-end text-center text-light light-300">
                            Kelompok 4
                        </p>
                    </div>
                </div>
            </div>
        </div>


  <!--plugin-->
  <script src="tampilan/js/bootstrap.min.js"></script>

</body>

</html>