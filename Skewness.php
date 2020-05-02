<?php
$koneksi       = mysqli_connect("localhost", "root", "", "grafik1");
$frekuensi     = mysqli_query($koneksi, "SELECT * FROM distribusi WHERE frekuensi ");
$frekuensip    = mysqli_query($koneksi, "SELECT * FROM distribusi WHERE frekuensip ");
$nilai         = mysqli_query($koneksi, "SELECT * FROM distribusi WHERE nilai");
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
  var ctx = document.getElementById("piechart").getContext("2d");
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($nilai)) { echo '"' . $p['nilai'] . '",';}?>],
            datasets: [
            {
              label: "pedas",
              data: [<?php while ($p = mysqli_fetch_array($frekuensi)) { echo '"' . $p['frekuensi'] . '",';}?>],
              backgroundColor: [
                '#29B0D0',
                '#29B0D0',
                '#29B0D0',
                '#29B0D0',
                '#29B0D0'
                
              ]
            },
            {
              label: "manis",
              data: [<?php while ($p = mysqli_fetch_array($frekuensip)) { echo '"' . $p['frekuensip'] . '",';}?>],
              backgroundColor: [
                '#2A516E',
                '#2A516E',
                '#2A516E',
                '#2A516E',
                '#2A516E'
              ]
            }
            ]
            };

    let chart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: {
        scales: {
            y: {
                suggestedMin: 10,
                suggestedMax: 50
            }
        }
    }
});

</script>