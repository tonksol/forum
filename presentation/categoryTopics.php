<?php
// overview of all categories
require_once (__DIR__ . "/../presentation/header.php");
require_once(__DIR__ . "/../business/categoryDAO.php");
require_once(__DIR__ . "/../business/topicDAO.php");
?>

<br><br>
<div class="container">
    <br><br>
    <a href="/../presentation/newestPostsOverview.php" class="btn btn-primary btn-block btn-xs" role="button">New Discussions</a>
    <br>
    <a href="presentation/categoryOverview.php" class="btn btn-primary btn-block btn-xs" role="button">Category Overview</a>
    <br><br><br>
    
    <!-- 
    <br><br>
    <a href="http://localhost:41062/www/Forum/presentation/topicOverview.php">Go to topic overview</a>
    -->
    <br><br>

   <table class="table table-striped">
        <thead>
            <tr>
                <!-- <th scope="col">Category</th> -->
                <th scope="col">Topic</th>
                <th scope="col">Description</th>
                <th scope="col">number of posts</th>
            </tr>
        </thead>
        <tbody>   
            <?php
                echo getCategoryHead(mysqlPrepare($_GET['categoryID']));
                echo getTopicsAndNumberOfPosts(mysqlPrepare($_GET['categoryID']));
            ?>          
        </tbody>
    </table>
    Number op topics for this category: <?php echo getNumberOfTopicsForCategory(); ?>
    <br><br>

    <!-- Create new post -->
    <?php if (logged_in()) { ?>
    <a href="/../presentation/newPost.php" class="btn btn-primary btn-block btn-xs" role="button">New Discussion</a>
    <?php } ?>
</div> <!-- ./ container -->
<br><br><br>

<?php require (__DIR__ . "/../presentation/footer.php"); ?>