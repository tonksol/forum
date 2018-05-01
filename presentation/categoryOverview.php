<?php
// overview of all categories
require_once(__DIR__ . "/../business/categoryDAO.php");
require_once (__DIR__ . "/../presentation/header.php");
?>

<br><br>
<div class="container">
    <h1> Category overview</h1>
    <br><br>
    <a href="presentation/newestPostsOverview.php">Go to the newest discussions</a>
   <br><br><br>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Category</th>
            <th scope="col-3">Description</th>
            <th scope="col">number of topics</th>
            </tr>
        </thead>

        <tbody>
            <?php echo getCategoriesForOverview(); ?>
        </tbody>
    </table>
</div> <!-- ./ container -->
<br><br><br>


<?php require (__DIR__ . "/../presentation/footer.php"); ?>