<?php
session_start();
  if (!isset($_SESSION["uname"])) 
  {
    header("Location:index.php");
    exit();
  }
  $_SESSION["uname"]=$_POST["pm"];
  unset($_POST)

?>
<!DOCTYPE html>
<html>

<head>
    <title>My form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="post.css?v=<?php echo time(); ?>">
</head>

<body>
    <br>

    <h1>Toufique's webpage</h1>
    <div class="dc">
        <form action="test_post.php" method="POST">
            <div>
                <label class="l">write something : </label><br>
                <textarea name="pm" required placeholder="Not more than 500 char"></textarea>
            </div>
            <div><input class="k" type="submit" value="Post"></div>
        </form>
    </div>
    <div class="ps">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $a = "login";
        
        
        $conn = new mysqli($servername, $username, $password, $a);
        if ($conn->connect_error) {
            die("<h1>Database Connection failed : Contact MD Toufique </h1>".mysqli_connect_errno());
            exit();
        }
       
       $n=$_SESSION["pm"];
       
        $nm = " ".$_SESSION["uname"];
        
        
        if (empty($n)==0) 
        {
            
            $pm="'".$n."'";
           /* $d = date("H:i:s");
            $g=$d[0].$d[1];
            $g=$g+5;
            $g=$g.$d[2].$d[3].$d[4].$d[5].$d[6].$d[7];*/
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $g=$dt->format('H:i:s');
            $un = $g.$nm;
            $un = "'" . $un . "'";
            

            $user=$_SESSION["uname"];
            $user="'".$user."'";

            $dat=$dt->format('y-m-j');
            $dat="'".$dat."'";

            $sql = "INSERT INTO pst (name,post,username,date)
                     VALUES ($un,$pm,$user,$dat)";
            if ($conn->query($sql) === TRUE)
            {
                echo"Posted";
                $_SESSION['pm']="";
            }
        }
        
       
        
        $sql = "SELECT * FROM pst ORDER BY name DESC";

        $result = $conn->query($sql);
        mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $n = "<h3>" . $row["name"] . "</h3><p>" . $row["post"] . "</p>";
            echo ($n);
        }

        $conn->close();
        ?>
    </div>
</body>

</html>