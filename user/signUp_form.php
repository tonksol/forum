<?php require ("../header.php"); ?> 
<?php require_once("signUp.php"); ?>


<html>
    <body id"sign-up">
        <div class="card">
            <div class="card-body">
        <h1>Sign up for the boardgame forum! </h1><br>
            <!-- 
                form action keeps the user on the same page so you can see the sign up errors. 
                Fill in the action="" with the page you want to redirect to (for example home.php)
            -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">          
            Email:          <input class="form-control" placeholder="Email" name="email"><br>
             <?php echo $msg_email_is_empty; ?>
             <?php echo $msg_not_an_email; ?>
            UserName:       <input class="form-control" type="text" placeholder="Username" name="username"><br>
            <?php echo $msg_username_is_empty; ?>
            UserPassword:   <input class="form-control" type="text" placeholder="Password" name="password"><br><br>
            <?php echo $msg_password_is_empty; ?>           
            <input type="submit" name="submit">
            <p class="form-text text-muted" > Alrealdy signed up? please <a href="http://localhost:41062/www/Forum/user/login_form.php">log in </a></p>
       
        </form>
