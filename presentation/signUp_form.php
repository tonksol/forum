<?php require_once (__DIR__ . "/../include/functions.php"); ?>  


<?php require (__DIR__ . "/../presentation/header.php"); ?> 
<?php require_once(__DIR__ . "/../business/signUp.php"); ?>


<html>
  
<?php //  TO DO: SEE FUNCTIONS     echo login_fail_message(); ?> 
    <body id"sign-up">
    <?php echo login_fail_message(); ?>
    <div class="container">
    <br><br><br>
            <!-- 
                form action keeps the user on the same page so you can see the sign up errors. 
                Fill in the action="" with the page you want to redirect to (for example home.php)
            -->
    <div class="signup">
        <div class="row justify-content-md-center">
            <div class="col-5 align-self-center">
            <h3>Sign up today for <br>
                the boardgame forum!</h3><br>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">          
                    <!-- email -->
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-1 col-form-label">&#xf0e0;</label> <!-- label: email -->
                            <div class="col-sm-11">
                                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="name@example.com">
                            </div> <!-- ./ col-sm-11 -->
                        </div> <!-- ./ form-group row -->
                    <?php echo $msg_email_is_empty; ?>
                    <?php echo $msg_not_an_email; ?>
                    <!-- username -->
                    <div class="form-group row">
                        <label for="inputUserName" class="col-sm-1 col-form-label">&#xf007;</label> <!-- label: email -->
                            <div class="col-sm-11">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div> <!-- ./ col-sm-10 -->
                        </div> <!-- ./ form-group row -->
                    <?php echo $msg_username_is_empty; ?>
                    <!-- password -->
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-1 col-form-label">&#xf023;</label> <!-- label: email -->
                            <div class="col-sm-11">
                                <input type="text" class="form-control" name="password" placeholder="Password">
                            </div> <!-- ./ col-sm-10 -->
                        </div> <!-- ./ form-group row -->
                    <?php echo $msg_password_is_empty; ?>           
                    <input class="btn btn-primary btn-block" type="submit" name="submit" value="submit"><br>
                    <p class="form-text text-muted" > Alrealdy signed up? please <a href="#" data-toggle="modal" data-target="#loginModal">log in </a></p>
            </div>
        </div>
    </div> <!-- ./ signup -->
            </form>

    <br><br><br><br><br><br><br><br><br>
    </div> <!-- ./ container -->

<?php require (__DIR__ . "/../presentation/footer.php"); ?>
