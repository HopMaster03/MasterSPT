<?php
// establish a database connection
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

//check if session is already existing if not, then create session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
  $stud_id=$_SESSION['studentID']; 
}

// Perform database query to fetch subjects
$querysub = "SELECT sub_name FROM `result` where stud_id='$stud_id'"; 
$result = mysqli_query($con, $querysub);

$subjects = array();

// Fetch subjects and store them in an array
while ($row = mysqli_fetch_assoc($result)) {
    $subjects[] = $row['sub_name'];
}

// Encode the subjects array into JSON format and send it back to the client
echo json_encode($subjects);


?>