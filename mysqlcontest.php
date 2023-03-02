<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $a = "login";
        
        
        $conn = new mysqli($servername, $username, $password, $a);
        if ($conn->connect_error) {
            echo "error";
            exit();
        }
        else 
            {
                echo "success";
            }
            echo"hi";
?>