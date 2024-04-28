<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link rel="stylesheet" href="chart.css">
    <link rel="stylesheet" href="navigation.css">
</head>
<body>
  <div class="main_container" id="home">
<!-- Navigation Bar -->
  <div class="navbar">
      <div class="logo">
      <a href="#"><img src="gfs_logo.svg" alt="" data-variantitemid="{EC1ADFD7-2453-4D5D-95A9-4B570FDEA2F9}" data-variantfieldname="Image" class="" loading="lazy"></a>
    </div>
        <div class="navbar_items">
        <ul>
        <li><a href="home.php">LOGOUT</a></li>
          <li><a href="home.php">CONTACT US</a></li>
          <li><a href="stud_login.php">STUDENT</a></li>
          <li><a href="home.php">HOME</a></li>
        </ul>
        </div>
  </div> 
  <div class="banner_image">
        <div class="form-box">
            <div class="button-box">
                <div>
                <h2><center>Attendance Chart</center></h2></div>
                </div>

<!-- Loading Libraries of Chart JS, JQuery in order to make the chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">


  // Loading chart type
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    // Creating callable function which creates chart
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Subject Professor', 'Attendance'],

        // Getting Subject name, and attendance from database by the following php script 
        <?php
        $serverName="localhost";
        $userName="root";
        $password= "Ammar@123";
        $dbName= "sptt";
        
        $con = mysqli_connect($serverName, $userName, $password, $dbName);
        if($con){
          echo "";
        }
        else{
          echo "no connection";
        }
        session_start();
        $student_id= $_SESSION['studentID'];
        $query = "select sub_name,attendance from `attendance` where stud_id=$student_id";
        $fire = mysqli_query($con,$query);
        if($fire->num_rows !=0){
        while($res = mysqli_fetch_assoc($fire)){
          echo "['".$res['sub_name']."',".$res['attendance']."],";
        }
      }
        else{
          echo "Not Present";
      }
        ?>
          
        
      ]);

      var view = new google.visualization.DataView(data);
      // Setting options for the attendance graph
      var options = {
        title: "Subject wise Attendance: ",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
        vAxis: { viewWindow: {max: 100, min:0}
        }
      };
      //Following javascript code gets html element by ID of "columnchart_values"
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(data, options);
  }

  </script>

  <!--This html element is called to the javascript above to display attendance chart -->
  <div id="columnchart_values" style="width: 50%; height: 50%; "></div>
  </div>
</div>
  </div>
</body>

</html>