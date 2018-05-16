
<?php
require_once (__DIR__ . "/../include/functions.php"); 
require_once (__DIR__ . "/../business/forumPageDAO.php"); 
require_once (__DIR__ . "/../business/userDAO.php"); 
memberArea();

// insert new page
if (isset($_POST['submit']) && isset($_GET['forumPageID'])) {
  updatePageInfo($_SESSION['user_id'], $_POST["pagename"], $_POST["content"], date("Y-m-d"), $_GET['forumPageID']); 
  redirectTo("/../presentation/pageManager.php");
}

// Pass the forumPageID on to the form action on managePage.php to update an exsisting page.
$querystring = "";
if (isset($_GET['forumPageID'])){
    $row = getPageInfo($_GET['forumPageID']);
    $querystring = "?forumPageID=". mysqlPrepare($row['forumPageID']);
}

// delete a page
if (isset($_POST['delete'])) {
  deletePage($_GET['forumPageID']);
  redirectTo("/../presentation/pageManager.php");
}

require_once (__DIR__ . "/../presentation/header.php"); 
require_once (__DIR__ . "/../presentation/adminNavigation.php");
?>

<div class="container">
  <div class="main">
    <br><br><br>
    <h1><?php echo mysqlPrepare($row['forumPageName']) ?> page</h1>
    <br><br><br>
    <form action="<?php echo mysqlPrepare($_SERVER['PHP_SELF'] . $querystring);?>" method="POST">
      
        <div class="form-group row">
          <label for="pagename" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="pagename" placeholder="page title" name="pagename" value="<?php echo mysqlPrepare($row['forumPageName']); ?>"<?php echo editableForm(); ?>>
          </div>
        </div>
        <div class="form-group row">
          <label for="content" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="content"  name="content" value="<?php echo mysqlPrepare($row['forumPageContent']); ?>"<?php echo editableForm(); ?>>
          </div>
        </div>
        <?php echo editSubmitButtonSwitch();?> 
        <input class='btn btn-primary btn-block' type='submit' name='delete' value='delete page'>
      </form>




          <!-- STICKY POST
          <div class="form-group row">
            <label class="col-sm-2">Checkbox</label>
            <div class="col-sm-10">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox"> Sticky post
                </label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
          </div>
        -->
         
        


  </div> <!-- ./ main-->

</div> <!-- ./ container-->

