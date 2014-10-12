<?php

require_once ("includes/initialize.php");

if (! $session->is_logged_in ()) {
	redirect_to ( "login.php" );
}

$total_count = Product::count_status ();

echo $total_count;









?>

<head>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Pending',     <?php echo $total_count?>],
          ['Reject',      2],
          ['Close',  2],
          ['Comleted', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <p>pending = <?php echo $total_count ?></p>
    
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    <p><a href="admin_home.php">Home Page</a></p>
    
  </body>