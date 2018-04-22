<?php
// overview of all categories
require_once(__DIR__ . "/../business/postRepliesDAO.php");
require_once (__DIR__ . "/../presentation/header.php");
?>

<br><br>
<div class="container">
        <div class="container">  
            <a href="presentation/newestPostsOverview.php">Go back to newest discussion</a>
            <br><br><br>
            
            <?php 
            echo getSelectedPostsHead($_GET['postID']);
            echo getSelectedPostsContent($_GET['postID']); // parameter = postID
            echo getReplies($_GET['postID']);
            ?>
        </div>
</div> <!-- ./ container -->
<br><br><br>


<?php require (__DIR__ . "/../presentation/footer.php"); ?>