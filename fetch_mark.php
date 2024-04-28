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
//check if the session is active if not, create one
if (session_status() == PHP_SESSION_NONE) {
  session_start();
  $stud_id=$_SESSION['studentID']; // Start the session if it's not already started
}


// Perform database query to fetch final marks and subname to display subject mark table on student dasboard
$querymark = "SELECT final,sub_name FROM `result` where stud_id='$stud_id'";
$result = mysqli_query($con, $querymark);

$data = array();
$subject = array();
// Fetch subject and marks and store them in an array
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row['final'];
    $subject[] = $row['sub_name'];
}

// Encode the data array into JSON format and send it back to the client
$combinedData = array(
    'subject'=>$subject,
    'marks'=>$data
    
);
echo json_encode($combinedData);

?>