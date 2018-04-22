<?php
// overview of all categories
require_once ("header.php");
require_once("../business/categoryOverviewDAO.php");
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
            <?php echo getTopicsForOverview(); ?>
        </tbody>
    </table>
</div> <!-- ./ container -->
<br><br><br>


<?php require ("footer.php"); ?>