<?php
// overview of all categories
require_once ("header.php");
require_once("../business/categoryOverview.php");
?>

<br><br>
<div class="container">

    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Category</th>
        <th scope="col">Description</th>
        <th scope="col">number of posts</th>
        </tr>
    </thead>
    <tbody>
        
        <?php 
        echo getCategories(); 
        ?>
        
</tbody>
    </table>

</div> <!-- ./ container -->
<br><br><br>


<?php require ("footer.php"); ?>