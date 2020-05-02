<?php
$koneksi    = mysqli_connect("localhost", "root", "", "grafik1");
$pedas      = mysqli_query($koneksi, "SELECT * FROM tiperasa WHERE type='pedas'");
$manis      = mysqli_query($koneksi, "SELECT * FROM tiperasa WHERE type='manis'");

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chartjs, PHP dan MySQL Demo Grafik Garis</title>
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
        <canvas id="linechart" width="200" height="200"></canvas>
    </div>

  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("linechart").getContext("2d");
  var data = {
            labels: ["16 s/d 17","18 s/d 19","20 s/d 21","22 s/d 23","24 s/d 25"],
            datasets: [
                  {
                    label: "pedas",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#29B0D0",
                    borderColor: "#29B0D0",
                    pointHoverBackgroundColor: "#29B0D0",
                    pointHoverBorderColor: "#29B0D0",
                    data: [<?php while ($p = mysqli_fetch_array($pedas)) { echo '"' . $p['16 s/d 17'] . '","' . $p['18 s/d 19'] . '","' . $p['20 s/d 21'] . '","' . $p['22 s/d 23'] . '","' . $p['24 s/d 25']  . '",';}?>]
                  },
                  {
                    label: "manis",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#2A516E",
                    borderColor: "#2A516E",
                    pointHoverBackgroundColor: "#2A516E",
                    pointHoverBorderColor: "#2A516E",
                    data: [<?php while ($p = mysqli_fetch_array($manis)) { echo '"' . $p['16 s/d 17'] . '","' . $p['18 s/d 19'] . '","' . $p['20 s/d 21'] . '","' . $p['22 s/d 23'] . '","' . $p['24 s/d 25']  . '",';}?>] 
                  }
                  
                  ]
          };

  var myBarChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
            legend: {
              display: true
            },
            barValueSpacing: 20,
            scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                  }
              }],
              xAxes: [{
                          gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                          }
                      }]
              }
          }
        });
</script>