
<?php
// This script validates the student login details
$serverName="localhost";
$userName="root";
$password= "Ammar@123";
$dbName= "sptt";

$con = mysqli_connect($serverName, $userName, $password, $dbName);
if ($con) {
    // echo "connection successfull";

    //mysqli_select_db($con, 'spt');
    $stud_email = $_POST['stud_email'];
    $stud_password = $_POST['stud_password'];

    $sql = "select * from `student_details` where `stud_email` = '$stud_email' and `stud_password` = '$stud_password'";
    $result = mysqli_query($con, $sql);

    // $num = mqsqli_num_rows($result);
    $num = $result->num_rows;

    if ($num == 1) {
        //echo "Successfully login";
        header('location:stud_portal.php');
        // Find out how to send data to attendance chart page_done
        //Grab the stud_id from student details using query_done
        $sql1 = "select stud_id from `student_details` where `stud_email` = '$stud_email'";
        $fire= mysqli_query($con,$sql1);
        if($fire->num_rows !=0){
            $result = mysqli_fetch_assoc($fire);
            session_start();
            $_SESSION['studentID'] = $result['stud_id'];
            
            

        }
        


        
        
        

    } else {
        header('location:stud_login.php');
    }
} else {
    echo "no connection";
}

?>