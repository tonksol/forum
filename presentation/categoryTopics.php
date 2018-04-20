<?php
// overview of all categories
require_once ("header.php");
require_once("../business/categoryTopicsDAO.php");
?>

<br><br>
<div class="container">
    <br><br>
    <a href="http://localhost:41062/www/Forum/presentation/categoryOverview.php">Go to category overview</a>
    <!-- 
    <br><br>
    <a href="http://localhost:41062/www/Forum/presentation/topicOverview.php">Go to topic overview</a>
    -->
    <br><br>
    <a href="http://localhost:41062/www/Forum/presentation/newestPostsOverview.php">Go to the newest discussions</a>
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
            <?php  echo getCategoryHead($_GET['categoryID']); echo getPostsOverviewFromTopic($_GET['categoryID']);  ?>          
        </tbody>
    </table>
    Number op topics for this category: <?php echo getNumberOfTopicsForCategory(); ?>
</div> <!-- ./ container -->
<br><br><br>

<?php require ("footer.php"); ?>