<?php
    session_start();
    if(isset($_SESSION['bulk']))    
    {
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from byrushan.com/projects/material-admin/app/2.6/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Mar 2020 08:23:28 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Sign Up</title>
        
        <!-- App styles -->
        <link rel="stylesheet" href="css/app.min.css">
    </head>

    <body data-ma-theme="green">
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <!-- Card -->
                    <div class="card animated zoomIn mt-5">
                    <!-- Card body -->
                        <div class="card-body">
                            
                                <p class="h4 text-center py-4" style="color:#32c787;">Sign up</p>

                                <p id="response" class="h5 text-center text-danger py-4" style="color:#32c787;"></p>

                                <!-- Material input text -->
                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" id="name" class="form-control" placeholder="Your name">
                                </div><br>
                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" id="uname" class="form-control" placeholder="username">
                                </div><br>
                                 <!-- Material input phonenumber -->
                                <div class="md-form">
                                    <i class="fa fa-envelope prefix grey-text"></i>
                                    <input type="number" id="phone" class="form-control" placeholder="phonenumber">
                                </div><br>
                                <!-- Material input password-->
                                <div class="md-form">
                                <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="password" id="password" class="form-control" placeholder="password">
                                </div><br>
                                <!-- Material input confirm password -->
                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="password" id="confirm" class="form-control" placeholder="confirm password">
                                </div><br>
                                <div class="text-center py-4 mt-3">
                                    <button style="background-color:#32c787;" class="btn btn-block" id="register">Register</button>
                                </div>
                          
                        </div>
                    </div>
                    <!-- Card -->
                </div>
                <div class="col-4"></div>

            </div>
        </div>

    <script src="jquery.js"></script>
    <script src="main.js"></script>
</body>
</html>