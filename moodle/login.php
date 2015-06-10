<!--
 * Created by PhpStorm.
 * User: Ivan Udakara
 * Date: 23/04/2015
 * Time: AM 9:39
-->

<?php
    define('DB_NAME', 'moodle');
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');


    function getPassword($id, $pwd){

        // Start a session for the user login
        session_start();

        if(!empty($id) AND !empty($pwd)){

            // The string to establish the connection
            $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die("Failed to connect to the database. Error code:1");
            // Select the database
            $db = mysqli_select_db($con, DB_NAME) or die("Failed to connect to the database. Error code:2");

            // The query to get the data from the database
            $query_st = mysqli_query($con, "SELECT student.password,student.st_id FROM student WHERE student.st_id = '".$id."'");
            // Receive a raw from the database that satisfy the above condition and stores in "$ro_stw"
            //////$row_st = mysqli_fetch_array($query_st, MYSQLI_ASSOC) or die("Can not receive the data from the database");

            // The query to get the data from the database
            $query_lec = mysqli_query($con, "SELECT lecturer.password,lecturer.lec_id FROM lecturer WHERE lecturer.lec_id = '".$id."'");
            // Receive a raw from the database that satisfy the above condition and stores in "$ro_stw"
            //////$row_lec = mysqli_fetch_array($query_lec, MYSQLI_ASSOC) or die("Can not receive the data from the database");

            /*
             * Checks whether the 'password' index of the returned array is non-empty and
             * whether it is similar to the password entered by the user
            */
            if(mysqli_fetch_array($query_st, MYSQLI_ASSOC)){
                echo '***********************************************';
                $query_st = mysqli_query($con, "SELECT student.password,student.st_id FROM student WHERE student.st_id = '".$id."'");
                $row_st = mysqli_fetch_array($query_st, MYSQLI_ASSOC) or die("Can not receive the data from the database");
                if($row_st['password'] == $pwd){
                    $_SESSION['st_id'] = $row_st['st_id'];
                    echo "Access granted.";
                    /*// Calls the function redirect
                    redirect();*/
                    header("Location: index.php");
                    exit();
                }
            }
            elseif(mysqli_fetch_array($query_lec, MYSQLI_ASSOC)){
                $query_lec = mysqli_query($con, "SELECT lecturer.password,lecturer.lec_id FROM lecturer WHERE lecturer.lec_id = '".$id."'");
                $row_lec = mysqli_fetch_array($query_lec, MYSQLI_ASSOC) or die("Can not receive the data from the database");;
                if($row_lec['password'] == $pwd){
                    $_SESSION['lec_id'] = $row_st['lec_id'];
                    echo "Access granted.";
                    /*// Calls the function redirect
                    redirect();*/
                    header("Location: view_lecturer.php");
                    exit();
                }
            }
            else{
                echo "<script type='text/javascript'>alert('Password and Id are incorrect. Try again.');</script>";
            }

            // Closes the connection crested above
            mysqli_close($con);
        }
    }

    // Function to redirect to index.php
    function redirect(){
        header("Location: index.php");
        exit();
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
                            <input type="id" maxlength="7" class="form-control" id="id" placeholder="ID" name="id">
                        </div>
                        <div class="form-group">
                            <input type="password" size="25" maxlength="25" class="form-control" id="pwd" placeholder="Password" name="pwd">
                        </div>
                        <button type="submit" class="btn btn-default" name="login">
                            Login<!--add a image to the button-->
                        </button>
                    </form>
                </div>


            </div>

            <div class="col-sm-4">
            <?php
            if(isset($_POST['login'])){
                //Stores the user entered values in to 2 variables
                $id = $_POST['id'];
                $pwd = $_POST['pwd'];

                // Calls the getPassword function
                getPassword($id, $pwd);

            }

            ?>
            </div>
        </div>
    </body>
</html>