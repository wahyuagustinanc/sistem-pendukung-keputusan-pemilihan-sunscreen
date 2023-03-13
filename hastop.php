<?php
//koneksi
session_start();
include("koneksi.php");

$tampil = $koneksi->query("SELECT b.nama_alternatif,c.nama_kriteria,a.nilai,c.bobot,c.status
      FROM
        tab_topsis a
        JOIN
          tab_alternatif b USING(id_alternatif)
        JOIN
          tab_kriteria c USING(id_kriteria)");

$data      = array();
$kriterias = array();
$bobot     = array();
$nilai_kuadrat = array();
$status = array();

if ($tampil) {
  while ($row = $tampil->fetch_object()) {
    if (!isset($data[$row->nama_alternatif])) {
      $data[$row->nama_alternatif] = array();
    }
    if (!isset($data[$row->nama_alternatif][$row->nama_kriteria])) {
      $data[$row->nama_alternatif][$row->nama_kriteria] = array();
    }
    if (!isset($nilai_kuadrat[$row->nama_kriteria])) {
      $nilai_kuadrat[$row->nama_kriteria] = 0;
    }
    $bobot[$row->nama_kriteria] = $row->bobot;
    $data[$row->nama_alternatif][$row->nama_kriteria] = $row->nilai;
    $nilai_kuadrat[$row->nama_kriteria] += pow($row->nilai, 2);
    $kriterias[] = $row->nama_kriteria;
    $status[$row->nama_kriteria] = $row->status;
  }
}

$kriteria     = array_unique($kriterias);
$jml_kriteria = count($kriteria);
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
  <!--menu-->
  <!--tabel-tabel-->
  <div class="container">
    <!--container-->
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            Evaluation Matrix (x<sub>ij</sub>)
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th rowspan='3'>No</th>
                  <th rowspan='3'>Alternatif</th>
                  <th rowspan='3'>Nama</th>
                  <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                </tr>
                <tr>
                  <?php
                  foreach ($kriteria as $k)
                    echo "<th>$k</th>\n";
                  ?>
                </tr>
                <tr>
                  <?php
                  for ($n = 1; $n <= $jml_kriteria; $n++)
                    echo "<th>K$n</th>";
                  ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($data as $nama => $krit) {
                  echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A$i</th>
                      <td>$nama</td>";
                  foreach ($kriteria as $k) {
                    echo "<td align='center'>$krit[$k]</td>";
                  }
                  echo "</tr>\n";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            Rating Kinerja Ternormalisasi (r<sub>ij</sub>)
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th rowspan='3'>No</th>
                  <th rowspan='3'>Alternatif</th>
                  <th rowspan='3'>Nama</th>
                  <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                </tr>
                <tr>
                  <?php
                  foreach ($kriteria as $k)
                    echo "<th>$k</th>\n";
                  ?>
                </tr>
                <tr>
                  <?php
                  for ($n = 1; $n <= $jml_kriteria; $n++)
                    echo "<th>K$n</th>";
                  ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($data as $nama => $krit) {
                  echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                  foreach ($kriteria as $k) {
                    echo
                    "<td align='center'>" . round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 4) .
                      "</td>";
                  }
                  echo
                  "</tr>\n";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            Rating Bobot Ternormalisasi(y<sub>ij</sub>)
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th rowspan='3'>No</th>
                  <th rowspan='3'>Alternatif</th>
                  <th rowspan='3'>Nama</th>
                  <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                </tr>
                <tr>
                  <?php
                  foreach ($kriteria as $k)
                    echo "<th>$k</th>\n";
                  ?>
                </tr>
                <tr>
                  <?php
                  for ($n = 1; $n <= $jml_kriteria; $n++)
                    echo "<th>K$n</th>";
                  ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $y = array();
                foreach ($data as $nama => $krit) {
                  echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                  foreach ($kriteria as $k) {
                    $y[$k][$i - 1] = round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 4) * $bobot[$k];
                    echo "<td align='center'>" . $y[$k][$i - 1] . "</td>";
                  }
                  echo
                  "</tr>\n";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            Solusi Ideal positif (A<sup>+</sup>)
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                </tr>
                <tr>
                  <?php
                  foreach ($kriteria as $k)
                    echo "<th>$k</th>\n";
                  ?>
                </tr>
                <tr>
                  <?php
                  for ($n = 1; $n <= $jml_kriteria; $n++)
                    echo "<th>y<sub>{$n}</sub><sup>+</sup></th>";
                  ?>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $yplus = array();
                  foreach ($kriteria as $k) {
                    $yplus[$k] = ($status[$k] == 'Benefit' ? max($y[$k]) : min($y[$k]));

                    echo "<th>$yplus[$k]</th>";
                  }
                  ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            Solusi Ideal negatif (A<sup>-</sup>)
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                </tr>
                <tr>
                  <?php
                  foreach ($kriteria as $k)
                    echo "<th>{$k}</th>\n";
                  ?>
                </tr>
                <tr>
                  <?php
                  for ($n = 1; $n <= $jml_kriteria; $n++)
                    echo "<th>y<sub>{$n}</sub><sup>-</sup></th>";
                  ?>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $ymin = array();
                  foreach ($kriteria as $k) {
                    $ymin[$k] = ($status[$k] == 'Cost' ? max($y[$k]) : min($y[$k]));
                    echo "<th>{$ymin[$k]}</th>";
                  }

                  ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            Jarak positif (D<sub>i</sub><sup>+</sup>)
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Alternatif</th>
                  <th>Nama</th>
                  <th>D<suo>+</sup></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $dplus = array();
                foreach ($data as $nama => $krit) {
                  echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                  foreach ($kriteria as $k) {
                    if (!isset($dplus[$i - 1])) $dplus[$i - 1] = 0;
                    $dplus[$i - 1] += pow($yplus[$k] - $y[$k][$i - 1], 2);
                  }
                  echo "<td>" . round(sqrt($dplus[$i - 1]), 4) . "</td>
                     </tr>\n";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            Jarak negatif (D<sub>i</sub><sup>-</sup>)
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Alternatif</th>
                  <th>Nama</th>
                  <th>D<suo>-</sup></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $dmin = array();
                foreach ($data as $nama => $krit) {
                  echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                  foreach ($kriteria as $k) {
                    if (!isset($dmin[$i - 1])) $dmin[$i - 1] = 0;
                    $dmin[$i - 1] += pow($ymin[$k] - $y[$k][$i - 1], 2);
                  }
                  echo "<td>" . round(sqrt($dmin[$i - 1]), 4) . "</td>

                     </tr>\n";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            Nilai Preferensi(V<sub>i</sub>)
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Alternatif</th>
                  <th>Nama</th>
                  <th>V<sub>i</sub></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $V = array();
                $Y = array();
                $Z = array();
                $hasilakhir = array();


                foreach ($data as $nama => $krit) {
                  echo "<tr>
                            <td>" . (++$i) . "</td>
                            <th>A{$i}</th>
                            <td>{$nama}</td>";
                  foreach ($kriteria as $k) {
                    $V[$i - 1] = round(sqrt($dmin[$i - 1]), 4) / (round(sqrt($dmin[$i - 1]), 4) + round(sqrt($dplus[$i - 1]), 4));
                  }
                  echo "<td>{$V[$i - 1]}</td></tr>\n";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--container-->

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