
<?php
// This PHP script validates the teacher login details
$serverName="localhost";
$userName="root";
$password= "Ammar@123";
$dbName= "sptt";

$con = mysqli_connect($serverName, $userName, $password, $dbName);
if ($con) {
    
    $t_email = $_POST['t_email'];
    $t_password = $_POST['t_password'];
    $sql = "select * from `sptt`.`teacher_login` where `t_email` = '$t_email' and `t_password` = '$t_password'";
    $result = mysqli_query($con, $sql);
    $num = $result->num_rows;

    if ($num == 1) {
        echo "Successfully login";
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $_SESSION['sub_name'] = $sub_name;
            // Start the session if it's not already started
          }
        $res = mysqli_fetch_assoc($result);
        $sub_name= $res['sub_name'];
        $_SESSION['sub_name'] = $sub_name;


        header('location:teach_portal.php');
    } else {
        header('location:teach_login.php');
    }
} else {
    echo "no connection";
}

?>