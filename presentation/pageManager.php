
<?php
require_once ("header.php"); 
require_once ("../business/adminDAO.php"); 
require_once ("adminNavigation.php");
?>

<div class="container">
<h1>Choose a page you want to manage?<h1>

    <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown button
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php echo getPages() ?>
    </div>
    </div>

</div> <!-- ./ container-->

