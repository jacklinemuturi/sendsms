<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/css/mdb.min.css" rel="stylesheet">
        <link rel="stylesheet" href="vendors/material-design-iconic-font/css/material-design-iconic-font.min.css">
        <!-- App styles -->
        <link rel="stylesheet" href="css/app.min.css">
    </head>

    <body data-ma-theme="green">
        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                    <div class="col-5">
                        <div class="card animated fadeInLeft" style="margin-top:100px;">
                        <!-- Card body -->
                            <div class="card-body">
                                <!-- Material input email -->
                                <p style="font-size:20px;">Reset password</p>
                                <p id="forgot1response" class="h5 text-center text-danger py-4" style="color:#32c787;"></p>
                                <div class="md-form">
                                    <input type="text" id="username_forgotpassword" class="form-control" placeholder="Enter your username">
                                </div>                    
                                <div class="text-center py-4 mt-3">
                                    <button style="background-color:#32c787;" type="button" id="forgot1" class="btn btn-block">Continue</button>
                                </div>
                            </div>
                        </div>
                        <a style="font-size:30px;color:#32c787;" href="login.php"><i class="zmdi zmdi-long-arrow-return zmdi-hc-fw"></i><span style="font-size:15px;">Back to login</span></a>
                    </div>
                <div class="col-3"></div>
            </div>
        </div>
        <script src="jquery.js"></script>
        <script src="main.js"></script>  
    </body>
</html>