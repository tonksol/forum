<?php
// overview of all categories

require_once(__DIR__ . "/../business/ReplyDAO.php");
require_once(__DIR__ . "/../business/postDAO.php");
require_once(__DIR__ . "/../business/topicDAO.php");
require_once(__DIR__ . "/../presentation/header.php");

$replyDAO = new ReplyDAO($connection);

if (isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];
} else {
  $userID = -1;
}
// INSERT new reply
if (isset($_POST['submit'])) { 
  $replyDAO->newReply($userID, $_POST['postID'], $_POST['replyContent']);    
}

if (isset($_POST['delete']) && isset($_POST['replyID'])) {
  $replyDAO->deleteReply($_POST['replyID'], $userID);
}

?>

<br><br>
<div class="container">
    <div class="container">  
      <a href="presentation/newestPostsOverview.php">Go back to newest discussion</a>
      <br><br><br>
      
      <?php 
      // $topicID = $_GET['topicID'];
      echo getSelectedPostsHead($_GET['postID']);
      echo getSelectedPostsContent($_GET['postID']); // parameter = postID
      ?>

         <!-- get replies and delete and update button if you are the logged in user -->
          <div class="container">
            <?php $replies = $replyDAO->getreplies($_GET['postID']); foreach ($replies as $reply) { ?>
            <div class="card" >
              <div class="card-body"> 
                <h5>Posted by: <b> <?php echo $reply['userName'] ?></b></h5>
                <p class="card-text"><?php echo $reply['date'] ?>&nbsp;&nbsp;&nbsp;<?php $reply['time']?><p>
                <p class="card-text"> </p>
                <p class="card-text"><?php echo $reply['content'] ?></p>
                <?php if ($reply['userID'] == $userID){?> 
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?postID=<?PHP echo $_GET['postID'] ?>" method="POST">
                    <div class="row">
                      <div class="col-sm-3">
                        <input type="hidden" name="replyID" value="<?php echo $reply['replyID'] ?>">
                        <input class='btn btn-primary btn-block btn-xs' type='submit' name='delete' value='delete'>
                      </div>
                      <div class="col-sm-3">
                        <input class='btn btn-primary btn-block btn-xs' type='submit' name='update' value='update'>
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?postID=<?PHP echo $_GET['postID'] ?>" method="POST">
    <div class="form-group">
        <div class="col-sm-10">
        <input type="hidden" name="postID" value="<?php echo $_GET['postID'];?>">
        <textarea class="form-control texteditor" name="replyContent" placeholder="Enter your reply..." rows="5" id="comment"></textarea>  
      </div>
    </div>
    <input class='btn btn-primary btn-block' type='submit' name='submit' value='submit'>
    </form>
    <br><br>

        <br><br><br>

        	<div id="alerts"></div>
    <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
      <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
          </ul>
        </div>
      <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
          <ul class="dropdown-menu">
          <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
          <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
          <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
          </ul>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
        <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
        <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
        <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="icon-list-ul"></i></a>
        <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="icon-list-ol"></i></a>
        <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a>
        <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="icon-indent-right"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
        <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
        <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
        <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
      </div>
      <div class="btn-group">
		  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a>
		    <div class="dropdown-menu input-append">
			    <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
			    <button class="btn" type="button">Add</button>
        </div>
        <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a>
      </div>
      
      <div class="btn-group">
        <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
        <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
        <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
      </div>
      <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
    </div>
        
        <form>
            <div id="editor">
        </div>
        </form>

     <script>  console.log($('#editor').wysiwyg()); </script>






</div> <!-- ./ container -->
<br><br><br>


<?php require (__DIR__ . "/../presentation/footer.php"); ?>