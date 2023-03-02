<?php
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
    <link rel="stylesheet" href="post.css?v=<?php echo time(); ?>">
</head>

<body>
    <br>

    <h1>Toufique's webpage</h1>
    <div class="dc">
        <form action="reload.php" method="POST">
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
            die("<h1>Database Connection failed : Contact MD Toufique </h1>");
            exit();
        }
       
       //working scope
       $nm = " ".$_SESSION["uname"];
        $n=$_SESSION['postdata'];
        
        if (empty($n)==0) 
        {
            
            $pm="'".$n."'";
            $d = date("H:i:s");
            $g=$d[0].$d[1];
            $g=$g+5;
            $g=$g.$d[2].$d[3].$d[4].$d[5].$d[6].$d[7];

            $un = $g.$nm;
             $un = "'" . $un . "'";
        
            $sql = "INSERT INTO pst (name,post)
                     VALUES ($un,$pm)";
            if ($conn->query($sql) === TRUE)
            {
                echo"Posted";
                $_SESSION['postdata']="";
            }
        }
        
        /*if (isset($_POST["pm"])==1 and empty($pm)==0) 
        {
            $n=$_POST["pm"];
            $pm="'".$n."'";
            $d = date("H:i:s");
            $g=$d[0].$d[1];
            $g=$g+5;
            $g=$g.$d[2].$d[3].$d[4].$d[5].$d[6].$d[7];

            $un = $g.$nm;
             $un = "'" . $un . "'";
        
            $sql = "INSERT INTO pst (name,post)
                     VALUES ($un,$pm)";
            if ($conn->query($sql) === TRUE)
            {
                echo"Posted";
                $_POST["pm"]="";
            }
        }*/
        
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