<?php
session_start();
require_once "inc/config.php";

if(isset($_POST["submit_form"]))
{
	 function validate_data($data)
	 {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = strip_tags($data);
	  $data = htmlspecialchars($data);
	  return $data;    
	 }

	 $error="" ;
	 $fullname = validate_data( $_POST['FullName'] );
	 $username = validate_data( $_POST['UserName'] );
	 $phone = validate_data( $_POST['Telephone'] );
	 $email = validate_data( $_POST['EMail'] );
	 $location = validate_data( $_POST['Location'] );
	 $password = validate_data( $_POST['Password'] );
	 $image ="img/noprofil.jpg";


      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));

	$sql = "SELECT * FROM user WHERE Email='$email' ";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) 
	{
		header("Location: register.php?error=This email ".$email." is already taken");
	}
	else
	{
		
		$sql2 = "INSERT INTO user (FullName,UserName,Password,Phone,Email,LocationAccess,Picture) VALUES('$fullname','$username','$password','$phone','$email','$location','$image')";
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
	
	
	 
  
}
 
    
?>