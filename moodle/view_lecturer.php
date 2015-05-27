<!--
 * Created by PhpStorm.
 * User: Ivan Udakara
 * Date: 23/04/2015
 * Time: AM 2:09
-->

<?php
//  Information to connect to the database
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'moodle';

//  Creates a connection to the database
$conn = new mysqli($server, $username, $password, $database);

function getBInfo($id, $conn){

    //  SQL statement to extract the basic information of the student
    $sql_basic = "select * from lecturer WHERE lecturer.lec_id='".$id."'";

    $message = '';

    // Checks fot the connection
    if($conn -> connect_error){
        $message = $conn -> connect_error;
        die('Connection error:'.$message);
    }
    else{
        // Extracts all the relevant basic information into $result
        $result = $conn -> query($sql_basic);

        // If an error occurs while extracting information
        if($conn -> error){
            die('Error occurred:'.$conn -> error);
        }
    }
    showBInfo($message, $result);
}

function getModuleInfo($id, $conn){

    //  SQL statement to extract the Enrollment information of the student
    $sql_en = "select course.name, course.credit, class.course_id, class.class_id from course, class WHERE class.lec_id = '".$id."' and course.course_id= class.course_id";

    $message = '';

    // Checks fot the connection
    if($conn -> connect_error){
        $message = $conn -> connect_error;
        die('Connection error:'.$message);
    }
    else{
        // Extracts all the relevant enrollment information into $result_en
        $result_en = $conn -> query($sql_en);

        // If an error occurs while extracting information
        if($conn -> error){
            die('Error occurred:'.$conn -> error);
        }
    }
    showModuleInfo($message, $result_en);
}

function showModuleInfo($message, $result_en){
    $tot_credits = 0;
    if($message){
        echo '<h4>'.$message.'</h4>';
    }
    else{
        if($result_en -> num_rows > 0){
            while($row = $result_en -> fetch_assoc()){
                echo '<tr><td>'.$row['course_id'].'</td>
                              <td>'.$row['name'].'</td>
                              <td>'.$row['credit'].'</td>
                              <td>'.$row['class_id'].'</td>
                              </tr>';
                //print_r($row);
            }
        }
        else{
            echo 'No records found';
        }
    }
    //$conn -> close();
}


function showBInfo($message, $result){
    if(isset($_POST['search'])){
        if($message){
            echo '<h4>'.$message.'</h4>';
        }
        else{
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){

                    echo '<br>Index no   : '.$row['lec_id'].'
                          <br>Name       : '.$row['name'].'
                          <br>Department : '.$row['department'].'
                          <br>Contact no.: '.$row['contact_no'].'
                          <br>City       : '.$row['city'].'
                          <br>';
                }
            }
            else{
                echo 'No records found';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Search lecturers</title>
    <link href="images/tabimage.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <?php
        include 'includes/navbar.php';
    ?>

    <div class="page-header">
        <p><font size="7">Search lecturers</font></p>
    </div>
    <form role="form" method="post">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="search" class="form-control" id="search" placeholder="Lecturer ID" name="id">
                    <!--<input type="submit" name="search" id="search" value="Search">-->
                </div>
            </div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-default" name="search">
                    <span class="glyphicon glyphicon-search"></span>Search
                </button>
            </div>
        </div>
    </form>

    <!--Division for the Basic info-->
    <div class="well well-sm">
        <h1><font size="5">Basic information</font></h1>

        <?php
        if(isset($_POST['search'])){
            $id = $_POST['id'];
            getBInfo($id, $conn);
        }
        ?>
    </div>
    <!--Division for the Enrollment info-->
    <div class="well">
        <h1><font size="5">Modules teaching</font></h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Module code</th>
                    <th>Module title</th>
                    <th>Credits</th>
                    <th>Class id</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_POST['search'])){
                    $id = $_POST['id'];
                    getModuleInfo($id, $conn);
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>