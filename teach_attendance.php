<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Portal</title>
    <link rel="stylesheet" href="design.css">
     <link rel="stylesheet" href="navigation.css">
</head>
<body>
	<div class="main_container" id="home">

	<div class="navbar">
	    <div class="logo">
			<a href="#"><img src="gfs_logo.svg" alt="" data-variantitemid="{EC1ADFD7-2453-4D5D-95A9-4B570FDEA2F9}" data-variantfieldname="Image" class="" loading="lazy"></a>
		</div>
		    <div class="navbar_items">
			  <ul>
				<li><a href="home.php">LOGOUT</a></li>
			    <li><a href="home.php">CONTACT US</a></li>
			    <li><a href="teach_login.php">TEACHER</a></li>
			    <li><a href="home.php">HOME</a></li>
			  </ul>
		    </div>
	</div> 
<div class="banner_image">
        <div class="form-box">
        	<div class="button-box">
                <div>
                <h2><center>Update Attendance</center></h2></div>
                </div>
				<!-- Form to update attendance after teacher login -->
	<form method="POST">
		<input type="text" name="stud_id" id="stud_id" class="input-field" placeholder="Enter Student ID" required>
		<input type="text" name="sub_name" id="sub_name" class="input-field" placeholder="Enter Subject Name" required>
		<input type="number" name="attendance" id="attendance"class="input-field" placeholder="Enter Attendance" required>
		<div>
        <button type="submit" name="submit" value="Submit" class="submit-btn"> Submit </button>
        </div>
	</form>


	<!-- Create/Insert data into db  -->
	<?php
	                 
	$serverName="localhost";
	$userName="root";
	$password= "Ammar@123";
	$dbName= "sptt";

	$conn = mysqli_connect($serverName, $userName, $password, $dbName);

	if (isset($_POST['submit'])) {
		$stud_id = $_POST['stud_id'];
		$sub_name = $_POST['sub_name'];
		$attendance = $_POST['attendance'];
		

		//checking before inserting is it exist in db or not
		$sql = "SELECT * FROM `attendance` WHERE stud_id='$stud_id' AND sub_id='$sub_name'";
		$result = $conn->query($sql);

		//if these not exist then create
		if ($result->num_rows == 0) {
			// output data of each row

			$sql = "INSERT INTO attendance (`stud_id`, `sub_name`,`attendance`)VALUES ('$stud_id', '$sub_name', '$attendance')";
			if ($conn->query($sql) === TRUE)
				echo "<script>alert('submitted successfully')</script>";
			else
				echo "<script>alert('not submitted')</script>";
		} else {
			echo "<script>alert('Already updated')</script>";
		}
	}
	?>

</div>
</div>
</body>

</html>