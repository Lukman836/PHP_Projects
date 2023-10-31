<?php require "db.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A TO Z Bags Solutions</title>
    <style>
        #maincontainer {
            min-height: 100vh;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</head>
<body>
    <?php include "header.php"; ?>
    
    <!-- Search Results -->
    <div class="container my-3" id="maincontainer">
        <h1 class="py-3">Search results for <em>"<?= $_GET['search'];?>"</em></h1>
        <?php
            $noresults = true;
            $query = $_GET["search"];
            $sql = "select * from Treads where match (threads_title, threads_desc) against ('$query')"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)):
                $title = $row['threads_title'];
                $desc = $row['threads_desc']; 
                $thread_id= $row['threads_id'];
                $url = "/Training/PHP/17-10-23/ForumProject/thread.php?tid=". $thread_id;
                $noresults = false;
        ?>

        <!-- Display the search result -->
            <div class="result">
                <h3><a href="<?= $url;?>" class="text-dark"><?= $title;?></a> </h3>
                <p><?= $desc; ?></p>
            </div>
        <?php endwhile;?>
        <!-- Display the search result end here -->

        <!-- If No Any search result found Start -->
            <?php if ($noresults):?>
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Results Found</p>
                        <p class="lead"> Suggestions: <ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords. </li></ul>
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        <!-- If No Any search result found End -->
    </div>

    <?php include "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>

