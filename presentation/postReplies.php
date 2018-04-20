<?php
// overview of all categories
require_once ("header.php");
require_once("../business/postRepliesDAO.php");
?>

<br><br>
<div class="container">
        <div class="container">  
            <a href="http://localhost:41062/www/Forum/presentation/newestPostsOverview.php">Go back to newest discussion</a>
            <br><br><br>
            
            <?php 
            echo getSelectedPostsHead($_GET['postID']);
            echo getSelectedPostsContent($_GET['postID']); // parameter = postID
            echo getReplies($_GET['postID']);
            ?>
        </div>
</div> <!-- ./ container -->
<br><br><br>


<?php require ("footer.php"); ?>