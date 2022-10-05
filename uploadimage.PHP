<?php
session_start();
  $image = $_SESSION['picture'];
  $email =$_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Image Profile</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Custom fonts for this template-->
    <link href="/ifutem/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/call-of-ops-duty" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script>
        function validate() 
        {

            var desc =
                document.forms.DesForm.Description.value;
            if (desc == "") {
                error = " Please enter your description. ";
                  document.getElementById( "error_para" ).innerHTML = error;
                  return false;
            }
            if(password.length <6){
                error = " Description should be atleast 6 character long. ";
                  document.getElementById( "error_para" ).innerHTML = error;
                  return false;
            }
           
            
            return true;
        }
    </script>
  </head>

<body class="bg-gradient-secondary">

    <nav class="login-nav">
        <a class="font-weight-bold float-right active" href="register.php" title="Register">Register</a>
        <a class="font-weight-bold float-right" href="login.php" title="Login">Login</a>
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
                                        <h1 class="h4 text-gray-900 mb-4 font-weight-bold">REGISTER</h1>
                                        <p style="color:red;" id="error_para" ></p>
                                  </div>
                                  <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
                                    <div class="upload">

                                      <img src="img/<?php echo $image; ?>" width = 125 height = 125>
                                      <div class="round">
                                        <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
                                        <i class = "fa fa-camera" style = "color: #fff;"></i>
                                      </div>
                                    </div>
                                  </form>
                                   <br>
                                   <form class ="user" action="uploadesc.php?email=$email" name="DesForm" onsubmit="return validate()" method="post">
                                        
                                        <div class="form-group">
                                            <input type="description" class="form-control form-control-user"
                                               name="Description"
                                                placeholder="Description">
                                        </div>
                                        
                                        <input class="btn btn-secondary btn-user btn-block" type="submit"
                                                value="Register" name="desc_form" />


                                    </form>
                                  <script type="text/javascript">
                                    document.getElementById("image").onchange = function(){
                                        document.getElementById("form").submit();
                                    };
                                  </script>
                                </div>
                            </div>
                        </div>
               </div>
            </div>
        </div>
    </div>
  </div>
                      
    
  </body>
</html>

