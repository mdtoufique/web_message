<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too
session_start();
  if (!isset($_SESSION["uname"])) 
  {
    header("Location:index.php");
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
  <div class="dc">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $a = "login";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $a);
    
    
    
    // Check connection
    if ($conn->connect_error) {
      die("<h1>Database Connection failed : Contact MD Toufique </h1>");
      exit();
    }
    $nm=$_SESSION["uname"];
    $sql = "SELECT * FROM log WHERE username='$nm'";

    $result = $conn->query($sql);
    
    if ($row = mysqli_fetch_assoc($result)) {
      
      $na = $row["fullname"];
      $ge = $row["gender"];
      $ma = $row["mail"];
      $mob = $row["mobile"];
    }
    else 
    {
        $conn->close();
        header("Location:login.php");
        exit();
    }
    
    ?>

    <p class="p">Here are your information</p>
    <?php
    $f = '<div class="g">';
    echo $f; ?>



    <div class="lol">
      <div class="hea">
        <p class="ini">Name : </p>
      </div>
      <?php $f = '<div class="inf"><p class="in">' . $na . "</p></div></div>";
      echo $f;
      ?>

      <div class="lol">
        <div class="hea">
          <p class="ini">Gender : </p>
        </div>
        <?php $f = '<div class="inf"><p class="in">' . $ge . "</p></div></div>";
        echo $f;
        ?>
        <div class="lol">
          <div class="hea">
            <p class="ini">Mail : </p>
          </div>
          <?php $f = '<div class="inf"><p class="in">' . $ma . "</p></div></div>";
          echo $f;
          ?>
          <div class="lol">
            <div class="hea">
              <p class="ini">Mobile : </p>
            </div>
            <?php $f = '<div class="inf"><p class="in">' . $mob . "</p></div></div>";
            echo $f;
            ?>

          </div>
          <ul>
        
      </ul>
      <br>
        </div>
        
        <form  action="log.php" method="post">
        <input  class="as" style="width:100px;display:block;margin:0 auto;" type="submit" value="Log out">
        </form>
    
</body>

</html>