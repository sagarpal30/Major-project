<?php
include("config.php");

$id= $_GET['emailid'];

$query ="DELETE FROM ssignup WHERE emailid='$id'";
$data  =mysqli_query($conn,$query);

if($data)
{
    echo "<script>alert('Record Deleted')</script>";
    ?>

    <meta http-equiv = "refresh" content = "0; url =http://localhost/final%20project/adminpanel.php" />    
    <?php
    
}
 
 
?>