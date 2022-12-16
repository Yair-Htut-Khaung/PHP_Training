
<?php
        include 'header.php';
?>
<?php
        include 'connection.php';
        include 'carbontest.php';
       
        use Carbon\Carbon;
       use Carbon\CarbonInterval;
       use Carbon\CarbonPeriod;
       
       // Check connection
       if ($conn->connect_error)
       {
         die("Connection failed: " . $conn->connect_error);
       }
       
       $now = Carbon::now();
       $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
       $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');
       
       $period = CarbonPeriod::create($weekStartDate, $weekEndDate);
       
       // Iterate over the period
       foreach ($period as $date) {
           $created_datetime = $date->format('Y-m-d');
          
       
               
       
       
       
       $sql = "SELECT  COUNT(*) as count
       FROM EventList WHERE created_datetime = '$created_datetime'";
       $result = $conn->query($sql);
       
               if ($result->num_rows > 0)
               {
                   
                   // output data of each row
                   while($row = $result->fetch_assoc()) {
                    
                     $month[] = $created_datetime;
                    $countdate[] = $row["count"];

                    
                   }
                 } else {
                   echo "0 results";
                 }
                    
               }      
    ?>
<div class="canvas-pos">
<div class="tab-link clear-fix">
        <a href="index.php" class="action f-left edit">Back</a>
        <a href="yearly.php" class="action f-right">Yearly</a>
        <a href="monthly.php" class="action f-right">Monthly</a>
        <a href="weekly.php" class="action f-right">Weekly</a>
    </div>

  <canvas id="myChartw"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChartw');

  new Chart(ctx,
  {
    type: 'bar',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      width :1,
      datasets: [{
        label: 'Weekly Created Post',
        data: <?php echo json_encode($countdate) ?>,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes: [{
                // Change here
            	barThickness: 0.6
            }]
      }
    }
  });
</script>
<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/comn.js"></script>
 
</body>
</html>