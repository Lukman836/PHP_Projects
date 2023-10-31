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
        $id = $_GET['tid'] ;
        $sql = "SELECT * FROM `Treads` WHERE threads_id='$id'";
        $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)):
                $title = $row['threads_title'];
                $desc = $row['threads_desc'];
                $threads_user_id = $row['threads_user_id'];
                $sql2 = "SELECT email FROM `Forum_user` WHERE sno='$threads_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
            endwhile;

        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
            if($method=='POST'):
                $comment = $_POST['comment']; 
                $comment = str_replace("<", "&lt;", $comment);
                $comment = str_replace(">", "&gt;", $comment); 
                $sno = $_POST['sno']; 
                $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                $showAlert = true;
                    if($showAlert):
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Your comment has been added!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    endif;
            endif;
    ?>

    <!-- Category container start here -->
        <div class="container my-3">
            <div class="jumbotron">
                <h1 class="display-4"><?= $title; ?></h1>
                <p class="lead"><?= $desc; ?></p>
                <hr class="my-4">
                <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not
                    post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                    questions. Remain respectful of other members at all times.</p>
                    <p>Posted by :- <em><b><?= $row2['email']; ?></b></em></p>
            </div>
        </div>
    <!-- Category container end here -->

    <div class="container mb-5" id="ques">
        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true):?>
            <h1 class="py-2">Post a Comment</h1> 
            <form action="<?= $_SERVER["REQUEST_URI"]; ?>" method="post">
                <input type="hidden" name="sno" value="<?= $_SESSION["sno"];?>">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Type your comment!!</label>
                    <textarea class="form-control" id="comment" required name="comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success my-2">Post comment</button>
            </form>
        <?php else:?>
            <div class="container">
                <h1 class="py-2">Post a Comment</h1>
                <p class="lead">You are not logged in. Please login to be able to post comments.</p>
            </div>
        <?php endif; ?>

        <h2 class="py-2">Discussion</h2>
        <?php 
            $sql = "SELECT * FROM `comments` WHERE thread_id='$id'";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
                while($row = mysqli_fetch_assoc($result)): 
                    $noResult = false;
                    $thread_user_id = $row['comment_by']; 
                    $sql2 = "SELECT email FROM `Forum_user` WHERE sno='$thread_user_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
        ?>
            <div class="d-flex align-items-center my-3">
                <div class="flex-shrink-0">
                    <img src="https://source.unsplash.com/50x45/?user" alt="...">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="mt-0">
                        <?= $row['comment_content'];?>
                    </h5>
                </div>
                <div class="font-weight-bold my-0">
                    Posted by :- <em><b><?= $row2['email'];?></b> at <?= $row['comment_time']; ?></em>
                </div>
            </div>
        <?php endwhile; if($noResult): ?>
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <p class="display-5">No comments Found</p>
                    <p class="lead"> Be the first person to comment</p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php include "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>