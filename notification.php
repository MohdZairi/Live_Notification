<?php
require_once "inc/config.php";

$userid= $_GET['userid'];

$sql = "SELECT * FROM user WHERE ID='$userid'";
$result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1) 
  {
    $row = mysqli_fetch_assoc($result);
    $location = $row['LocationAccess'];
    $sql = "UPDATE notifications SET Status='1' WHERE LocationName='$location'";
    $result = mysqli_query($conn, $sql);

  }

?>
<?php
                                          