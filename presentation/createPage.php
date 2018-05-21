
<?php
require_once (__DIR__ . "../../include/functions.php");  
require_once (__DIR__ . "../../business/forumPageDAO.php"); 

if (isset($_POST['submit']) && !isset($_GET['forumPageID'])) {
    // senatise met trim en htmlspecialchars.. parameters
    insertNewPage(mysqlPrepare($_SESSION['user_id']), mysqlPrepare($_POST["pagename"]), mysqlPrepare($_POST["content"]), mysqlPrepare(date("Y-m-d"))); 
    redirectTo("../../presentation/pageManager.php");
}

require_once (__DIR__ . "../../presentation/header.php"); 
// require_once (__DIR__ . "/../presentation/adminNavigation.php");
?>

<div class="container">
    <div class="main">
        <br><br>
        <h1>Make a new page</h1>

        <br><br><br>
        
        <form action="<?php echo mysqlPrepare($_SERVER['PHP_SELF']) ?>" method="POST">
            <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Page title" name="pagename">
            </div>
            </div>
            <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Contenct of the page" name="content">
            </div>
            </div>  
            <br><br>
            <div align="right"><input class="btn btn-primary" type="submit" name="submit" value="Submit"></div>
        </form>
    </div> <!-- ./ main -->
</div> <!-- ./ container-->
<?php require (__DIR__ . "../../presentation/footer.php"); ?>