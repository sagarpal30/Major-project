<?php
    require("config.php");  
    error_reporting(0);

    session_start();

    $admin= $_SESSION['aname'];

    if($admin == true)
    {

    }
    else
    {
        header("location: alogin.php");
    }

    $emailid= $_GET['emailid'];
    $query ="SELECT * FROM ssignup WHERE emailid='$emailid'";
    $data  =mysqli_query($conn,$query);
    $result=mysqli_fetch_assoc($data);

   
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="titel">UPDATE Student Details</div>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="user-details">


            <div class="input-box">
                <span class="details">Add Student Image</span>
                <input type="file" placeholder="" name="uploadfile" required>
            </div>

            <div class="input-box">
                <span class="details">Full Name</span>
                <input type="text" placeholder="Enter your name" name="fn" value="<?php echo $result['fullname'];?>"
                required>
            </div>
            <div class="input-box">
                <span class="details">Username</span>
                <input type="text" placeholder="Enter Username" name="un" value="<?php echo $result['username'];?>" required>
            </div>
            <div class="input-box">
                <span class="details">Email</span>
                <input type="text" placeholder="Email Id" name="ei" value="<?php echo $result['emailid'];?>" required>
            </div>
            <div class="input-box">
                <span class="details">Phone No.</span>
                <input type="text" placeholder="Phone Number" name="p" value="<?php echo $result['phoneno'];?>" required>
            </div>

            <div class="input-box">
                <span class="details">Gender</span>
                <select name="gn">
                    <option value="">Select</option>
                    
                    <option value="male"
                        
                    <?php
                    if($result['gender'] == 'male')
                    {
                        echo "selected";
                    }
                ?>

                    >Male</option>
                    <option value="female"
                    
                    <?php
                    if($result['gender'] == 'female')
                    {
                        echo "selected";
                    }
                ?>

                    >Female</option>
                    <option value="otherse"
                    <?php
                    if($result['gender'] == 'otherse')
                    {
                        echo "selected";
                    }
                ?>
                    >Others</option>
                </select>
            </div>

            

            <div class="input-box">
                <span class="details">Registration No.</span>
                <input type="text" placeholder="Registration Number" name="rn"  value="<?php echo $result['regno'];?>">
            </div>
            
            
            <div class="input-box">
                <span class="details">Stream</span>
                <select name="stream">
                    <option value="">Select</option>
                    
                    <option value="BCA"
                    <?php
                    if($result['stream'] == 'BCA')
                    {
                        echo "selected";
                    }
                ?>
                    
                    >BCA</option>
                    <option value="BBA"
                    
                    <?php
                    if($result['stream'] == 'BBA')
                    {
                        echo "selected";
                    }
                ?>
                    
                    >BBA</option>
                   
                </select>
            </div>
            
            <div class="input-box">
                <span class="details">Password</span>
                <input type="password" placeholder="Password" name="ps" required>
            </div>
            <div class="input-box">
                <span class="details">Confirm Password</span>
                <input type="password" placeholder="Confirm Password" name="cps" required>
            </div>
            </div>
            <div class="button">
                <input type="submit" name="update" value="UPDATE">
            </div>
 
        </form>
    </div>
</body>
</html>


<?php
 
 function input_field($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
    if($_POST['update'])
    {
                $filename = $_FILES["uploadfile"]["name"];
                $tempname = $_FILES["uploadfile"]["tmp_name"];
    
                $folder = "simages/".$filename;
        
        
                move_uploaded_file($tempname, $folder);
                $fullName=input_field($_POST["fn"]);
                $userName=input_field($_POST["un"]);
                // $email=input_field($_POST["ei"]);
                $phonNo=input_field($_POST["p"]);
                $gender=input_field($_POST["gn"]);
                $regNo=input_field($_POST["rn"]);
                $stream=input_field($_POST["stream"]);
                $password=password_hash($_POST["ps"],PASSWORD_DEFAULT) ;
                $cPassword=input_field($_POST["cps"]);


                $sql="UPDATE ssignup SET simage='$folder',fullname='$fullName',username='$userName',phoneno='$phonNo',gender='$gender',regno='$regNo',stream='$stream',password='$password' WHERE emailid='$emailid'";

                $data1 =mysqli_query($conn,$sql);

                if($data1)
                {
                   
                    echo "<script>alert('Record Updated')</script>"
                    
                    ?>
        
                    <meta http-equiv = "refresh" content = "0; url =http://localhost/final%20project/adminpanel.php" />
                    <?php
                   
           
                }
                else
                {
                    echo "record not updated";
                }
            }
    
?>