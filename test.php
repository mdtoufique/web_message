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
    <link rel="stylesheet" href="test.css?v=<?php echo time(); ?>">
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
       if(isset($_SESSION['postdata']))
       {
        $n=$_SESSION['postdata'];
       }
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
                echo '<p id="gg">Posted<p>';
                $_SESSION['postdata']="";
            }
        }
        
       echo  '<div class="ps"><iframe src="ifr.php" id="hi"  title="Iframe"></iframe>';
        
        

        $conn->close();
        ?>
    </div>
    <form  action="log.php" method="post">
        <input  class="as" style="height:50px;margin-left:auto;padding-left:0;width:100px;display:block;margin:0 auto;" type="submit" value="Log out">
        </form>
    <script>
/*window.setInterval("reloadIFrame();", 10000);
function reloadIFrame() {
 document.getElementById("hi").src="ifr.php";
}*/
window.setTimeout("t();", 3000);
function t() {
    var c = document.getElementById('gg');
    c.style.display = 'none';
    
}


</script>     
</body>

</html>