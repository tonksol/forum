<?php
// overview of all categories

require_once(__DIR__ . "/../business/ReplyDAO.php");
require_once(__DIR__ . "/../business/postDAO.php");
require_once(__DIR__ . "/../business/topicDAO.php");

$replyDAO = new ReplyDAO($connection);

if (isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];
    $userID = mysqlPrepare($userID);
} else {
  $userID = -1;
}
// INSERT new reply
if (isset($_POST['submit'])) { 
  $replyDAO->newReply($userID, mysqlPrepare($_POST['postID']), mysqlPrepare($_POST['replyContent']));    
}

if (isset($_POST['delete']) && isset($_POST['postID']) && logged_in()) {
  deletePost(trim(mysqli_real_escape_string($connection, $_POST['postID'])));
  redirectTo('home.php');
}

if (isset($_POST['delete']) && isset($_POST['replyID']) && logged_in()) {
  $replyDAO->deleteReply(mysqlPrepare($_POST['replyID']), $userID);
}

require_once(__DIR__ . "/../presentation/header.php");
?>

<br><br>
<div class="container">
    <div class="container"> 
    <br><br> 
    <a href="/../presentation/newestPostsOverview.php" class="btn btn-primary btn-block btn-xs" role="button">New Discussion</a>
    <br><br><br>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <input type="hidden" name="postID" value="<?php echo $_GET['postID']; ?>" />
      <?php 
      // $topicID = $_GET['topicID'];
      echo getSelectedPostsHead(mysqlPrepare($_GET['postID']));
      echo getSelectedPostsContent(mysqlPrepare($_GET['postID'])); // parameter = postID
      ?>
      </form>

      

         <!-- get replies and delete and update button if you are the logged in user -->
          <div class="container">
            <?php $replies = $replyDAO->getreplies(mysqlPrepare($_GET['postID'])); foreach ($replies as $reply) { ?>
            <div class="card" >
              <div class="card-body"> 
                <h5>Posted by: <b> <?php echo mysqlPrepare($reply['userName']) ?></b></h5>
                <p class="card-text"><?php echo mysqlPrepare($reply['date']) ?>&nbsp;&nbsp;&nbsp;<?php mysqlPrepare($reply['time'])?><p>
                <p class="card-text"> </p>
                <p class="card-text"><?php echo mysqlPrepare($reply['content']) ?></p>
                <?php if (mysqlPrepare($reply['userID']) == $userID){?> 
                  <form action="<?php echo mysqlPrepare($_SERVER["PHP_SELF"]);?>?postID=<?PHP echo mysqlPrepare($_GET['postID']); ?>" method="POST">
                    <div class="row">
                      <div class="col-sm-3">
                        <input type="hidden" name="replyID" value="<?php echo mysqlPrepare($reply['replyID']) ?>">
                        <input class='btn btn-primary btn-block btn-xs' type='submit' name='delete' value='delete'>
                      </div>
                      <div class="col-sm-3">

<!--
                         <button onclick="myFunction()">Update</button>
                         <div id="myDIV"> 
                          
                          something
                         </div>
                    

                         <script>
                         
                         //  function myFunction() {
                         //      console.log("kom ik hier?");
                         //      var x = document.getElementById("myDIV");
                         //      if (x.style.display === "none") {
                         //          x.style.display = "block";
                         //      } else {
                         //          x.style.display = "none";
                         //      }
                         //  }
                         //  </script>
                         -->
                        <!-- <input class='btn btn-primary btn-block btn-xs' type='submit' name='update' value='update'> -->
                      </div>
                    </div> 
                  </form>
                <?php } ?>   <!-- ./ if -->
              </div>
            </div>
            <br>
            <?php } ?> <!-- ./ foreach -->
          </div>
          <br>
        
    </div>

    <br><br>
    <!-- form for new reply -->
    <?php if(logged_in()) { ?>
    <form action="<?php echo mysqlPrepare($_SERVER["PHP_SELF"]);?>?postID=<?PHP echo mysqlPrepare($_GET['postID']) ?>" method="POST">
    <div class="form-group">
        <div class="col-sm-10">
        <input type="hidden" name="postID" value="<?php echo mysqlPrepare($_GET['postID']);?>">
        <textarea class="form-control texteditor" name="replyContent" placeholder="Enter your reply..." rows="5" id="comment"></textarea>  
      </div>
    </div>
    <input class='btn btn-primary btn-block' type='submit' name='submit' value='submit'>
    </form>
    <br><br>
    <?php } ?>
        <br><br><br>







</div> <!-- ./ container -->
<br><br><br>


<?php require (__DIR__ . "/../presentation/footer.php"); ?>