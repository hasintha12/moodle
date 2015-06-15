<!--
 * Created by PhpStorm.
 * User: Ivan Udakara
 * Date: 12/06/2015
 * Time: 11:08
 -->

<?php
//  Information to connect to the database
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'moodle';

//  Creates a connection to the database
$conn = new mysqli($server, $username, $password, $database);


function getEnInfo($conn){

    //  SQL statement to extract the Enrollment information of the student
    //$sql_en = "select * from course,enrollment natural join class WHERE enrollment.st_id = '".$id."'";
    $sql_dep = "select dept_id, dept_name from department";

    $message = '';

    // Checks fot the connection
    if($conn -> connect_error){
        $message = $conn -> connect_error;
        die('Connection error:'.$message);
    }
    else{
        // Extracts all the department ids into $result_en
        $result_dep = $conn -> query($sql_dep);

        // If an error occurs while extracting information
        if($conn -> error){
            die('Error occurred:'.$conn -> error);
        }
    }
    showEnInfo($message, $result_dep, $conn);
}

function showEnInfo($message, $result_dep, $conn){

    if($message){
        echo '<h4>'.$message.'</h4>';
    }
    else{
        if($result_dep -> num_rows > 0){
            while($row_dep = $result_dep -> fetch_assoc()){
                $sql_data = "select * from student where student.dept_id='".$row_dep['dept_id']."'";

                $message1 = '';

                // Checks fot the connection
                if($conn -> connect_error){
                    $message1 = $conn -> connect_error;
                    die('Connection error:'.$message1);
                }
                else{
                    // Extracts all the department ids into $result_en
                    $result_data = $conn -> query($sql_data);

                    // If an error occurs while extracting information
                    if($conn -> error){
                        die('Error occurred:'.$conn -> error);
                    }
                }

                ?>
                <div class="panel-heading">
                        <?php
                            echo $row_dep['dept_name'];
                        ?>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <td><B>Student id</B></td>
                                <td><B>Name</B></td>
                                <td><B>Contact no.</B></td>
                                <td><B>Birthday</B></td>
                                <td><B>NIC</B></td>
                            </thead>
                <?php

                while($row_data= $result_data -> fetch_assoc()){

                    //-----------------------------------------------
                    ?>
                                <tbody>
                                    <?php
                                        echo '<tr><td>'.$row_data['st_id'].'</td>
                                              <td>'.$row_data['name'].'</td>
                                              <td>'.$row_data['contact_no'].'</td>
                                              <td>'.$row_data['birthday'].'</td>
                                              <td>'.$row_data['nic'].'</td>
                                              </tr>';
                                    ?>
                                </tbody>
                    <?php
                    //-----------------------------------------------


                }
                ?>
                        </table>
                    </div>
                </div>
                            <?php

            }

        }
        else{
            echo 'No records found';
        }
    }
    //$conn -> close();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>View all students</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/mystyle.css">

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="page-header"><h1><font color="white">View all students</font></h1></div>
            <div class="panel panel-primary">
                <!----------------------------------------------->
                <?php
                getEnInfo($conn);
                ?>
            </div>
        </div>

    </body>
</html>