<?php require ("../header.php"); ?> 

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
            UserName:       <input class="form-control" type="text" placeholder="Username" name="username"><br>
            UserPassword:   <input class="form-control" type="text" placeholder="Password" name="password"><br><br>           
            <input type="submit" name="submit">
        </form>
