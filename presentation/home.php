<?php 
require_once (__DIR__ . "/../include/functions.php");
 // echo loginFirst_message();
require_once ("header.php"); 
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

        </div> <!-- ./ container -->

    </body>
    <?php require ("footer.php"); ?>

</html>
