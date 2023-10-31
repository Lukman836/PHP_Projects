<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'):
    $showAlert=false;
    $showError=false;
    require "db.php";
    $name = $_POST['username'];
    $pwd = $_POST['password'];
    $cpwd = $_POST['cpassword'];

    $existSql = "SELECT * FROM `users` WHERE username='$name'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0):
        $showError = "Username Already Exists";
    else: 
        if($pwd == $cpwd):
            $hash=password_hash($pwd, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`username`, `password`, `date`) VALUES ('$name', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result):
                $showAlert=true;
            endif;    
        else:
            $showError="Passwords do not match";
        endif;
    endif;
endif;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php require "nav.php";
        if($showAlert):
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong>Your Account is now created and you can login.
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>';
        endif;
        if($showError):
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> '. $showError.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> ';
        endif;
    ?>
    <div class="container my-4">
        <h1 class="text-center">Sign Up to our Website</h1>
        <form action="/Training/PHP/17-10-23/LoginSystem/signup.php" method="post">
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" maxlength="11" id="username" required aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" required name="password" class="form-control" maxlength="15" id="password">
            </div>
            <div class="form-group">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" name="cpassword" class="form-control" required id="cpassword">
                <div id="emailHelp" class="form-text">Please add same password as above.</div>
            </div>
            <button type="submit" class="btn btn-primary my-3">Signup</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>