
<?php
require_once (__DIR__ . "/../include/functions.php");  
require_once (__DIR__ . "/../business/forumPageDAO.php"); 
memberArea();
require_once (__DIR__ . "/../presentation/header.php"); 
require_once (__DIR__ . "/../presentation/adminNavigation.php");
?>

<div class="container">
  <div class="main">
  <br><br><br>
  <h1>Choose a page you want to manage?</h1>
  <br><br><br>

   <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Content</th>
            <th scope="col">Created by</th>
        </tr>
    </thead>
    <tbody>
        <?php echo getPagesForOverview(); ?>     
    </tbody>
    </table>
    
    <br>
    <h4>Or add a new page</h4>
    <a class="btn btn-primary" href="presentation/createPage.php" role="button" name="addNewPage">Add new page</a>


</div> <!-- ./ main-->
</div> <!-- ./ container-->

