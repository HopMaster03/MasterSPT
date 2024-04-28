<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Desk</title>
    <link rel="stylesheet" href="layout.css">
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
          <li><a href="stud_login.php">STUDENT</a></li>
          <li><a href="home.php">HOME</a></li>
        </ul>
        </div>
  </div>
   <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <!-- Login button and Register Button toggle -->
                <button type="button" class="toggle-btn" onclick="login()">Login</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
              <!-- ON submission validation_s is called -->
                <form id="login" class="input-group" action="validation_s.php" method="post">
                      <input type="email" name="stud_email" id="stud_email" class="input-field" placeholder="User Id" required> 
                      <input type="text" name="stud_password" id="stud_password" class="input-field" placeholder="Enter Password" required>
                      <input type="checkbox" class="chech-box"><span>Remember Password</span>
                      <button type="submit" class="submit-btn"> Login </button>
                </form>
        <form id="register" class="input-groupss" action="reg_s.php" method="post">
          <input type="text" name="stud_name" id="stud_name" class="input-field" placeholder="Student Name" required>
          <input type="number" name="stud_id" id="stud_id" class="input-field" placeholder="Roll Number" required>
          <input type="text" name="stud_year" id="stud_year" class="input-field" placeholder="Student Year" required>
          <input type="text" name="stud_section" id="stud_section" class="input-field" placeholder="Student Section" required>
          <input type="email" name="stud_email" id="stud_email" class="input-field" placeholder="Email" required> 
          <input type="text" name="stud_phno" id="stud_phno" class="input-field" placeholder="Contact No" required>
          <input type="password" name="stud_password" id="stud_password" class="input-field" placeholder="Enter Password" required>
          <button type="submit" class="submit-btn"> Regiser </button>
        </form>
      

<script>
  //events are called on login, register toggle option
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");
    function register() {
    x.style.left = "-400px";
    y.style.left= "50px";
    z.style.left = "110px";
}
    function login() {
    x.style.left = "50px";
    y.style.left= "450px";
    z.style.left = "0px";
}
</script>

</body>

</html>