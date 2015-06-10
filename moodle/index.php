<?php
    define('DB_NAME', 'moodle');
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');

    function getName(){
        // The string to establish the connection
        $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die("Failed to connect to the database. Error code:1");
        // Select the database
        $db = mysqli_select_db($con, DB_NAME) or die("Failed to connect to the database. Error code:2");

        // The query to get the data from the database
        $query = mysqli_query($con, "SELECT student.name FROM student WHERE student.st_id = '".$_SESSION['st_id']."'");
        // Receive a raw from the database that satisfy the above condition and stores in "$row"
        $row = mysqli_fetch_array($query, MYSQLI_ASSOC) or die("Can not receive the data from the database");

        return $row['name'];
    }
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>loggin</title>
    </head>
    <body>
        <?php
        session_start();
        echo getName();
        echo '('.$_SESSION['st_id'].')';
        ?>
    </body>
</html>
