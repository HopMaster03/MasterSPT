<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link rel="stylesheet" href="portal.css">
</head>
<body>
	<!--Welcome-->
    <div class="main_container" id="home">
	
	<div class="navbar">
		<div class="logo">
			<a href="#"><img src="gfs_logo.svg" alt="" data-variantitemid="{EC1ADFD7-2453-4D5D-95A9-4B570FDEA2F9}" data-variantfieldname="Image" class="" loading="lazy"></a>
		</div>
		<div class="navbar_items">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="stud_login.php">Student</a></li>
			    <li><a href="home.php">Contact Us</a></li>
			    <li><a href="home.php">logout</a></li>
			</ul>
		</div>
	</div>

	<div class="banner_image">
		<!-- Buttons to redirect to pages -->
			<button type="submit" onclick="location.href='attendance_chart.php'" class="submit-btn bb1"><b>VIEW ATTENDANCE</b></button>
	  
	     	<button type="submit" onclick="location.href='stud_dashboard.php'" class="submit-btn bb2"><b>VIEW RESULT</b></button>
	
        
	</div>
</div>
</body>
</html>
