
<?php
    require("config.php");

    session_start();

    $admin= $_SESSION['aname'];

    if($admin == true)
    {

    }
    else
    {
        header("location: alogin.php");
    }

    function input_field($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

$pErr="";
if(isset($_POST['add']))
// if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(input_field($_POST['ps']) !=  input_field($_POST['cps']))
    {
        $pErr="password should match";
       echo "<script>alert('Password should be match')</script>";
    }
    $userName=input_field($_POST['un']);
    $email=input_field($_POST['ei']);
    $regNo=input_field($_POST["rn"]);
    $userExistQuery= "SELECT * FROM ssignup WHERE username='$userName' OR emailid='$email' OR regno='$regNo'";

    $result=mysqli_query($conn,$userExistQuery);



    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            $resultFetch=mysqli_fetch_assoc($result);

            if($resultFetch['emailid']==input_field($_POST['ei']))
            {
                echo "<script>alert('$resultFetch[emailid] - emailid already taken')</script>";
            }
            elseif($resultFetch['regno']==input_field($_POST['rn']))
            {
                echo "<script>alert('$resultFetch[regno] - Registration No. already taken')</script>";
            }
            else
            {
                echo "<script>alert('$resultFetch[username] - username already taken')</script>";
            }
        }
       
        else if(empty($pErr))
        {
              
            $query="INSERT INTO ssignup(simage,fullname,username,emailid,phoneno,gender,regno,stream,password) VALUES(?,?,?,?,?,?,?,?,?)";
            
            $stmt = mysqli_prepare($conn,$query);

            if($stmt)
            {
                mysqli_stmt_bind_param($stmt, "sssssssss",$folder,$fullName,$userName,$email,$phonNo,$gender,$regNo,$stream,$password);

                $filename = $_FILES["uploadfile"]["name"];
                $tempname = $_FILES["uploadfile"]["tmp_name"];
    
                $folder = "simages/".$filename;
        
        
                move_uploaded_file($tempname, $folder);
                $fullName=input_field($_POST["fn"]);
                $userName=input_field($_POST["un"]);
                $email=input_field($_POST["ei"]);
                $phonNo=input_field($_POST["p"]);
                $gender=input_field($_POST["gn"]);
                $regNo=input_field($_POST["rn"]);
                $stream=input_field($_POST["stream"]);
                $password=password_hash($_POST["ps"],PASSWORD_DEFAULT) ;
                $cPassword=input_field($_POST["cps"]);
                if(mysqli_stmt_execute($stmt))
                {    
                    echo "<script>alert('registtation succesfull');
                        
                    </script>";
                }
                else
                {
                    echo "<script>alert('data not registerd');
                    </script>"; 
                }
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($conn);
    }
    // else
    // {
    //     echo "<script>alert('cannot run query or server down');
           
    //         </script>";
    // }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_dash.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Add Student</title>
    <script
    src="https://kit.fontawesome.com/b7bea72bea.js"
    crossorigin="anonymous"
  ></script>
</head>
<body>
    <nav>

        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.webp">
            </div>
           
            <a href="adminpanel.php" style="text-decoration: none"><span class="logo_name">AdminPannel</span></a>
        </div>
        

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="search.php"><i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                    <span class="link-name">Search Student</span>
                 </a> </li>

                 <li><a href="edit.php"><i class="fa-solid fa-user-pen"></i>
                    <span class="link-name">Edit Student</span>
                 </a> </li>

                 <li><a href="addStudent.php"><i class="fa-solid fa-user-plus"></i>
                    <span class="link-name">Add New Student</span>
                 </a> </li>

                <li><a href="delete.php"><i class="fa-solid fa-user-minus"></i>
                    <span class="link-name">Delete Student</span>
                 </a> </li>

                <!-- <li><a href="#"><i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Likes</span>
                 </a> </li>

                <li><a href="#"><i class="uil uil-comments"></i>
                    <span class="link-name">Comments</span>
                 </a> </li>

                <li><a href="#"><i class="uil uil-share"></i>
                    <span class="link-name">Share</span>
                 </a> </li> -->
            </ul>

            <ul class="logout-mod">
                <li>
                    <a href="logout.php"><i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                 </a> 
                </li>

                <li class="mode">
                    <a href="#"><i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                 </a> 
                
                
                <div class="mode-toogle">
                <span class="switch"></span>
                </div>
                </li>
            </ul>
        </div>
    </nav>


    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        
        <div class="search-box">
            <!-- <i class="uil uil-search"></i>
            <input type ="text"  placeholder="search here"> -->

            <h1>WELCOME  - <?php 

            if(isset($_SESSION['logged_in']))
            {
                echo $_SESSION['aname']; 
            }
            ?>
            </h1>

        </div>
        <img src="images/logo.jpg">
        </div>

        <div class="dash_content">
            <h1>Add New Student</h1>

            <form action="#" method="POST" enctype="multipart/form-data">
            <table cellspacing="10" cellpadding="10">

            <tr>
                <td>Student Image</td>
                <td> <input type="file" placeholder="" name="uploadfile" required></td>
            </tr><br>

            <tr>
               <td>Full Name</td>
               <td><input type="text" placeholder="Enter your name" name="fn" required></td>
            </tr>

            <tr>
                <td>User Name</td>
                <td><input type="text" placeholder="Enter Username" name="un" required></td>
            </tr>


            <tr>
                <td>Email</td>
                <td><input type="email" placeholder="Email Id" name="ei" required></td>
            </tr>

            <tr>
               <td>Phone No</td>
               <td><input type="text" placeholder="Phone Number" name="p" required></td>
            </tr>


            <tr>
              <td>Gender</td>
              <td>
              <select name="gn">
                    <option value="">Select</option>
                    
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="otherse">Others</option>
                </select>
              </td>
            </tr>

            <tr>
               <td>Registration No</td>
               <td><input type="text" placeholder="Registration Number" name="rn" required></td>
            </tr>

            <tr>
              <td>Stream</td>
              <td>
              <select name="stream">
                    <option value="">Select</option>
                    
                    <option value="BCA">BCA</option>
                    <option value="BBA">BBA</option>
                   
                </select>
              </td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type="password" placeholder="Password" name="ps" required></td>
            </tr>

            <tr>
                <td>Confirm Password</td>
                <td><input type="password" placeholder="Confirm Password" name="cps" required></td>
            </tr>

            <tr>
                <td colspan="2" style="text-align:center"> <input type="submit" name="add" value="ADD STUDENT"></td>
            </tr>

            </table>
            </form>
            <!-- <div class="overview"></div> -->
        </div>   
    </section>

    

    <script src="js/admin_dash.js"></script>
</body>
</html>

















