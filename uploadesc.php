<?php
session_start();
require_once "inc/config.php";

if(@$_GET['email'])
{
	 function validate_data($data)
	 {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = strip_tags($data);
	  $data = htmlspecialchars($data);
	  return $data;    
	 }

	 $desc = validate_data( $_POST['desc'] );

		
		$sql2 = "UPDATE user SET desc='$desc' WHERE id=2";
		$result2 = mysqli_query($conn, $sql2);
		if ($result2) 
		{
			$sql3 = "SELECT * FROM user WHERE Email='$email'";
			$result3 = mysqli_query($conn, $sql3);
			$row = mysqli_fetch_assoc($result3);
			$_SESSION['picture'] = $row['Picture'];	
			$_SESSION['email'] = $row['Email'];	
		   //header("Location: register.php?error=Your account has been created successfully");
			header("Location: uploadimage.php");
			exit();
		}
		else 
		{
		   header("Location: register.php?error=Unknown error occurred");
		   
		} 
		
	
	
	
	 
  
}
 
    
?>