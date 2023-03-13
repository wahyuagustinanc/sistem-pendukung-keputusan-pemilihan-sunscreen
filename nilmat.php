<?php
//koneksi
session_start();
include("koneksi.php");

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

  <!--menu-->
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

  <!--tabel-tabel dan form-->
  <div class="container">
    <!--container-->
    <div class="row">
      <!--row-->
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading text-center">
            Nilai Matriks
          </div>

          <div class="panel-body">
            <!--form pengisian-->
            <div class="row">
              <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                  <div class="panel-heading text-center">
                    Alternatif
                  </div>

                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <form class="form" action="tambahnilmat.php" method="post">
                          <div class="form-group">
                            <select class="form-control" name="alter">
                              <option>Nama Alternatif</option>
                              <?php
                              //ambil data dari database
                              $nama = $koneksi->query('SELECT * FROM tab_alternatif ORDER BY nama_alternatif');
                              while ($datalter = $nama->fetch_array()) {
                                echo "<option value=\"$datalter[id_alternatif]\">$datalter[nama_alternatif]</option>\n";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <select class="form-control" name="krit">
                              <option>Nama Kriteria</option>
                              <?php
                              //ambil data dari database
                              $krit = $koneksi->query('SELECT * FROM tab_kriteria ORDER BY nama_kriteria');
                              while ($datakrit = $krit->fetch_array()) {
                                echo "<option value=\"$datakrit[id_kriteria]\">$datakrit[nama_kriteria]</option>\n";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <input class="form-control" type="text" name="nilai" placeholder="Nilai">
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-success">Proses</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!--tabel-tabel-->
              <div class="row">
                <!--tabel alternatif-->
                <div class="col-xs-6 col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading text-center">
                      Tabel Alternatif
                    </div>

                    <div class="panel-body">
                      <div class="row">
                        <div class="col-lg-12">

                          <?php
                          $sql = $koneksi->query('SELECT * FROM tab_alternatif');
                          ?>
                          <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>ID Alternatif</th>
                                <th>Nama Alternatif</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              while ($row = $sql->fetch_array()) {
                                echo ("<tr><td align=\"center\">" . $row[0] . "</td>");
                                echo ("<td align=\"left\">" . $row[1] . "</td>");
                                echo "</tr>";
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <!--tabel kriteria-->

                <div class="col-xs-6 col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading text-center">
                      Tabel Kriteria
                    </div>

                    <div class="panel-body">
                      <div class="row">
                        <div class="col-lg-12">

                          <?php
                          $sql = $koneksi->query('SELECT * FROM tab_kriteria');
                          ?>
                          <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>ID Kriteria</th>
                                <th>Nama Kriteria</th>
                                <th>Bobot</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              while ($row = $sql->fetch_array()) {
                                echo ("<tr><td align=\"center\">" . $row[0] . "</td>");
                                echo ("<td align=\"left\">" . $row[1] . "</td>");
                                echo ("<td align=\"left\">" . $row[2] . "</td>");
                                echo "</tr>";
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!--row-->
  </div>
  <!--container-->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Tabel Pemberian Nilai
          </div>

          <div class="panel-body">
            <?php
            //pemanggilan data, matra dan pangkat
            $sql = $koneksi->query("SELECT * FROM tab_topsis
                  JOIN tab_alternatif ON tab_topsis.id_alternatif=tab_alternatif.id_alternatif
                  JOIN tab_kriteria ON tab_topsis.id_kriteria=tab_kriteria.id_kriteria") or die(mysql_error());
            ?>
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>ALTERNATIF</th>
                  <th>KRITERIA</th>
                  <th>NILAI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                //menampilkan data
                while ($row = $sql->fetch_array()) {
                  $nmkriteria   = $row['nama_kriteria'];
                  echo ("<tr><td align=\"center\">" . $no . "</td>");
                  echo ("<td align=\"left\">" . $row[4] . "</td>");
                  echo ("<td align=\"left\">" . $nmkriteria . "</td>");
                  echo ("<td align=\"left\">" . $row[2] . "</td>");
                  echo "</tr>";
                  $no++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--row-->
  </div>
  <!--container-->
  <!--footer-->
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