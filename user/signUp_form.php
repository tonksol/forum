<?php require ("../header.php"); ?> 
<?php require_once("signUp.php"); ?>


<html>
    <body id"sign-up">
    <div class="container">
    <br><br>

                
        
            <!-- 
                form action keeps the user on the same page so you can see the sign up errors. 
                Fill in the action="" with the page you want to redirect to (for example home.php)
            -->
        <div class="row justify-content-md-center">
            <div class="col-4 align-self-center">
            <h3>Sign up today for the boardgame forum!</h3><br>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">          
                    <!-- email -->
                    <input class="form-control" placeholder="name@example.com" name="email"><br>
                    <?php echo $msg_email_is_empty; ?>
                    <?php echo $msg_not_an_email; ?>
                    <!-- username -->
                    <input class="form-control" type="text" placeholder="Username" name="username"><br>
                    <?php echo $msg_username_is_empty; ?>
                    <!-- password -->
                    <input class="form-control" type="text" placeholder="Password" name="password"><br>
                    <?php echo $msg_password_is_empty; ?>           
                    <input class="btn btn-primary btn-block" type="submit" name="submit" value="submit">
                    <p class="form-text text-muted" > Alrealdy signed up? please <a href="http://localhost:41062/www/Forum/user/login_form.php">log in </a></p>
            </div>
        </div>
            </form>


    </div>
