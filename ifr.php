
<!DOCTYPE html>
<html>

<head>
    <title>My form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<meta http-equiv="refresh" content="5; URL=ift.html"> -->
    <link rel="stylesheet" href="ifr.css?v=<?php echo time(); ?>">
</head>

<body>
    
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
       
      
        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        $dat=$dt->format('y-m-j');
        $dat="'".$dat."'";

        $sql = "SELECT * FROM pst  WHERE date=$dat ORDER BY name DESC";

        $result = $conn->query($sql);
        mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            
            $n = "<h3>" . $row["name"] . "</h3><p>" . $row["post"] . "</p>";
            echo ($n);
        }

        $conn->close();
        ?>

</body>

</html>