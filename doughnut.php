<?php
$koneksi    = mysqli_connect("localhost", "root", "", "grafik1");
$frekuensi     = mysqli_query($koneksi, "SELECT * FROM distribusi WHERE frekuensi ");
$frekuensip    = mysqli_query($koneksi, "SELECT * FROM distribusi WHERE frekuensip ");
$nilai    = mysqli_query($koneksi, "SELECT * FROM distribusi WHERE nilai");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chartjs, PHP dan MySQL Demo Grafik Lingkaran (Doughnut)</title>
    <script src="js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
    </style>
  </head>
  <body>

    <div class="container">
        <canvas id="piechart" width="100" height="100"></canvas>
    </div>

  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("piechart").getContext("2d");
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($nilai)) { echo '"' . $p['nilai'] . '",';}?>],
            datasets: [
            {
              label: "rentang umur",
              data: [<?php while ($p = mysqli_fetch_array($frekuensi)) { echo '"' . $p['frekuensi'] . '",';}?>],
              backgroundColor: [
                '#2A516E',
                '#F07124',
                '#CBE0E3',
                '#979193'
              ]
            },
            {
              label: "banyak orang",
              data: [<?php while ($p = mysqli_fetch_array($frekuensip)) { echo '"' . $p['frekuensip'] . '",';}?>],
              backgroundColor: [
                '#29B0D0',
                '#2A516E',
                '#F07124',
                '#CBE0E3'
              ]
            }
            ]
            };

  var myPieChart = new Chart(ctx, {
                  type: 'doughnut',
                  data: data,
                  options: {
                    responsive: true
                }
              });

</script>