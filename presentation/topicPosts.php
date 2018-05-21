<?php
// see all topics from one category
require_once(__DIR__ . "../../presentation/header.php");
require_once(__DIR__ . "../../business/postDAO.php");
require_once(__DIR__ . "../../business/topicDAO.php");
?>

<br><br>
<div class="container">
    <br><br>
    <a href="/../presentation/topicOverview.php" class="btn btn-primary btn-block btn-xs" role="button">Topic Overview</a>
    <br><br>
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
             echo "number of posts for this topic:    " . getNumberOfPostsByTopic($_GET['topicID']);
            ?>
        <br><br>
    <!-- Create new post -->
    <?php if (logged_in()) { ?>
    <a href="/../presentation/newPost.php" class="btn btn-primary btn-block btn-xs" role="button">New Discussion</a>
    <?php } ?>

</div> <!-- ./ container -->
<br><br><br>


<?php require (__DIR__ . "../../presentation/footer.php"); ?>