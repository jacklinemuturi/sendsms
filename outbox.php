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
    
<!-- Mirrored from byrushan.com/projects/material-admin/app/2.6/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Mar 2020 08:21:16 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="vendors/material-design-iconic-font/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="vendors/animate.css/animate.min.css">
        <link rel="stylesheet" href="vendors/jquery-scrollbar/jquery.scrollbar.css">

        <!-- App styles -->
        <link rel="stylesheet" href="css/app.min.css">
    </head>

    <body data-ma-theme="green">
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
    
                <div class="dropdown hidden" style="margin-left:1200px;">
                    
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
            <aside class="sidebar" >
                <div class="scrollbar-inner">

                    <ul class="navigation">
                    <img style="font-size:30px;" src="demo/img/chat.png" alt="Smiley face" height="82" width="82"><span style="color:skyblue;font-size:30px;">Thesms</span>
                            <br><br><br><br>
                               <li><a style="color:skyblue;font-size:15px;" href="index.php"><i class="zmdi zmdi-comment-text zmdi-hc-fw"></i>Contact</a></li>` 
                        <li class="navigation__sub">
                            <a style="color:skyblue;font-size:15px;" href="#"><i class="zmdi zmdi-comment-more zmdi-hc-fw"></i> Bulk sms</a>
                            <ul>
                                <li><a href="outbox.php"><i class="zmdi zmdi-comment-text zmdi-hc-fw"></i> Outbox<div id="outbox" class=""></div>
                                </a></li>
                                <li><a href="boxed-layout.html"><i class="zmdi zmdi-account-box-mail zmdi-hc-fw"></i>Sender ID</a></li>
                              
                            </ul>
                        </li>
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

            <section class="content">
                <header class="content__title">

                </header>
                
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                                <thead class="thead-default">
                                    <tr>
                                        <th>phonenumber</th>
                                        <th>Message</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                </tbody>
                                <?php
                                    $id            = returnValue("users","id","phonenumber",$_SESSION['bulk']);

                                    $allmessages   = returnFieldArrayFromTable("sent_messages","id","family",$id);

                                    foreach($allmessages as $getmessages)
                                    {
                                     
                                    // $parent = returnValue("sent_messages","family","id",$getmessages);
                                    // $us     = returnValue("contacts","name","id",$parent);

                                ?>
                                    <tr>
                                        <td><?php echo returnValue("sent_messages","phonenumber","id",$getmessages); ?></td>
                                        <td><?php echo returnValue("sent_messages","message","id",$getmessages); ?></td>
                                        <td><?php echo returnValue("sent_messages","name","id",$getmessages); ?></td>
                                        <td><?php echo returnValue("sent_messages","created","id",$getmessages); ?></td> 

                                    </tr>    
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- <footer class="footer hidden-xs-down">
                    <p>© Material Admin Responsive. All rights reserved.</p>

                    <ul class="nav footer__nav">
                        <a class="nav-link" href="#">Homepage</a>

                        <a class="nav-link" href="#">Company</a>

                        <a class="nav-link" href="#">Support</a>

                        <a class="nav-link" href="#">News</a>

                        <a class="nav-link" href="#">Contacts</a>
                    </ul>
                </footer> -->
            </section>
        </main>

        <!-- Javascript -->
        <!-- Vendors -->
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
    </body>

<!-- Mirrored from byrushan.com/projects/material-admin/app/2.6/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Mar 2020 08:21:21 GMT -->
</html>