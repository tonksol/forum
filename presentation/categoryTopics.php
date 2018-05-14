<?php
// overview of all categories
require_once (__DIR__ . "/../presentation/header.php");
require_once(__DIR__ . "/../business/categoryDAO.php");
require_once(__DIR__ . "/../business/topicDAO.php");
?>

<br><br>
<div class="container">
    <br><br>
    <a href="presentation/categoryOverview.php">Go to category overview</a>
    <!-- 
    <br><br>
    <a href="http://localhost:41062/www/Forum/presentation/topicOverview.php">Go to topic overview</a>
    -->
    <br><br>
    <a href="presentation/newestPostsOverview.php">Go to the newest discussions</a>
   <br><br><br>
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
                echo getCategoryHead($_GET['categoryID']);
                echo getTopicsAndNumberOfPosts($_GET['categoryID']);
            ?>          
        </tbody>
    </table>
    Number op topics for this category: <?php echo getNumberOfTopicsForCategory(); ?>
</div> <!-- ./ container -->
<br><br><br>

<?php require (__DIR__ . "/../presentation/footer.php"); ?>