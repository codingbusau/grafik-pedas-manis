<?php
$koneksi    = mysqli_connect("localhost", "root", "", "grafik1");
$frekuensi  = mysqli_query($koneksi, "SELECT frekuensiM FROM manis ");
$nilai       = mysqli_query($koneksi, "SELECT nilaiM FROM manis");
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
            labels: [<?php while ($p = mysqli_fetch_array($nilai)) { echo '"' . $p['nilaiM'] . '",';}?>],
            datasets: [
            {
              label: "banyak orang",
              data: [<?php while ($p = mysqli_fetch_array($frekuensi)) { echo '"' . $p['frekuensiM'] . '",';}?>],
              backgroundColor: [
                '#29B0D0',
                '#2A516E',
                '#F07124',
                '#CBE0E3',
                '#979193'
              ]
            }
            ]
            };

  var myPieChart = new Chart(ctx, {
                  type: 'pie',
                  data: data,
                  options: {
                    responsive: true
                }
              });

</script>