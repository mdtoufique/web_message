<?php
  session_start();
  if (!isset($_POST["uname"])) 
  {
    header("Location:sign.php");
    exit();
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>My form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css?v=<?php echo time(); ?>">
  </head>

  <body>
  
    <br>
    <br>
    <h1>Toufique's webpage</h1>
    <div class="dc">
    <?php

$servername = "localhost";
$username = "root";
$password = "";
$a="login";
// Create connection

$conn = new mysqli($servername, $username, $password,$a);
$un="'".$_POST["uname"]."'";
$mob="'".$_POST["mobile"]."'";
$fn="'".$_POST["fname"]."'";
$pass="'".$_POST["pass"]."'";
$gen="'".$_POST["gender"]."'";
$mail="'".$_POST["mail"]."'";
$fao="ddd";

if ($conn->connect_error) {
  die("Connection failed: Contact MD Toufique" );
  exit();
}

$sql = "INSERT INTO log (username,fullname,mail,mobile,gender,password)
VALUES ($un, $fn, $mail,$mob,$gen,$pass)";

if ($conn->query($sql) === TRUE) {
  echo "<br><h1>New record created successfully</h1>";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
  echo "<br><h1>Username already exist. please change the username.</h1>";
}


mysqli_close($conn);
?> 
      <ul>
        <li><a  href="login.html">Log in</a></li>
        <li><a  href="form.html">Sign up</a></li>
        
      </ul>
      
        
    </div>
    
  </body>
</html>
