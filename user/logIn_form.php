<?php require ("../header.php"); ?> 

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
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            </div>
            <!--
                ADD a rember my email check

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember my email</label>
            </div>
            --> 
            <button type="submit" class="btn btn-primary">Log in</button>
            <button type="" class="btn btn-primary">Log out</button>
            <a class="form-text text-muted" href="http://localhost:41062/www/Forum/user/signUp.php"> Don't have a login? please sign up </a>
        </form>