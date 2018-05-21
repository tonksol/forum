<?php
// overview of all categories
require_once(__DIR__ . "../../business/categoryDAO.php");
require_once (__DIR__ . "../../presentation/header.php");
?>

<br><br>
<div class="container">
    <a href="/../presentation/newestPostsOverview.php" class="btn btn-primary btn-block btn-xs" role="button">New Discussions</a>
    <br><br><br>
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
            <?php echo getCategoriesForOverview(); ?>
        </tbody>
    </table>

    <!-- Create new post -->
    <?php if (logged_in()) { ?>
    <a href="../../presentation/newPost.php" class="btn btn-primary btn-block btn-xs" role="button">New discussion</a>
    <?php } ?>
</div> <!-- ./ container -->
<br><br><br>


<?php require (__DIR__ . "../../presentation/footer.php"); ?>