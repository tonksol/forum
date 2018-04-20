<?php
// overview of all categories
require_once ("header.php");
require_once("../business/topicOverviewDAO.php");
?>

<br><br>
<div class="container">
    <h1> Topic overview</h1>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Topic</th>
            <th scope="col">Description</th>
            <th scope="col">number of posts</th>
            <th scope="col">Category</th>
            </tr>
        </thead>

        <tbody>
            <?php echo getTopicsForOverview(); ?>
        </tbody>
    </table>
</div> <!-- ./ container -->
<br><br><br>


<?php require ("footer.php"); ?>