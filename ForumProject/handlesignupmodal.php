<?php
$showError=false;
if ($_SERVER['REQUEST_METHOD'] == 'POST'):
    require "db.php";
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $cpwd = $_POST['cpassword'];

    $existSql = "SELECT * FROM `Forum_user` WHERE email='$email'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
        if($numExistRows > 0):
            $showError = "Email Already Exists";
        else: 
            if($pwd == $cpwd):
                $hash = password_hash($pwd, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `Forum_user` (`email`, `password`, `date`) VALUES ('$email', '$hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                    if($result):
                        $showAlert = true;
                            header("Location: /Training/PHP/17-10-23/ForumProject/index.php?signupsuccess=true");
                        exit;
                    endif;
            else:
                $showError = "Passwords do not match";
            endif;
        endif;
    header("Location: /Training/PHP/17-10-23/ForumProject/index.php?signupsuccess=false&error=$showError");
endif;