<?php
session_start();
if (isset($_SESSION["uname"])==0) 
{
  if(!isset($_POST["uname"]))
    {
        header("Location:index.php");
        exit();
    }
    else
    {
      $nm = $_POST["uname"];
      $pm = $_POST["pass"];
      $_SESSION["uname"] = $nm;
      $_SESSION["pass"] = $pm;
    }

}
else 
  {
    
    $nm=$_SESSION["uname"] ;
    $pm=$_SESSION["pass"] ;
  }

/*
if (isset($_POST["uname"])==0) 
{
  if (!isset($_SESSION["uname"])) 
  {
    header("Location:index.php");
    exit();
  }
  else 
  {
    
    $nm=$_SESSION["uname"] ;
    $pm=$_SESSION["pass"] ;
  }
}
else
  {
  
    $nm = $_POST["uname"];
    $pm = $_POST["pass"];
    $_SESSION["uname"] = $nm;
    $_SESSION["pass"] = $pm;
  }
  */

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

    $sql = "SELECT * FROM log WHERE username='$nm'";

    $result = $conn->query($sql);
    if ($result->num_rows == 0) {

      $fail = "<br><h1>Login failed. Please try again</h1>";
      echo $fail;
      $fail = '<ul> <li><a href="login.html">Log in</a></li><li><a href="form.html">Sign up</a></li></ul></div>';
      echo $fail;
      $fail = "</body></html>";
      echo $fail;
      session_destroy(); 
      exit();
    }
    while ($row = mysqli_fetch_assoc($result)) {
      if ($row["username"] == $nm && $row["password"] == $pm) {

        echo "<h1>Hi " . $row["username"] . " !!!</h1>";
      } else {
        $fail = "<br><h1>Login failed. Please try again</h1>";
        echo $fail;
        $fail = '<ul> <li><a href="login.html">Log in</a></li><li><a href="form.html">Sign up</a></li></ul></div>';
        echo $fail;
        $fail = "</body></html>";
        echo $fail;
        session_destroy(); 
        exit();
      }
      $na = $row["fullname"];
      $ge = $row["gender"];
      $ma = $row["mail"];
      $mob = $row["mobile"];
    }
    $conn->close();
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
        <li><a href="post.php">Public Wall</a></li>
        <li><a href="sign.php">Account Information</a></li>
      </ul>
      <br>
        </div>

</body>

</html>