<?php
session_start();

session_unset();
session_destroy();

header("location: /Training/PHP/17-10-23/LoginSystem/login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Page</title>
</head>
<body>
    
</body>
</html>