<?php
require_once(__DIR__ . "/../include/functions.php");
require_once(__DIR__ . "/../business/postDAO.php");
require_once(__DIR__ . "/../presentation/header.php");
?>

<br><br>
<div class="container">
    <a href="/../presentation/categoryOverview.php" class="btn btn-primary btn-block btn-xs" role="button">Category Overview</a>
    <br><br><br>
    <h1>New discussions</h1>
    <br><br>


    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Topic</th>
            <th scope="col">Post</th>
            <th scope="col">User</th>
            <th scope="col">Started on </th>
            <th scope="col"> </th>
            <th scope="col">Number of Replies</th>
        </tr>
    </thead>
    <tbody>
        
        <?php 
        echo getNewestPosts(); 
        ?>
        
    </tbody>
    </table>

    <!-- Create new post -->
    <?php if (logged_in()) { ?>
    <a href="/../presentation/newPost.php" class="btn btn-primary btn-block btn-xs" role="button">New Discussion</a>
    <?php } ?>

    <br><br><br>
</div> <!-- ./ container -->
<?php require_once(__DIR__ . "/../presentation/footer.php");