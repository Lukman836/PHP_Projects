<?php
session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true):
        $loggedin=true;
    else:
        $loggedin=false;
    endif;
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/Training/PHP/17-10-23/ForumProject/">A TO Z Bags Solutions</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Training/PHP/17-10-23/ForumProject/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Training/PHP/17-10-23/ForumProject/about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Category's</a>
                    <ul class="dropdown-menu">
                        <?php
                            $sql = "SELECT category_name, category_id FROM `categories` LIMIT 3";
                            $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)): 
                        ?>
                            <li><a class="dropdown-item" href="threads_list.php?catid=<?= $row['category_id'];?>"><?= $row['category_name']?></a></li>
                        <?php  endwhile; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/../Training/PHP/17-10-23/Custom_form.php">Contact Us</a>
                </li>
            </ul>
            <?php if($loggedin): ?>
                <form class="d-flex py-0 form-inline my-lg-0" method="get" action="/Training/PHP/17-10-23/ForumProject/search.php" role="search">
                    <input class="form-control me-1" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                    <p class="text-light my-0 mt-0 mx-2 py-0">Welcome <?= $_SESSION['email'];?> </p>
                    <a href="/Training/PHP/17-10-23/ForumProject/logout.php" class="btn btn-outline-success pt-2 ml-1.5">Logout</a>
                </form>
            <?php endif; ?>
            <?php if(!$loggedin):?>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" name="search" type="search" method="get" action="/Training/PHP/17-10-23/ForumProject/search.php" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
                <div class="mx-2">
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>
                </div>
            <?php endif?>
        </div>
    </div>
</nav>
<?php
include "signupmodal.php";
include "loginmodal.php";
    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == true):
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your Account is now created and you can login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    endif;
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == true):
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    endif;