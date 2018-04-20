<?php 
require_once (__DIR__ . "/../include/functions.php");
 // echo loginFirst_message();
require_once ("header.php"); 
require_once ("../business/newestPostsOverviewDAO.php"); 
require_once ("../business/forumPageDAO.php"); 
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
            <br><br><br>

            <!-- about the forum -->
            <?php echo getPage ("About") ?>
        </div> <!-- ./ container -->

    </body>
    <?php require ("footer.php"); ?>

</html>
