<html>
	<!-- This file displays the update marks form and allows teacher to enter assessment, mid term, mock and final marks of their respective subjects -->
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
	<!-- Navigation Bar -->
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
                <h2><center>Update Marks</center></h2></div>
                </div>
				<!-- Form to update marks -->
	<form method="POST">
		<input type="text" name="stud_id" id="stud_name" class="input-field" placeholder="Enter Student ID" required>
		<input type="text" name="sub_name" id="stud_name" class="input-field" placeholder="Enter Subject Name" required>
		<input type="number" name="assessment-1" id="assessment-1" class="input-field" placeholder="Enter assessment-1" required>
		<input type="number" name="assessment-2" id="assessment-2" class="input-field" placeholder="Enter assessment-2" required>
		<input type="number" name="assessment-3" id="assessment-3" class="input-field" placeholder="Enter assessment-3" required>
		<input type="number" name="assessment-4" id="assessment-4" class="input-field" placeholder="Enter assessment-4" required>
		<input type="number" name="assessment-5" id="assessment-5" class="input-field" placeholder="Enter assessment-5" required>
		<input type="number" name="assessment-6" id="assessment-6" class="input-field" placeholder="Enter assessment-6" required>
		<input type="number" name="assessment-7" id="assessment-7" class="input-field" placeholder="Enter assessment-7" required>
		<input type="number" name="assessment-8" id="assessment-8" class="input-field" placeholder="Enter assessment-8" required>
		<input type="number" name="assessment-9" id="assessment-9" class="input-field" placeholder="Enter assessment-9" required>
		<input type="number" name="assessment-10" id="assessment-10" class="input-field" placeholder="Enter assessment-10" required>
		<input type="number" name="mid_term" id="mid_term" class="input-field" placeholder="Enter Mid Term" required>
		<input type="number" name="mock" id="mock" class="input-field" placeholder="Enter Mock" required>
		<input type="number" name="final" id="final" class="input-field" placeholder="Enter Final" required>
		<div>
        <button type="submit" name="submit" value="Submit" class="submit-btn"> Submit </button>
        </div>
	</form>

<!-- On submission of the above form this PHP script is called to update database -->
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
		// $month = $_POST['month'];
		$assessment1 = $_POST['assessment-1'];
		$assessment2 = $_POST['assessment-2'];
		$assessment3 = $_POST['assessment-3'];
		$assessment4 = $_POST['assessment-4'];
		$assessment5 = $_POST['assessment-5'];
		$assessment6 = $_POST['assessment-6'];
		$assessment7 = $_POST['assessment-7'];
		$assessment8 = $_POST['assessment-8'];
		$assessment9 = $_POST['assessment-9'];
		$assessment10 = $_POST['assessment-10'];
		$midterm = $_POST['mid_term'];
		$mock = $_POST['mock'];
		$final = $_POST['final'];
		//checking before inserting is it exist in db or not
		$sql = "select * from `result` where `stud_id`='$stud_id' AND `sub_name`='$sub_name'";
		$result = $conn->query($sql);

		//if these not exist then create
		if ($result->num_rows ==0) {
			// output data of each row

			$sql = "INSERT INTO `result` (`stud_id`, `sub_name`,`assessment-1`,`assessment-2`,`assessment-3`,`assessment-4`,`assessment-5`,`assessment-6`,`assessment-7`,`assessment-8`,`assessment-9`,`assessment-10`,`mid_term`,`mock`,`final`)VALUES ('$stud_id', '$sub_name', '$assessment1', '$assessment2', '$assessment3','$assessment4','$assessment5','$assessment6','$assessment7','$assessment8','$assessment9','$assessment10','$midterm','$mock','$final')";
			if ($conn->query($sql) === TRUE)
				echo "<script>alert('submitted successfully')</script>";
			else
				echo "<script>alert('not submitted')</script>";
		} else {
			echo "<script>alert('Already updated')</script>";
		}
	}
	?>


</body>

</html>