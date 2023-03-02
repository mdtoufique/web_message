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

    <link rel="stylesheet" href="login.css?v=<?php echo time(); ?>" type="text/css">
  </head>

  <body>
    <h1>Toufique's webpage</h1>
    <div class="dc">
      <h1>Sign in</h1>

      <form action="sign.php" method="post">
        <div class="in">
          <input  autocomplete=”off” type="text" placeholder="Username" id="uname" name="uname" required></div>
          <input type="password" placeholder="Password" id="pass" name="pass" required>
        <input class="k" type="submit" value="Log in">
      </form>
      <div class="cen"><p>Don't have an account?<a href="form.php">SIgn up</a> here.</p></div><br>
    </div>
    <script src="fir.js"></script>
  </body>
</html>

