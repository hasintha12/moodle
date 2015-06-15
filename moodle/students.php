<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>student</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/mystyle.css"> 
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>



    </head>


    <!-this is body  ->
    <body >

        <div class="container">
            <div style="background-color:#0f0f0f; margin-top:5px; margin-bottom:5px ">
                <nav class="nav nav-tabs nav-justified ">


                    <ul class="nav nav-pills navFont ">
                        <li role="presentation" class="active label label-default"><a href="students.php"class="navFont"><span class="glyphicon glyphicon-home"> Home</span></a></li>
                        <li role="presentation" class="label label-default"><a href="course_enrolment.php" class="navFont">Enrolment</a></li>
                        <li role="presentation" class="label label-default"><a href="std_profile.php" class="navFont">Profile</a></li>                        
                        <li role="presentation" class="label label-default"><a href="#"class="navFont">Contacts</a></li>




                    </ul>
            </div>






            <div class="row">
                <div class="col-md-8">


                    <div id="slide"  class="carousel slide" >
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#slide" data-slide-to="0" class="active"></li>
                            <li data-target="#slide" data-slide-to="1"></li>
                            <li data-target="#slide" data-slide-to="2"></li>

                        </ol

                        <!-- Wrapper for slides -->

                        <div class="carousel-inner" align="center"  >
                            <div class="item active">
                                <img src="img1.jpg"   alt="Chania">
                            </div>

                            <div class="item">
                                <img src="img2.jpg"   alt="Chania">
                            </div>

                            <div class="item">
                                <img src="img3.jpg"   alt="Flower">
                            </div>


                        </div>


                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#slide" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#slide" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="col-md-4   ">
                    <div class="rightnav">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><h3>Notice<h3></div>
                                        <div class="panel-body">
                                            <p> Student enrolments are available now!</p> 
                                            <table class="table">
                                                <ul>
                <li >You are allowed to enroll for a maximum of 20 credits in a given term</li>
                 <li>The class size for any course module 40 students max.</li>
                  
                
            </ul>


                                            </table>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>    


<br>
                                        <aside>
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h1>welcome to new Moodle</h1>
                                                    <br>
                                                    <p>for your information</p></div>
                                                <div class="panel-body">

<h5>Now auto course creation is available with the new Moodle. 
    When the course module is offered it will be automatically created in new Moodle. 
    So there is no need to create any course module manually. If you have any problem regarding moodle, contact moodle admins
</h5>
                                                    
                                                    </div>




                                                </div>
                                            </div>
                                        </aside>


                                        </div>
                                        </body>

                                        </html>

