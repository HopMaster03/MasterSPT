<?php
// Establish connection
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

$subject = $_POST['subject'];
if (session_status() == PHP_SESSION_NONE) {
  //Session previously stored student ID from the search bar on Teacher dashboard
  session_start();
  $stud_id=$_SESSION['studentID']; 
}
          //This query selects all details which match the subject name and student ID to send back to the second graph of dashboard 
          $queryline = "SELECT * from `result` where stud_id='$stud_id' AND sub_name='$subject'";
          $fire1 = mysqli_query($con,$queryline);
          if($fire1->num_rows !=0){
            
            $assessment = array();
            $assessmentlabels=array();
            while($res1 = mysqli_fetch_assoc($fire1)){
            //The following conditions check the below condition
            // Check if the assessment is 0, if not add it to the assessment array with assessment label
            if($res1["assessment-1"]!=0){
              $assessment[] = $res1["assessment-1"];
              $assessmentlabels[]= "assessment-1";
            }
            if($res1["assessment-2"]!=0){
              $assessment[] = $res1["assessment-2"];
              $assessmentlabels[]= "assessment-2";
            }
            if($res1["assessment-3"]!=0){
              $assessment[] = $res1["assessment-3"];
              $assessmentlabels[]= "assessment-3";
            }
            if($res1["assessment-4"]!=0){
              $assessment[] = $res1["assessment-4"];
              $assessmentlabels[]= "assessment-4";
            }
            if($res1["assessment-5"]!=0){
              $assessment[] = $res1["assessment-5"];
              $assessmentlabels[]= "assessment-5";
            }
            if($res1["assessment-6"]!=0){
              $assessment[] = $res1["assessment-6"];
              $assessmentlabels[]= "assessment-6";
            }
            if($res1["assessment-7"]!=0){
              $assessment[] = $res1["assessment-7"];
              $assessmentlabels[]= "assessment-7";
            }
            if($res1["assessment-8"]!=0){
              $assessment[] = $res1["assessment-8"];
              $assessmentlabels[]= "assessment-8";
            }
            if($res1["assessment-9"]!=0){
              $assessment[] = $res1["assessment-9"];
              $assessmentlabels[]= "assessment-9";
            }
            if($res1["assessment-10"]!=0){
              $assessment[] = $res1["assessment-10"];
              $assessmentlabels[]= "assessment-10";
            }
          }
          }

          //Wrap the arrays in combined array
          $combinedData = array(
            $assessment,
            $assessmentlabels
        );
        //Send the combined array back to the javascript that called this file
        echo json_encode($combinedData);
?>