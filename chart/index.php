
<?php
#samples of codes that used are taken from https://developers.google.com/chart/interactive/docs/php_example 

require 'stationsconfig.php';  
?>

<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);
    
    //The part where Scatter chart is set up
    function drawChart() {
        $(document).ready(function(){
          $.ajax({
          url: "scatterconfig.php",
          method: "get",
          dataType: "json",
          
          //pass through the data that are made in scatterconfig.php 
          success: function(data){
            var chartData = google.visualization.arrayToDataTable([
              ['month', '(nO) average reading at 08:00:'],
              ['January',data.JanuaryAverage],
              ['February',data.FebruaryAverage],
              ['March',data.MarchAverage],
              ['April',data.AprilAverage],
              ['May', data.MayAverage],
              ['June',data.JuneAverage],
              ['July',data.JulyAverage],
              ['August',data.AugustAverage],
              ['September',data.JuneAverage],
              ['October',data.JulyAverage],
              ['November',data.AugustAverage],
              ['Decemeber',data.AugustAverage]
            ]);

       var options = {
        width: 800,
          height: 500,
              title: 'Parson Street School, Station: 215 : (nO) average reading at 08:00 2017',
              colors: ['#036cff'],
              hAxis: {title: 'Months', slantedText:true, slantedTextAngle:45},
              vAxis: {title: 'Average nO Value (µg/m³)'},
              legend: 'none'
            };

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.ScatterChart(document.getElementById('scatter_chart_area'));
     
      chart.draw(chartData, options);

        }
          })
     }
)}
       
       // Set a callback to run when the Google Visualization API is loaded.
       google.charts.setOnLoadCallback(drawLineChart);
       
       //The part where chart Line is set up
       function drawLineChart() {

        var lineData = new google.visualization.DataTable();
            lineData.addColumn('timeofday', 'time');
            lineData.addColumn('number', 'n0 reading');
            lineData.addColumn('number', 'n02 reading');
            lineData.addColumn('number', 'n0X reading');
            
         
            lineData.addRows([
                       <?php foreach ($Dailytime as $a => $Value) { ?>
                        [[
                        <?php echo $Value; ?>, 0, 0], 
                        <?php echo $n0Val[$a]; ?>,
                        <?php echo $n02Val[$a]; ?>, 
                        <?php echo $n0XVal[$a]; ?> ],
                         <?php } ?>
                        ]);

      var options = {
        width: 800,
          height: 500,
        title: 'Time of reading <?php echo $ChoosenDate; ?> at Station <?php echo $stat_Name; ?>',
        hAxis: {
          title: 'Time of reading'
        },
        vAxis: {
          title: 'Value (µg/m³)'
        }
      };
  
      var lineChart = new google.visualization.LineChart(document.getElementById('scatter_line_area'));
      lineChart.draw(lineData, options);
      
      }
        
    </script>
  </head>

  <body>
  <h3 align="center">Scatter Chart</h3>
    <!--Div that will hold the scatter chart-->
    <div id="scatter_chart_area" align="center"></div>

    <br><br>
    <br><br>

  <h3 align="center">Line Chart</h3>
  <form action="" method="get">
    <label>Select Station</label>
    <select name="stat_name">
      <?php foreach ($stationsArray as $station) {
        echo "<option selected='selected'>" . $station . "</option>";
      } ?>
    </select>
    <label for="date" >Select Date</label>
    <input type="date" id="date" name="date" min="2015-01-01" max="2019-12-31" value="<?php echo $date; ?>">
    <input type="submit" value="Submit">
    <div id="scatter_line_area" align="center"></div>
  </form>
  </body>
</html>
