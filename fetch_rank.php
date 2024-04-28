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



// Perform database query to fetch student ID and Student Name
$queryname = "SELECT stud_id,stud_name FROM `student_details`";
$result = mysqli_query($con, $queryname);

$studname = array();
$studid = array();
// Fetch subject and marks and store them in an array
while ($row = mysqli_fetch_assoc($result)) {
    $studname[] = $row['stud_name'];
   $studid[]= $row['stud_id'];
}

//check if session is already existing if not, then create session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $subject=$_SESSION['sub_name']; 
  }
$ranks = array();
//make a loop for this below query execution
//grab the rank for each student ID
foreach ($studid as $id) {
    $queryrank = "SELECT rank FROM `result` where stud_id='$id' and sub_name=$subject";
    $result1 = mysqli_query($con, $queryrank);

    while ($row = mysqli_fetch_assoc($result1)) {
    $ranks[] = $row['rank'];
   
}
  }

// Encode the data array into JSON format and send it back to the client
$combinedData = array(
    'rank'=>$ranks,
    'student'=>$stud_name
    
);
echo json_encode($combinedData);

?>