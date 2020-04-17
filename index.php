<?php
    session_start();    

    if(!isset($_SESSION['bulk']))    
    {
        header("Location:login.php");
    }

    require_once "functions.php";

    $isActive = returnValue("users","status","phonenumber",$_SESSION['bulk']);
    if($isActive == "pending")
    {
        header("Location:activate.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="vendors/material-design-iconic-font/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="vendors/animate.css/animate.min.css">
        <link rel="stylesheet" href="vendors/jquery-scrollbar/jquery.scrollbar.css">

        <!-- App styles -->
        <link rel="stylesheet" href   ="css/app.min.css">
    </head>

    <body data-ma-theme="green">
        <!-- navbarc container -->
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            <header class="header">
                <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
                    <div class="navigation-trigger__inner">
                        <i class="navigation-trigger__line"></i>
                        <i class="navigation-trigger__line"></i>
                        <i class="navigation-trigger__line"></i>
                    </div>
                </div>

                <form class="search">
                    <div class="search__inner">
                        <input type="text" class="search__text" placeholder="Search for people, files,documents...">
                        <i class="zmdi zmdi-search search__helper" data-ma-action="search-close"></i>
                    </div>
                </form>
                <div class="dropdown hidden">
                    
                    <a href="#" data-toggle="dropdown"><i style="font-size:26px;color:white;" class="zmdi zmdi-account-circle zmdi-hc-fw "></i></a>

                    <div class="dropdown-menu dropdown-menu-left" role="menu">
                        <a class="dropdown-item" href="#">View Profile</a>
                    </div>
                    
                </div>   
                <div class="actions">
                    <div class="dropdown actions__item">
                        <i data-toggle="dropdown"  style="font-size:26px;color:white;" class="zmdi zmdi-more-vert"></i>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item"><i class="zmdi zmdi-refresh zmdi-hc-fw"></i>Refresh</a>
                             <a href="#" class="dropdown-item"><i class="zmdi zmdi-settings zmdi-hc-fw"></i>Settings</a>
                            <a href="#" class="dropdown-item"><i class="zmdi zmdi-power zmdi-hc-fw"></i>Log out</a>

                        </div>
                    </div>
                </div>              
            </header>
            <!-- end navbar container -->
            <!-- sidebar -->
            <aside class="sidebar" >
                <div class="scrollbar-inner">

                    <ul class="navigation">
                    <img style="font-size:30px;" src="demo/img/chat.png" alt="Smiley face" height="82" width="82"><span style="color:skyblue;font-size:30px;">Thesms</span>
                            <br><br><br><br>
                        <!-- <li style="font-size:20px;" class="navigation__active"><a href="index.html"><i  class="zmdi zmdi-home"></i> Dashboard</a></li> -->
                               <li class="navigation__sub">
                                <a style="color:#87CEEB;font-size:15px;" href="#"><i class="zmdi zmdi-phone zmdi-hc-fw"></i> Contact</a>                           
                            <ul>
                                <li><a href="outbox.html"><i class="zmdi zmdi-phone zmdi-hc-fw"></i> contacts<div class=""></div>
                                </a></li>
                                <li><a href="boxed-layout.html"><i class="zmdi zmdi-accounts-alt zmdi-hc-fw"></i>group</a></li>
                              
                            </ul>
                        <li class="navigation__sub">
                            <a style="color:skyblue;font-size:15px;" href="#"><i class="zmdi zmdi-comment-more zmdi-hc-fw"></i> Bulk sms</a>
                            <ul>
                                <li><a href="outbox.html"><i class="zmdi zmdi-comment-text zmdi-hc-fw"></i> Outbox<div class=""></div>
                                </a></li>
                                <li><a href="boxed-layout.html"><i class="zmdi zmdi-account-box-mail zmdi-hc-fw"></i>Sender ID</a></li>
                              
                            </ul>
                        </li>
                        <!-- <li>
                            <a style="color:skyblue;font-size:15px;" href="#" data-toggle="modal" data-target="#modalLoginForm"><i class="zmdi zmdi-comments zmdi-hc-fw"></i>Send Message</a>
                        </li> -->

                        <li class="navigation__sub">
                            <a style="color:#87CEEB;font-size:15px;" href="#"><i class="zmdi zmdi-settings zmdi-hc-fw"></i>Account Settings</a>
                            <ul>
                                <li><a href="outbox.html"><i class="zmdi zmdi-comment-text zmdi-hc-fw"></i> Change password<div class=""></div>
                                </a></li>
                                <li><a href="boxed-layout.html"><i class="zmdi zmdi-account-box-mail zmdi-hc-fw"></i>Sender ID</a></li>
                              
                            </ul>
                        </li>
                       
                    </ul>
                </div>
            </aside>
            <!-- end sidebar -->
                <!-- End side -->
            <section class="content">
                <header class="content__title">
                    <div>
                        <button type="button" class="btn btn-outline-success pull-right"  data-toggle="modal" data-target="#add">Add Contact</button>
                        <button type="button" class="btn btn-outline-success pull-right">Message All</button>    
                    </div>

                    <!-- modal add contact -->
                    <div class="modal fade" id="add" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title pull-left">Add Contact</h5>
                                </div>
                                <div class="modal-body">
                                <p>Code sent to <b><?php echo $_SESSION['bulk']; ?></b></p>
                                <p id="contactresponse" class="h5 text-center text-danger py-4" style="color:#32c787;"></p>
                                    <div class="md-form">
                                        <i class="fa fa-user prefix grey-text"></i>
                                        <input type="text" id="contactName" class="form-control">
                                        <label for="materialFormCardEmailEx" class="font-weight-light">Name</label>
                                    </div>                    
                                    <div class="md-form">
                                        <i class="fa fa-harsh prefix grey-text"></i>
                                        <input type="text" id="contactNumber" class="form-control">
                                        <label for="materialFormCardPasswordEx" class="font-weight-light">Phonenumber</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" id="addnew">Add</button>
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </header> 
                <!-- graph -->
                </li>
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Contacts</h4>
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
            
                                <?php
                                    $id            = returnValue("users","id","phonenumber",$_SESSION['bulk']);
                                    $allContactIds = returnFieldArrayFromTable("contacts","id","family",$id);

                                    foreach($allContactIds as $singleContact)
                                    {

                                    
                                ?>
                                <!-- modal sendmessage -->
                                <div class="modal fade" id="message<?php echo $singleContact; ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title pull-left">Send Message to  <b><?php echo returnValue("contacts","name","id",$singleContact); ?></b></p></h5>
                                            </div>
                                            <div class="modal-body">
                                            <p id="msgbtnsresponse<?php echo $singleContact; ?>" class="h5 text-center text-danger py-4" style="color:#32c787;"></p>
                                                <div class="md-form">
                                                    <i class="fa fa-user prefix grey-text"></i>
                                                    <input type="hidden" value="<?php echo returnValue("contacts","phonenumber","id",$singleContact); ?>" id="messagephone<?php echo $singleContact; ?>"/>
                                                    <textarea type="text" id="messagetext<?php echo $singleContact; ?>" class="form-control"></textarea>
                                                    <label for="materialFormCardEmailEx" class="font-weight-light">Text Message</label>
                                                </div>                    
                                            </div>
                                            <div class="modal-footer" id="msgbtns">
                                                <button type="button" class="btn btn-link"  value="<?php echo $singleContact; ?>">Send Message</button>
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <tr>
                                        <td><?php echo returnValue("contacts","name","id",$singleContact); ?></td>
                                        <td><?php echo returnValue("contacts","phonenumber","id",$singleContact); ?></td>
                                        <td><i class="zmdi zmdi-email zmdi-hc-fw" data-toggle="modal" data-target="#message<?php echo $singleContact; ?>"></i></td>
                                        <td><a href="#"><i class="zmdi zmdi-edit zmdi-hc-fw" ></i></a></td>
                                        <td><a href="#"><i class="zmdi zmdi-delete zmdi-hc-fw" style="color:red;"></i></a></td>
                                    </tr>     
                                <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end graph -->  
            </section>   
        </main>

        <!-- Javascript -->
        <script src="vendors/jquery/jquery.min.js"></script>
        <script src="vendors/popper.js/popper.min.js"></script>
        <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/jquery-scrollbar/jquery.scrollbar.min.js"></script>
        <script src="vendors/jquery-scrollLock/jquery-scrollLock.min.js"></script>

        <!-- Vendors: Data tables -->
        <script src="vendors/datatables/jquery.dataTables.min.js"></script>
        <script src="vendors/datatables-buttons/dataTables.buttons.min.js"></script>
        <script src="vendors/datatables-buttons/buttons.print.min.js"></script>
        <script src="vendors/jszip/jszip.min.js"></script>
        <script src="vendors/datatables-buttons/buttons.html5.min.js"></script>

        <!-- App functions and actions -->
        <script src="js/app.min.js"></script>
        <script src="main.js"></script>

    </body>

<!-- Mirrored from byrushan.com/projects/material-admin/app/2.6/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Mar 2020 08:20:21 GMT -->
</html>