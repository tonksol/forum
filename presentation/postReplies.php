<?php
// overview of all categories
require_once ("header.php");
require_once("../business/postRepliesOverview.php");
?>

<br><br>
<div class="container">
        <div class="container">  
            <?php 
            echo getSelectedPostsHead($_GET['postID']);
            echo getSelectedPostsContent($_GET['postID']); // parameter = postID
            echo getReplies($_GET['postID']);
            ?>
        </div>
</div> <!-- ./ container -->
<br><br><br>


<?php require ("footer.php"); ?>