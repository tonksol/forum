<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once(__DIR__ . "/../include/functions.php");
require_once(__DIR__ . "/../business/replyDAO.php");
memberArea();

$userID = $_SESSION['user_id'];
$userID = mysqlPrepare($userID);

$replyDAO = new ReplyDAO($connection);
if (isset($_POST['submit'])) {
    $result = $replyDAO->updateReply(mysqlPrepare($_POST['replyID']), mysqlPrepare($_POST['replyContent']));
    redirectTo("postReplies.php?postID=" . $result);
}

if (isset($_GET['replyID'])) {
    $replyID = mysqlPrepare($_GET['replyID']);
    $replyContent = $replyDAO->getReplyContent($replyID);
}

require_once(__DIR__ . "/../presentation/header.php");
?>

<div class="container"> 
    <br><br>
    <h5>Edit a reply</h5>   
    <form action="<?php echo mysqlPrepare($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type="hidden" name='replyID' value="<?php echo mysqlPrepare($replyID); ?>" />
    <div class="form-group">
        <div class="col-sm-10">
            <textarea class="form-control texteditor" name="replyContent" rows="5" id="replyContent"><?php echo mysqlPrepare($replyContent); ?></textarea>  
        </div>
    </div>
    <input class='btn btn-primary btn-block' type='submit' name='submit' value='submit'>
    </form>

</div> <!-- ./ container -->
