<!--
 * Created by PhpStorm.
 * User: Ivan Udakara
 * Date: 23/04/2015
 * Time: AM 9:39
-->

<?php
    //  Information to connect to the database
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'moodle';

    //  Creates a connection to the database
    $conn = new mysqli($server, $username, $password, $database);

    function getPassword($id, $conn){
        //sql statements to get the password details
        $sql_studentPW = "select student.password from student where student.st_id = '".$id."'";
        //$sql_lecPW = "select lecturer.password from lecturer where lecturer.lec_id = '".$id."'";

        $message = '';

        //check the connection
        if($conn -> connect_error){
            $message = $conn -> connect_error;
            die('Connection error:'.$message);
        }
        else{
            ////if($conn -> query($sql_studentPW)){
                // Extracts all the relevant basic information into $result
                $result = $conn -> query($sql_studentPW);
            ////}
            /*else{
                // Extracts all the relevant basic information into $result
                $result = $conn -> query($sql_lecPW);
            }*/


            // If an error occurs while extracting information
            if($conn -> error){
                die('Error occurred:'.$conn -> error);
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link href="images/tabimage.jpg" rel="shortcut image" type="image/x-icon">
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="page-header"><font size="7">Login</font></div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-3">
                    <form role="form" method="post">
                        <div class="form-group">
                            <input type="id" class="form-control" id="id" placeholder="ID" name="id">
                        </div>
                        <div class="form-group">
                            <input type="text" size="25" class="form-control" id="pwd" placeholder="Password" name="pwd">
                        </div>
                        <button type="submit" class="btn btn-default" name="login">
                            Login<!--add a image to the button-->
                        </button>
                    </form>
                </div>
                <div class="col-sm-1">
                    <!--<button type="submit" class="btn btn-default" name="login">
                       Login<!--add a image to the button--
                    </button>-->
                </div>

            </div>

            <div class="col-sm-4">
            <?php
            print_r($_POST);
            if(isset($_POST['login'])){
                $id = $_POST['id'];
                $pwd = $_POST['pwd'];

                getPassword($id, $conn);
            }

            ?>
            </div>
        </div>
    </body>
</html>