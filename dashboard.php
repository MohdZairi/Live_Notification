<?php 
session_start();
  
    if ( (isset($_SESSION["Login"]) && isset($_SESSION['ID'])) || (isset($_COOKIE['member_login']) && isset($_COOKIE['random_password']) && isset($_COOKIE['random_selector'] ) )) 
    {
        require_once 'inc/config.php';
        $userID= $_SESSION['ID'];

        $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE ID = $userID"));
        $location =$user['LocationAccess'];
        
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard: Online Notification </title>
    <link rel="Icon" type="Icon" href="ico.png">
    <!-- Custom fonts for this template-->
    <link href="/livenotification/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"  rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="/livenotification/css/copy-sb-admin-2.css" rel="stylesheet">
    <link href="/livenotification/css/zoom-marker.css" rel="stylesheet" >

    
    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul  class="navbar-nav bg-gradient-secondary-dashboard sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Divider -->
            <hr class="sidebar-divider my-0">            
    
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-home "></i>
                    <span>Online Notification</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link">
                        <i class="fas fa-fw fa-arrow-left"></i>
                        <span class="text">Logout</span>
                </a>
            </li>
    
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
    
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0 text-gray-800">Online Notification</h1>

                    </div>
                    <!-- Sidebar Toggle (Topbar) -->
                    
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <?php 
                                $sql = "SELECT * FROM notifications WHERE Status='0' AND LocationName='$location'";
                                $res = mysqli_query($conn, $sql); ?>
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" onclick="clearnotification()"
                                data-toggle="dropdown" aria-hidden="true">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts 
                                <span class="badge badge-danger badge-counter"><?php echo mysqli_num_rows($res); ?></span>-->
                                <span class="badge badge-danger badge-counter" id=count></span>
                                
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div id="shownoti"></div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>                      
                            </div>                            
                            
                        </li>
                        
                        
                        
                        <!-- Nav Item - Divider -->
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                                $image = $user["Picture"];
                                $fullname=$user["FullName"];                                
                            ?>
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small" ><?php echo $fullname; ?></span>    
                            <!--<img src="<?= $image ?>" class="img-profile rounded-circle" title="<?php echo $image; ?>">-->                                
                            <img src="<?= $image ?>" class="img-profile rounded-circle" ">
                        </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.html">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                    <!-- End of Topbar Navbar -->
                
                </nav>
                <!-- End of Topbar -->

                

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script>

        setInterval(() => {
        updatenoti();


        }, 2000);


        function updatenoti()
        {
            var userid = <?php echo $userID;?>;
            $.ajax({url: "updatenoti.php?userid="+userid+"&location=merapu", success: function(result){
             console.log(result);
             $("#count").html(result);
            // console.log("Sensor 2:" + result[2]);
            // console.log("Sensor 3:" + result[3]);
            

        }});
        }

        
        function shownotification() {
        var userid = <?php echo $userID;?>;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("shownoti").innerHTML =
            this.responseText;
            }
        };
        xhttp.open("GET", "shownoti.php?userid="+userid+"&location=merapu", true);
        xhttp.send();
        }
        setInterval(function(){
            shownotification();
            // 1sec
        },1000);      
        

        function clearnotification()
        {
            var userid = <?php echo $userID;?>;
            $.ajax({url: "notification.php?userid="+userid+"&location=merapu", success: function(result){
             console.log(result);
             $("#count").html(result);
            // console.log("Sensor 2:" + result[2]);
            // console.log("Sensor 3:" + result[3]);
            

        }});
        }
    </script>
    <?php 
    }else{
        header("Location: login.php");
        exit();
    }
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="/livenotification/vendor/jquery/jquery.min.js"></script>
    <script src="/livenotification/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/livenotification/vendor/jquery-easing/jquery.easing.min.js"></script>
    
    <!-- Zoommarker plugin JavaScript-->
    <script src="/livenotification/vendor/zoommarker/zoom-marker.min.js"></script>
    <script src="/livenotification/vendor/zoommarker/jquery.mousewheel.min.js"></script>
    <script src="/livenotification/vendor/zoommarker/hammer.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/livenotification/js/sb-admin-2.min.js"></script>
   

   

</body>

</html>