<?php
// overview of all categories
require_once (__DIR__ . "/../presentation/header.php");
require_once(__DIR__ . "/../business/topicDAO.php");
?>

<br><br>
<div class="container">
    <h1> Topic overview</h1>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Topic</th>
            <th scope="col">Description</th>
            <th scope="col">number of posts</th>
            <th scope="col">Category</th>
            </tr>
        </thead>

        <tbody>
            <?php echo getTopicsForOverview(); ?>
        </tbody>
    </table>

    <!-- Create new post -->
    <?php if (logged_in()) { ?>
    <a href="/../presentation/newPost.php" class="btn btn-primary btn-block btn-xs" role="button">New Discussion</a>
    <?php } ?>
    
</div> <!-- ./ container -->
<br><br><br>


<?php require (__DIR__ . "/../presentation/footer.php"); ?>