<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too
session_start();

if (isset($_SESSION["uname"])) 
{
    
    $nm = $_SESSION["uname"];
    $pm = $_SESSION["pass"];
} 

else
{
    if (!isset($_POST["uname"])) {
        header("Location:index.php");
        exit();
    } 
    else {
        $nm = $_POST["uname"];
        $pm = $_POST["pass"];
        $_SESSION["uname"] = $nm;
        $_SESSION["pass"] = $pm;
    }
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

        $sql = "SELECT * FROM log WHERE username='$nm'";

        $result = $conn->query($sql);
        if ($result->num_rows == 0) {

            $fail = "<br><h1>Login failed. Please try again</h1>";
            echo $fail;
            $fail = '<ul> <li><a href="login.php">Log in</a></li><li><a href="form.php">Sign up</a></li></ul></div>';
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
                $fail = '<ul> <li><a href="login.php">Log in</a></li><li><a href="form.php">Sign up</a></li></ul></div>';
                echo $fail;
                $fail = "</body></html>";
                echo $fail;
                session_destroy();
                exit();
            }
           
        }
        $conn->close();
        ?>

        <p class="p">Here are your information</p>
        <?php
        $f = '<div class="g">';
        echo $f; ?>



        <ul>
            <li><a href="test.php">Public Wall</a></li>
            <li><a href="info.php">Account Information</a></li>
        </ul>
        <br>
    </div>
    </div>
    <form action="log.php" method="post">
        <input  class="as" style="width:100px;display:block;margin:0 auto;" type="submit" value="Log out">
        </form>
</body>

</html>