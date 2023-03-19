<?php
    require("config.php");
    
    if(isset($_GET['email'])&& isset($_GET['v_code'])){
        $query="SELECT * FROM asignup WHERE emailid ='$_GET[email]' AND verification_code = '$_GET[v_code]'";
        $result =mysqli_query($conn,$query);

        if($result){
            if(mysqli_num_rows($result)==1){
                $result_fetch=mysqli_fetch_assoc($result);
                if($result_fetch['is_verified']==0){
                    $update = "UPDATE asignup SET is_verified='1' WHERE emailid='$result_fetch[emailid]'";
                    if(mysqli_query($conn,$update)){
                        echo "<script>alert('email verification successfull');
                        window.location.href='index.php';
                        </script>"; 
                    }
                    else{
                        echo "<script>alert('cannot run query');

                        </script>"; 
                    }
                }
                else{
                    echo "<script>alert('email already verified');
                    window.location.href='index.php';
                    </script>"; 
                }
            }
        }
        else{
            echo "<script>alert('server down');
            </script>"; 
        }
    }
?>