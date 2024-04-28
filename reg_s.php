
<?php

header('location:stud_login.php');

$serverName="localhost";
$userName="root";
$password= "Ammar@123";
$dbName= "spt";

$con = mysqli_connect($serverName, $userName, $password, $dbName);
if ($con) {
    //Registering student details into the database
    $stud_name = $_POST['stud_name'];
    $stud_id = $_POST['stud_id'];
    $stud_year = $_POST['stud_year'];
    $stud_section = $_POST['stud_section'];
    $stud_phno = $_POST['stud_phno'];
    $stud_email = $_POST['stud_email'];
    $stud_password = $_POST['stud_password'];

    $sql = "select * from `sptt`.`student_details` where `stud_email` = '$stud_email' && `stud_password` = '$stud_password'";
    $result = mysqli_query($con, $sql);

    $num = $result->num_rows;

    if ($num==1) {
        echo "duplicate data";
    } else {
        // Inserting database values
        $qy = "insert into `sptt`.`student_details`
    (`stud_id`,`stud_name`,`stud_class`,`stud_section`,`stud_phno`,`stud_email`,`stud_password`) 
    values('$stud_id','$stud_name','$stud_year','$stud_section','$stud_phno','$stud_email','$stud_password')";
        mysqli_query($con, $qy);
    }
} else {
    echo "connection error";
}
?>