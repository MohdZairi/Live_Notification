<?php
require_once "inc/config.php";

$userid= $_GET['userid'];

$sql = "SELECT * FROM user WHERE ID='$userid'";
$result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1) 
  {
    $row = mysqli_fetch_assoc($result);
    $location = $row['LocationAccess'];
    $sql= "SELECT * FROM  notifications WHERE Status='0' AND LocationName='$location'";
    $result = mysqli_query($conn,$sql);
    if(($result->num_rows)>0)
      echo $result->num_rows;
    else 
      echo NULL;
    
  }

?>
<?php
                                          