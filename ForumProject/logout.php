<?php
session_start();
echo "Logging you out. Please wait...";

session_destroy();

header("location: /Training/PHP/17-10-23/ForumProject/");
