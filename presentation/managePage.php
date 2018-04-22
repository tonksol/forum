
<?php
require_once ("../include/functions.php"); 
require_once ("../business/adminDAO.php"); 
require_once ("header.php"); 
require_once ("adminNavigation.php");
?>

<div class="container">
  <div class="main">

    <br><br><br>
    <h1><?php echo $row['forumPageName'] ?> page</h1>
    <br><br><br>
    <form action="<?php echo $_SERVER['PHP_SELF'] . $querystring;?>" method="POST">
      
        <div class="form-group row">
          <label for="pagename" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="pagename" placeholder="page title" name="pagename" value="<?php echo $row['forumPageName']; ?>"<?php echo editable_form(); ?>>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword3" placeholder="Password" name="content" value="<?php echo $row['forumPageContent']; ?>"<?php echo editable_form(); ?>>
          </div>
        </div>
        <?php echo edit_submit_button_switch();?> 
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

