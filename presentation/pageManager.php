
<?php
require_once ("../include/functions.php"); 
require_once ("../business/adminDAO.php"); 
member_area();
require_once ("header.php"); 
require_once ("adminNavigation.php");
?>

<div class="container">
  <div class="main">
  <br><br><br>
  <h1>Choose a page you want to manage?</h1>
  <?php $forumPageInfos = getPages(); 
        foreach ($forumPageInfos as $p) { ?>
  <br><br><br>
  <a class="btn btn-primary" href="presentation/managePage.php?forumPageID=<?php echo $p['id']?>" role="button"><?php echo $p['name'] ?></a>
  <?php } ?>
  <br><br><br>
  <h4>Or add a new page</h4>
  <a class="btn btn-primary" href="presentation/createPage.php" role="button" name="addNewPage">Add new page</a>


</div> <!-- ./ main-->
</div> <!-- ./ container-->

