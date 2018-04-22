<?php 
require_once (__DIR__ . "/../include/functions.php");
 // echo loginFirst_message();
require_once (__DIR__ . "/../presentation/header.php"); 
?>


<html>
    <body id="logout">  


        <div class="container">
            <br><br>
            <h3>No Permission</h3>
                <p>You are here becuase you don't have permission. 
                You need to <a href="#" data-toggle="modal" data-target="#loginModal">Log in</a> or 
                <a href="presentation/signUp_form.php">sign up</a></p>
            <br><br>

        </div> <!-- ./ container -->

    </body>
    <?php require (__DIR__ . "/../presentation/footer.php"); ?>

</html>
