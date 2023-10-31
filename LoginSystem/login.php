<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'):
  $login = false;
  $showError = false;
  require "db.php";
  $name = $_POST['username'];
  $pwd = $_POST['password'];

  // $sql = "select * from users where username='$name' and password='$pwd'";
  $sql = "select * from users where username='$name'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
    if($num == 1):
      while($row = mysqli_fetch_assoc($result)):
        if (password_verify($pwd, $row['password'])):
          $login = true;
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['username'] = $name;
          header("location:/Training/PHP/17-10-23/LoginSystem/welcome.php");
        else:
          $showError = "Invalid Credentials";
        endif;    
      endwhile;
    endif;  
endif;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php require "nav.php";
      if($login):
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You are logged in.
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
      <h1 class="text-center">Login to our Website</h1>
      <form action="/Training/PHP/17-10-23/LoginSystem/login.php" method="post">
        <div class="form-group">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" class="form-control" id="username" required aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="password" class="form-label">Password</label>
          <input type="password" required name="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary my-3">Login</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>