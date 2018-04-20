
<?php
require_once ("header.php"); 
require_once ("../business/adminDAO.php"); 
require_once ("adminNavigation.php");
?>

<div class="container">
<h1>Choose a page you want to manage?</h1>

    <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown button
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php echo getPages() ?>
    </div>
    </div>

<br><br><br>
   <?php foreach ($forumPageInfos as $f) { ?>
  <form>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo $f['name']; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword3" placeholder="Password" value="<?php echo $f['content']; ?>">
      </div>
    </div>

   <?php } ?>
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
  </form>
-->




</div> <!-- ./ container-->

