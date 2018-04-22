<?php
require_once("header.php");
require_once("../include/functions.php");
require_once("../business/newestPostsOverviewDAO.php");
?>

<br><br>
<div class="container">
    <h1>Newest discussions</h1>
    <br><br>
    <a href="presentation/categoryOverview.php">Go to category overview</a>
    <br><br>

    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Topic</th>
            <th scope="col">Post</th>
            <th scope="col">User</th>
            <th scope="col">Started on </th>
            <th scope="col"> </th>
            <th scope="col">Number of Replies</th>
        </tr>
    </thead>
    <tbody>
        
        <?php 
        echo getNewestPosts(); 
        ?>
        
    </tbody>
    </table>
    <br><br><br>

</div> <!-- ./ container -->
<?php require_once("footer.php");