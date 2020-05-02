<?php
$koneksi       = mysqli_connect("localhost", "root", "", "grafik1");
$frekuensi     = mysqli_query($koneksi, "SELECT * FROM distribusi WHERE frekuensi ");
$frekuensip    = mysqli_query($koneksi, "SELECT * FROM distribusi WHERE frekuensip ");
$nilai    = mysqli_query($koneksi, "SELECT * FROM distribusi WHERE nilai");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chartjs, PHP dan MySQL Demo Grafik Lingkaran</title>
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
  var ctx = document.getElementById("canvas").getContext("2d");
  var Data = {
      labels: [<?php while ($p = mysqli_fetch_array($nilai)) { echo '"' . $p['nilai'] . '",';}?>],
      datasets: [
      {
        label: 'Dataset 1',
        backgroundColor: "#29B0D0",
        borderColor: "#29B0D0",
        borderWidth: 1,
        data: [<?php while ($p = mysqli_fetch_array($frekuensi)) { echo '"' . $p['frekuensi'] . '",';}?>],
      }, 
      {
        label: 'Dataset 2',
        backgroundColor: "#2A516E",
        borderColor: "#2A516E",
        borderWidth: 1,
        data: [<?php while ($p = mysqli_fetch_array($frekuensip)) { echo '"' . $p['frekuensip'] . '",';}?>],
      }]

    };

  var myBarChart = new Chart(ctx, {
        type: 'horizontalBoxplot',
        data: Data,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Chart.js Box Plot Chart'
          },
          tooltipDecimals: 4
        }
      });

</script>