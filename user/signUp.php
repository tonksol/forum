<?php
require_once("./functions.php");
$error = false; 

if (isset($_POST["submit"])) {
    // declare variables
    $email      =     $_POST["email"];
    $userName   =     $_POST["username"];
    $password   =     $_POST["password"];

    // put the result of the function in the variable
    $error1 = field_not_empty($email);
    $error2 = field_not_empty($userName);
    $error3 = field_not_empty($password);

    // check what field is empty and tell the user what field is empty 
    if ($error1) {
        $error = true;
        echo "The email field is empty. <br>";
    } if ($error2) {
        $error = true;
        "The username field is empty. <br>";
    } if ($error3) {
        $error = true;
        "The password field is empty. <br>";
    } else {
        $error = false;
    }
    
    echo "<br><br>";
    echo "resultaat van $ error: " . $error; 
    echo "<br><br>";
    


    // if error is not false but true then.... 
    if (!$error) { // $error = false
        $query = "INSERT INTO User (email, userName, userPassword) VALUES ('$email','$userName', '$password')";
        $result = mysqli_query($connection, $query);    
        if ($result) {
                echo "You got succesfully signed up!";
            } else {
                $error = true;
                echo "Could not add to DB. ";
            }
    }
} 
 ?>

 <html>
    <body>
        <h1>Sign up for the boardgame forum! </h1><br>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- 
            <?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
            htmlspecialchars() prefent javascript injections by converting special characters to HTML entities.
            PHP_SELF after submit go to this page (signUp.php) 
            -->           
            Email:          <input class="form-control" placeholder="email" name="email"><br>
            UserName:       <input class="form-control" type="text" placeholder="username" name="username"><br>
            UserPassword:   <input class="form-control" type="text" placeholder="password" name="password"><br><br>           
            <input type="submit" name="submit">
        </form>


    </body>
</html>

<!-- 

informatie invullen in het formulier
druk op submit:
    - verzend informatie naar de webserver
    - webserver maakt een vertaalslag 
    - webserver stuurt info naar php
    - php code wordt uitgevoerd door php in opdracht van de webserver
    - 


PANTIES!!!!! ANNEKE - JASMIJN!!
    -->


    