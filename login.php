<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login: Notification System</title>
    <link rel="Icon" type="Icon" href="ico.png">

    <!-- Custom fonts for this template-->
    <link href="/livenotification/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/call-of-ops-duty" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
    <!-- Custom styles for this template-->
    <link href="/ifutem/css/sb-admin-2.css" rel="stylesheet">
    <script>
        function validate() {
            var email =
                document.forms.RegForm.EMail.value;
            var password =
                document.forms.RegForm.Password.value;
            var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g; //Javascript reGex for Email Validation.


            if (email == "" ) {
                 error = " Please enter your e-mail address. ";
                  document.getElementById( "error_para" ).innerHTML = error;
                  return false;
            }
            else if (!regEmail.test(email))
            {
                error = " Please enter a valid e-mail address. ";
                  document.getElementById( "error_para" ).innerHTML = error;
                  return false;
            }
           
            if (password == "") {
                error = " Please enter your password. ";
                  document.getElementById( "error_para" ).innerHTML = error;
                  return false;
            }
                            

            return true;
        }
    </script>
    <script>
        function myFunction() 
        {
            var x = document.getElementById("Password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</head>

<body class="bg-gradient-secondary">

    <nav class="login-nav color-white">

        <a class="font-weight-bold float-right" href="register.php" title="Register">Register</a>
        <a class="font-weight-bold float-right active" href="login.html" title="Login">Login</a>
    </nav>

<div>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center " >

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5" >

                        <!-- Nested Row within Card Body -->
                        <div class="row" >

                            <div class="col-lg-12 color-white">
                                
                                <div class="p-5">

                                <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 font-weight-bold">LOGIN</h1>
                                        <?php if (isset($_GET['error'])) { ?>
											<p style= "color:red;" ><?php echo $_GET['error']; ?></p>
										<?php } ?>
                                        <p style="color:red;" id="error_para" ></p>
                                    </div>
                                        
                                    <form class ="user" action= "login-checkup.php" name="RegForm" onsubmit="return validate()" method="post">
			
                                        
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user checking_email"
                                                name="EMail" 
                                                placeholder="Email" >
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                            name="Password" id="Password" 
                                            placeholder="Password" >
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="remember"  class="custom-control-input" id="customCheck"  <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
                                                <label class="custom-control-label" for="customCheck"  >Remember Me</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class=" custom-checkbox small">
                                                <input  type="checkbox" onclick="myFunction()"> Show Pasword                  
                                            </div>   
                                        </div>
                                        
                                        <input class="btn btn-secondary btn-user btn-block" type="submit"
                                                value="Login" name="login_form" />

                                        </a>
                                        <hr>
                
                                    </form>

                                    

                                   

                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

    <!-- Bootstrap core JavaScript-->
    <script src="livenotification/vendor/jquery/jquery.min.js"></script>
    <script src="livenotification/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="livenotification/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="livenotification/js/sb-admin-2.min.js"></script>

</body>

</html>