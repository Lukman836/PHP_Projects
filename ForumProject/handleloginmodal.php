<?php
session_start();
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"):
    require "db.php";
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    $sql = "select * from Forum_user where email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
        if($num==1):
            $row = mysqli_fetch_assoc($result);
                if (password_verify($pwd, $row['password'])):
                    $_SESSION['loggedin']= true;
                    $_SESSION['sno'] = $row['sno'];
                    $_SESSION['email']=$email;
                    echo "logged in ". $email;
                endif;    
            header("Location: /Training/PHP/17-10-23/ForumProject/index.php?loginsuccess=true");
            // exit;
        else:
            header("Location: /Training/PHP/17-10-23/ForumProject/index.php?loginsuccess=false");
            exit;
        endif;  
    // header("Location: /Training/PHP/17-10-23/ForumProject/index.php?loginsuccess=false");
endif;