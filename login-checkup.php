<?php

include "inc/config.php";
include "inc/session.php";
require_once "Util.php";


$util = new Util();
// Get Current date, time
$current_time = time();
$current_date = date("Y-m-d H:i:s", $current_time);

// Set Cookie expiration for 1 month
$cookie_expiration_time = $current_time + (30*24*60*60);  // for 1 month

if(isset($_POST['login_form']))
{
	 function validate_data($data)
	 {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = strip_tags($data);
	  $data = htmlspecialchars($data);
	  return $data;    
	 }

	 $error = "" ;
	 $email = validate_data( $_POST['EMail'] );
	 $password = validate_data( $_POST['Password'] );

     $sql = "SELECT * FROM user WHERE Email='$email' AND Password='$password'";

     $result = mysqli_query($conn, $sql);

     if (mysqli_num_rows($result) === 1) 
     {
         $row = mysqli_fetch_assoc($result);
         if ($row['Email'] === $email && $row['Password'] === $password) {
             $username=$row['UserName'];
             $ID= $row['ID'];
                       
             
             //to create cookies and put in the database
             
             if(!empty($_POST['remember']))
             {
                //start cookies
                $random_password = $util->getToken(16);
                $random_selector = $util->getToken(32);
                setcookie('member_login', $row['ID'],$cookie_expiration_time);
                setcookie('random_password', $random_password,$cookie_expiration_time);
                setcookie('random_selector', $random_selector,$cookie_expiration_time);
                //setcookie('EMail', $email,$cookie_expiration_time);
                //setcookie('Password', $password,$cookie_expiration_time);
                $expiry_date =date("Y-m-d H:i:s", $cookie_expiration_time);

                $random_password = password_hash($random_password,PASSWORD_DEFAULT);
                $random_selector = password_hash($random_selector,PASSWORD_DEFAULT);


                // mark existing token as expired
                $expired='0';
                $sql = "SELECT * FROM token WHERE UserName='$username' AND Is_Expired='$expired'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) 
                {
                    $isexpired='1';
                    $sql2 = "UPDATE token SET  Is_Expired='$isexpired'  WHERE UserName='$username'";
                    $result2 = mysqli_query($conn, $sql2);
                }
               
                $sql2 = "INSERT INTO token (UserName,Password_Hash,Selector_Hash,Expired_Date,User_ID) VALUES('$username', '$random_password', '$random_selector','$expiry_date','$ID')";
                $result2 = mysqli_query($conn, $sql2);

                // $sql = "SELECT * FROM token WHERE UserName='$username' AND Is_Expired='$expired'";
                // $result = mysqli_query($conn, $sql);
                // if (mysqli_num_rows($result) > 0) 
                // {
                //     $_SESSION["Login"] = true;  
                // }

                

             }
             else  
				{  
					if(isset($_COOKIE["member_login"]))   
					{  
						setcookie ("member_login","");  
					}  
					if(isset($_COOKIE["random_password"]))   
					{  
						setcookie ("random_password","");  
					}
                    if(isset($_COOKIE["random_selector"]))   
					{  
						setcookie ("random_selector","");  
					}    
				}  
            

             $_SESSION["Login"] = true;
             $_SESSION["ID"]=$row['ID'];
             header("Location: dashboard.php");
             exit();

         }else{
             header("Location: login.php?error=Incorect Username or password");
             exit();
         }
     }else{
         header("Location: login.php?error=Incorect Username or password");
         exit();
     }
	
	
	 
  
}
?>