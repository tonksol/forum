<?php
// see all topics from one category
require_once ("header.php");
require_once("../business/topicPostsDAO.php");
?>

<br><br>
<div class="container">
    <br><br>
    <a href="http://localhost:41062/www/Forum/presentation/topicOverview.php">Go to all topics (overview)</a>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Posts</th>
            <th scope="col-3">Posted By</th>
            <th scope="col">On</th>
            <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            <?php
            echo getSelectedTopicHead($_GET['topicID']); 
            echo getPosts($_GET['topicID']);
            ?>
        </tbody>
        </table>

           <?php
             echo "number of posts for this topic:    " . getNumberOfPostsByTopic();
            ?>
        
    
</div> <!-- ./ container -->
<br><br><br>


<?php require ("footer.php"); ?>