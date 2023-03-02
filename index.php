<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too
  session_start();
  if (isset($_SESSION["uname"])) 
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
   
    <h1>Toufique's webpage</h1>
    <div class="dc" style="min-height:40vh;">
      <br>
        
      <ul>
        <li><a href="login.php">Log in</a></li>
        <li><a href="formh.php">Sign up</a></li>
      </ul>
      
        
    </div>
    
  </body>
</html>