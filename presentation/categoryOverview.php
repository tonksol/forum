<?php
// overview of all categories
require_once ("header.php");
require_once("../business/categoryOverview.php");
?>

<br><br>
<div class="container">
    <h1> Category overview</h1>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Category</th>
            <th scope="col-3">Description</th>
            <th scope="col">number of topics</th>
            </tr>
        </thead>

        <tbody>
            <?php echo getTopics(); ?>
        </tbody>
    </table>
</div> <!-- ./ container -->
<br><br><br>


<?php require ("footer.php"); ?>