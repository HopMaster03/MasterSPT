<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link rel="stylesheet" href="chart.css">
    <link rel="stylesheet" href="navigation.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="marksfunction.js"></script>
    <script>

    </script>

</head>
<body>
  

<!-- Full page -->
  <div class="main_container" id="home">
<!-- Navigation -->
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
    <main>
<!-- Left Page -->
      <div class='float-container'>
        
        <div class="float-child-left" >
          <h2 style="text-align: center;padding-bottom:10px;width:100%;font-family:Arial, Helvetica, sans-serif;font-size:25px;color:black;">Student Leaderboard</h2>
<!-- Marks Table -->
<section class="leaderboard">
            <table id="applytorank"class="table-fill">
                <thead>
                    <tr>
                        <th class="rank__title">Rank</th>
                        <th class="address__title">Name</th>
                        
                    </tr>
                </thead>
                <tbody id="leaderboard">
                    <tr>
                        <td>1</td>
                        <td>Aafia</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Sunanda</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Jake</td>
                    </tr>
                    
                    
                </tbody>
            </table>
            <!-- Script to get data of rank and name -->
            <!-- <script>
            $(document).ready(function(){
            // Make AJAX request to fetch data
            $.ajax({
            url: 'fetch_rank.php',
            type: 'get',
            dataType: 'json',
            success: function(data){
            // console.log(data);
            // Populate table with fetched data
            var table = $('#applytorank tbody');
            for (var i = 0; i < data.subject.length; i++) {
                var tr = $('<tr>');
                tr.append($('<td>').text(data.rank[i]));
                tr.append($('<td>').text(data.subject[i]));
                
                
                table.append(tr);
            }
          ;
        },
        error: function(xhr, status, error){
            console.error(xhr.responseText);
        }
    });
});
</script> -->
        </section>
<!-- ScoreCard -->

        </div>
<!-- Center page -->
        
        <div class="mainpage">
          <div>
          <div class="search">
            <form method="POST">
                <input type="number" placeholder="  Enter Student ID" name="search">
                <button type="submit" name="submit" value="Submit">
                    <i class="fa fa-search" style="font-size: 18px;"></i>
                </button>
            </form>
            <?php
	$serverName="localhost";
	$userName="root";
	$password= "Ammar@123";
	$dbName= "sptt";
	
	$conn = mysqli_connect($serverName, $userName, $password, $dbName);
	if (isset($_POST['submit'])) {
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $stud_id = $_POST['search'];
            $_SESSION['studentID'] = $stud_id;
        }
        
        
        

    }
    ?>

        </div>
          
        <div class="firstgraph">
        <div>
  <canvas id="myChart" width="850" height="325"></canvas>
  
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<!-- Getting data for first chart -->
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
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $stud_id=$_SESSION['studentID']; 
    // Start the session if it's not already started
  }
  
$query = "select * from `result` where stud_id='$stud_id'";
$fire = mysqli_query($con,$query); 
//wake up and remove the sub_name from the php files, find a way to get the graph working

if($fire->num_rows !=0){
  $final= array();
  $mock = array();
  $midterm = array();
  
  while($res = mysqli_fetch_assoc($fire)){
  $final[]=$res["final"];
  $mock[]=$res["mock"];
  $midterm[]=$res["mid_term"];
  $subject[]=$res["sub_name"];
  
}
}
else{
  echo "Not Present";
}

        

?>


<!-- First graph -->
<script>

  //setup block
  const final=<?php echo json_encode($final);?>;
  const mock=<?php echo json_encode($mock);?>;
  const midterm=<?php echo json_encode($midterm);?>;
  const desclabel=<?php echo json_encode($subject);?>;
  const data={
    labels: desclabel,
      datasets: [{
        label: 'Midterm',
        data: midterm,
        borderWidth: 1
      },
      {
        label: 'Mock',
        data: mock,
        borderWidth: 1
      },
      {
        label: 'Final',
        data: final,
        borderWidth: 1
      }]

  };
  
  //Config block
  const config = {
    type: 'bar',
    data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  }
  //Render block
  const myChart=new Chart(
    document.getElementById("myChart"),
    config
  );


</script>

        
        </div>

          </div>
<!-- Dropdown menu for second graph -->
          <div>
          <div class="selectoption1">
            <label class="custom-select">
              Select the Subject record:
              
              <select id="subjectSelect">
              
              </select>
              <script>
$(document).ready(function(){
    // Make AJAX request to fetch subjects
    $.ajax({
        url: 'fetch_subject.php',
        type: 'get',
        dataType: 'json',
        success: function(subjects){
            // console.log(subjects);
            // Populate dropdown menu with fetched subjects
            var select = $('#subjectSelect');
            $.each(subjects, function(index, subject){
                select.append($('<option>', {
                    value: subject,
                     text: subject
                }));
            });
        },
        error: function(xhr, status, error){
            console.error(xhr.responseText);
        }
    });
});
</script>
              
            
            </label>
          
          </div>
          <div class="secondgraph">
          <div>
          <!-- Getting data for second chart -->
          <?php
          // $subject_name = $_COOKIE['subjectName'];
          

          ?>
          <canvas id="line-chart"></canvas>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
          <!-- Script for second chart -->
          <script>
             $(document).ready(function(){
    $("#subjectSelect").change(function(){
        var subject = $(this).val();
        $.ajax({
            url: 'fetch_data.php',
            type: 'post',
            data: {subject: subject},
            dataType: 'json',
            success: function(response){
                
                updateChart(response[1], response[0]);
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
            }
        });
    });

    function updateChart(labels, data){
        
        
        var ctx = document.getElementById('line-chart').getContext('2d');
        // Check if a chart instance already exists
        if(window.myChart instanceof Chart){
        // If a chart instance exists, destroy it
        window.myChart.destroy();
        }
        window.myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Subject Data',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
});
        </script>
<!-- Script to get the data for the graphs -->

          </div>
          </div>

          </div>
  
        
        
        </div>  
        <div class="rightpage">
        <div class="profileicon">
          <div class="icon"><i class="fa-solid fa-user" style="color: #4E5066;"></i></div>
      
        
        <div class="container">
          <table id='applytofail'class="table-fill">
            <tr>
                <th>Student</th>
                <th>Failing Grade</th>
            </tr>
           
            <tr>
                <td>Jake</td>
                <td>31</td>
            </tr>
          </table>
        </div>
          

        </div>

        </div>
    </div>  
          
      </div>


        
      </div>


        
      
    </main>
    
    
    
        
          


  </div>
</div>
</body>

</html>