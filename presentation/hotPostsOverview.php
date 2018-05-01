<?php
require_once(__DIR__ . "/../business/postDAO.php");
require_once(__DIR__ . "/../presentation/header.php");
?>

<br><br>
<div class="container">
    <h1>Newest discussions</h1>
    <br><br>
    <a href="presentation/newestPostsOverview.php">Newest Discussions</a>
    <br><br>

    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Topic</th>
            <th scope="col">Post</th>
            <th scope="col">User</th>
            <th scope="col">Started on </th>
            <th scope="col">Number of Replies</th>
        </tr>
    </thead>
    <tbody>
        
        <?php 
        echo getHotPosts();
        ?>
        
    </tbody>
    </table>
    <br><br><br>

</div> <!-- ./ container -->
<?php require_once(__DIR__ . "/../presentation/footer.php");