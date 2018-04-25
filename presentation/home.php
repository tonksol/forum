<?php 
require_once (__DIR__ . "/../include/functions.php");
require_once (__DIR__ . "/../business/newestPostsOverviewDAO.php"); 
require_once (__DIR__ . "/../business/forumPageDAO.php"); 
require_once (__DIR__ . "/../presentation/header.php"); 
// echo loginFirst_message();
?>


<html>
    <body id="home">      
            <?php 
            echo login_succes_message();
            echo logout_succes_message();
            ?>


        <div class="container">
            <br><br>
            <h3>Home</h3>
            <p>This is a placeholder text</p>
            <br><br>

            <!-- Latest posts -->
            <h4> latest posts </h4>
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
            <?php echo getNewestPosts(); ?>
            </tbody>
            </table>
            <br><br><hr><br><br>

            <!-- about the forum -->
            <?php echo getPage(1) ?>
            
            <br><br><hr><br><br>

            <!-- rules -->
            <?php
            echo getPage ("Rules and regulations");
            echo getRules();
            ?>
        </div> <!-- ./ container -->

    </body>
    <?php require (__DIR__ . "/../presentation/footer.php"); ?>

</html>
