<?php
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "dbLukman";

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn):
        die("Sorry we failed to connect: ". mysqli_connect_error());
    endif;
