<?php
//koneksi
session_start();
include "koneksi.php";

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
  <!--navbar navbar-default navbar-custom-->
  <!-- Header -->
  <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1">
                <span class="text-dark h4">Sistem Pendukung Keputusan</span> <span class="text-primary h4">Metode Topsis</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="navbar-toggler-success">
                <div class="flex-fill mx-xl-5 mb-2">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                <li class="nav-item">
                  <a class="nav-link btn-outline-primary rounded-pill px-3" href="login.html">Login</a>
                </li>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->
  
    <!--menu-->
  <div id="slider">
    <figure>
      <img src="gambar/1.png">
      <img src="gambar/2.png">
      <img src="gambar/3.png">
      <img src="gambar/2.png">
    </figure>
  </div> <br><br>
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