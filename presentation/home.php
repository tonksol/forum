<?php 
require_once (__DIR__ . "/../include/functions.php");
require_once (__DIR__ . "/../business/newestPostsOverviewDAO.php"); 
require_once (__DIR__ . "/../business/postDAO.php"); 
require_once (__DIR__ . "/../business/forumPageDAO.php"); 
require_once (__DIR__ . "/../presentation/header.php"); 
// echo loginFirst_message();
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
            <!-- about the forum -->
            <?php echo getPage(1) ?>
            <br><br><hr><br><br>
            

            <!-- Latest posts -->
            <h4> Hot discussion </h4>
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

            
            
            

            <!-- rules -->
            <?php
            echo getPage(2);
            echo getRules();
            ?>
        </div> <!-- ./ container -->

    </body>
    <?php require (__DIR__ . "/../presentation/footer.php"); ?>

</html>
