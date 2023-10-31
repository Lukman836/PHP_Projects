<?php 
    session_start();
    require "db.php"; 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A TO Z Bags Solutions</title>
    <style>
        #ques {
            min-height: 433px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</head>
<body>
    <?php include "header.php"; ?>
    <?php 
        $id = $_GET['catid'] ;
        $sql = "SELECT * FROM `categories` WHERE category_id='$id'";
        $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)):
                $Catname=$row['category_name'];
                $Catdesc=$row['category_desc'];
            endwhile;
        
        $showAlert = false;
            if ($_SERVER['REQUEST_METHOD'] == 'POST'):
                $title = $_POST['title'];
                $desc = $_POST['desc'];
                $sno = $_POST['sno']; 
                $title = str_replace("<", "&lt;", $title);
                $title = str_replace(">", "&gt;", $title); 
                $desc = str_replace("<", "&lt;", $desc);
                $desc = str_replace(">", "&gt;", $desc);

                $sql = "INSERT INTO `Treads` (`threads_title`, `threads_desc`, `threads_cat_id` , `threads_user_id`, `timestamp`) VALUES ('$title', '$desc', '$id','$sno', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                $showAlert = true;
                    if($showAlert):
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Your thread has been added! Please wait for community to respond
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    endif;
            endif;
    ?>
    
    <!-- Category container starts here -->
        <div class="container my-3">
            <div class="jumbotron">
                <h1 class="display-4">Welcome To <?= $Catname; ?> Forums</h1>
                <p class="lead"><?= $Catdesc; ?></p>
                <hr class="my-4">
                <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not
                    post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                    questions. Remain respectful of other members at all times.</p>
                <a href="#" class="btn btn-success btn-lg">Learn more</a>
            </div>
        </div>
    <!-- Category container end here -->

    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true):?>
        <div class="container">
            <h1 class="py-2">Start a Discussion</h1>
            <form action="<?php $_SERVER["REQUEST_URI"]; ?>" method="post">
                <div class="form-group">
                    <label for="exampleInputText">Problem Title</label>
                    <input type="text" class="form-control" id="title" name="title" required aria-describedby="textHelp">
                    <small id="textHelp" class="form-text text-muted">Keep your title as short and crisp as possible</small>
                </div>
                <input type="hidden" name="sno" value="<?= $_SESSION["sno"];?>">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Elaborate your Issue !</label>
                    <textarea class="form-control" id="desc" required name="desc" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success my-2">Submit</button>
            </form>
        </div>
    <?php else:?>
        <div class="container">
            <h1 class="py-2">Post a Comment</h1>
            <p class="lead">You are not logged in. Please login to be able to post comments.</p>
        </div>
    <?php endif;?>

    <div class="container mb-5" id="ques">
        <h2 class="py-2">Browse Questions</h2>
        <?php 
            $sql = "SELECT * FROM `Treads` WHERE threads_cat_id='$id'";
            $result = mysqli_query($conn, $sql);
            $noData = true;
                while($row = mysqli_fetch_assoc($result)): 
                    $noData = false;
                    $thread_user_id = $row['threads_user_id']; 
                    $sql2 = "SELECT email FROM `Forum_user` WHERE sno='$thread_user_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
        ?>
            <div class="d-flex align-items-center my-3">
                <div class="flex-shrink-0">
                    <img src="https://source.unsplash.com/50x45/?user" alt="...">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="mt-0"><a class="text-dark"
                            href="/Training/PHP/17-10-23/ForumProject/thread.php?tid=<?= $row['threads_id']; ?>"><?= $row['threads_title']; ?></a>
                    </h5>
                    <?= $row['threads_desc']; ?>
                </div>
                <div class="font-weight-bold my-0"> Asked by: <?= $row2['email'];?> at <?= $row['timestamp'];?></div>
            </div>
        <?php endwhile;
        if($noData):?>
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <p class="display-5">No Thread Found</p>
                    <p class="lead"> Be the first person to comment</p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php include "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>