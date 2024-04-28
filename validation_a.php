<?php
// This PHP script validates the admin login detaiils
// header('location:home.php');
$serverName="localhost";
$userName="root";
$password= "Ammar@123";
$dbName= "sptt";

$con = mysqli_connect($serverName, $userName, $password, $dbName);
if ($con) {
    // echo "connection successfull";

    //mysqli_select_db($con, 'spt');
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

    $sql = "select * from `spt`.`admin_login` where `admin_email` = '$admin_email' and `admin_password` = '$admin_password'";
    $result = mysqli_query($con, $sql);

    // $num = mqsqli_num_rows($result);
    $num = $result->num_rows;

    if ($num == 1) {
        //echo "Successfully login";
        header('location:admin_portal.php');
    } else {
        header('location:admin_login.php');
    }
} else {
    echo "no connection";
}
?>