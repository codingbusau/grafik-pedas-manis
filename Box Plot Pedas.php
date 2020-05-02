<?php
$koneksi    = mysqli_connect("localhost", "root", "", "grafik1");
$frekuensi  = mysqli_query($koneksi, "SELECT frekuensiP FROM pedas ");
$nilai       = mysqli_query($koneksi, "SELECT nilaiP FROM pedas");
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
  function getDummy() {
    var labels = [ 'data1', 'data2' ];
    var data = [
      { MIN: 10, Q1: 20, Q2: 40, Q3: 70, MAX: 150 },
      { MIN: 20, Q1: 50, Q2: 70, Q3: 100, MAX: 130 }
    ];

    return { labels: labels, data: data };
  }

  window.onload = function() {
    var dummy = getDummy();
    Boxplot.print('chart', dummy.data, dummy.labels);
  }

</script>
