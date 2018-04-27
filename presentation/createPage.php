
<?php
require_once (__DIR__ . "/../include/functions.php");  
require_once (__DIR__ . "/../business/pagesDAO.php"); 

if (isset($_POST['submit']) && !isset($_GET['forumPageID'])) {
    // senatise met trim en htmlspecialchars.. parameters
    insertNewPage($_SESSION['user_id'], $_POST["pagename"], $_POST["content"], date("Y-m-d")); 
    redirect_to("/../presentation/pageManager.php");
}

require_once (__DIR__ . "/../presentation/header.php"); 
require_once (__DIR__ . "/../presentation/adminNavigation.php");
?>

<div class="container">
    <div class="main">

        <h1>Make a new page</h1>

        <br><br><br>
        
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="POST">
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