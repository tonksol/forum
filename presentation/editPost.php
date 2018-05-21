<?php
require_once(__DIR__ . "../../include/functions.php");
require_once(__DIR__ . "../../business/postDAO.php");
memberArea();

$userID = $_SESSION['user_id'];
$userID = mysqlPrepare($userID);

if (isset($_POST['submit'])) {
    $result = updatePost(mysqlPrepare($_POST['postID']), mysqlPrepare($_POST['postName']), mysqlPrepare($_POST['postContent']));
    redirectTo("postReplies.php?postID=" . $result);
}

if (isset($_GET["postID"])) {
    $postID = mysqlPrepare($_GET["postID"]);
    $postDetails = getPostDetails($postID);
}

require_once(__DIR__ . "../../presentation/header.php");
?>

<div class="container"> 
    <br><br>
    <h5>Edit a discussion</h5>   
    <form action="<?php echo mysqlPrepare($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type="hidden" name='postID' value="<?php echo mysqlPrepare($postID); ?>" />
    <div class="form-group">
        <div class="col-sm-10">
            <textarea class="form-control postName" name="postName" id="postName"><?php echo mysqlPrepare($postDetails["postName"]); ?></textarea>
        </div>
        <div class="col-sm-10">
            <textarea class="form-control texteditor" name="postContent" rows="5" id="postContent"><?php echo mysqlPrepare($postDetails["postContent"]); ?></textarea>  
        </div>
    </div>
    <input class='btn btn-primary btn-block' type='submit' name='submit' value='submit'>
    </form>
    <?php require (__DIR__ . "../../presentation/footer.php"); ?>
</div> <!-- ./ container -->
