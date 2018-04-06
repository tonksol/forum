<?php require_once ("login.php"); ?>
<?php require ("../presentation/header.php"); ?> 
<!-- 
I don't use this any more because I have now a modal in the navbar 
Before it was in the "user" folder 
-->

<html>
    <body id"log-in">
        <div class="card">
            <div class="card-body">
        <h1>Log in</h1><br>


        <!-- 
            form action keeps the user on the same page so you can see the sign up errors. 
        -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">         
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@example.com" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                <small id="passwordHelp" class="form-text text-muted">Forgot your <a href="#">password?</a></small>
            </div>
            <!--
                ADD a rember my email check
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember my email</label>
            </div>
            --> 
            
            <p class="form-text text-muted" > Don't have a login? please <a href="http://localhost:41062/www/Forum/presentation/signUp_form.php"> sign up </a></p>
            <button type="submit" class="btn btn-primary" name="submit">Log in</button>
            <button type="" class="btn btn-primary" class="log-out-btn">Log out</button>
        </form>