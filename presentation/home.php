<?php 
require_once (__DIR__ . "/../include/functions.php");
require_once (__DIR__ . "/../business/postDAO.php"); 
require_once (__DIR__ . "/../business/forumPageDAO.php"); 
require_once (__DIR__ . "/../presentation/header.php"); 
// echo loginFirst_message();
if (isset($_POST['newpost'])) {
    redirectTo("/../presentation/newPost.php");
}
?>


<html>
    <body id="home">      
            <?php 
            echo loginSuccesMessage();
            echo logoutSuccesMessage();
            ?>


        <div class="container">
            <br><br>
            <h3>Welcome to the boardgame forum</h3>
            <br><br>
            
            
            

            <!-- hot posts -->
            <h4> Hot Discussions </h4>
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
            <?php echo getHotPosts(); ?>
            </tbody>
            </table>
            <br><br><hr><br><br>

            <!-- creat new post -->
            <h4> Create New Post </h4>
            <?php if (logged_in()) { ?>
            <a href="/../presentation/newPost.php" class="btn btn-primary btn-block btn-xs" role="button">New Discussion</a>
            <?php } ?>
            <br><br><hr><br><br>
            
            <!-- Latest post -->
            <h4> Latest Discussions </h4>
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
            <br><br><hr><br><br>
            
            <!-- about the forum -->
            <?php echo getPage(1); ?>
            <br><br><hr><br><br>


        </div> <!-- ./ container -->

    </body>
    <?php require (__DIR__ . "/../presentation/footer.php"); ?>

</html>
