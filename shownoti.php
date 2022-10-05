<?php 
include("inc/config.php");
$userid= $_GET['userid'];

$sql = "SELECT * FROM user WHERE ID='$userid'";
$result = mysqli_query($conn, $sql);
 ?>
        
 <?php
    if (mysqli_num_rows($result) === 1) 
    {
        $row = mysqli_fetch_assoc($result);
        $location = $row['LocationAccess'];
        $sql= "SELECT * FROM  notifications WHERE Status='1' AND LocationName='$location' ORDER BY Timestamp DESC LIMIT 5";
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($res)) 
        {
                $location =$row['LocationName'];
                $message  =$row['Message'];
?>

                <div>
                    <div class="small text-gray-500"><?php echo $location; ?></div>
                        <span class="font-weight-bold"><?php echo $message; ?></span>
                </div>

                    
<?php 	} 
    }?>
 