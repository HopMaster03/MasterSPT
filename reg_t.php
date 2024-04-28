
<?php

// header('location:teach_login.php');

$serverName="localhost";
$userName="root";
$password= "Ammar@123";
$dbName= "spt";

$con = mysqli_connect($serverName, $userName, $password, $dbName);
if ($con) {
    //Registering teacher details into the database
    $t_name = $_POST['t_name'];
    $sub_name = $_POST['sub_name'];
    $t_phno = $_POST['t_phno'];
    $t_email = $_POST['t_email'];
    $t_password = $_POST['t_password'];

    $sql = "select * from `sptt`.`teacher_login` where `t_email` = '$t_email' && `t_password` = '$t_password'";
    $result = mysqli_query($con, $sql);

    $num = $result->num_rows;

    if ($num == 1) {
        echo "duplicate data";
        header('location:teach_login.php');
    } else {
        //Inserting teacher details
        $qy = "insert into `sptt`.`teacher_login`
    (`t_name`,`sub_name`,`t_phno`,`t_email`,`t_password`) 
    values('$t_name','$sub_name','$t_phno','$t_email','$t_password')";
        mysqli_query($con, $qy);
    }
} else {
    echo "connection error";
}
?>