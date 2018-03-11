<?php
require_once ("include/connection.php");
$query = "select * from user";
$result = mysqli_query($connection, $query) or die("error query failed");

// $email = $_POST["email"];
// $username = $_POST["username"];
// $password = $_POST["password"];

echo "Welcome " . $_POST["username"] . "<br>";
echo "email is " . $_POST["email"] . "<br>";

// $query = "INSERT INTO User (email, userName, userPassword) VALUES "

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
            Email:          <input type="text" name="email"><br>
            UserName:       <input type="text" name="username"><br>
            UserPassword:   <input type="text" name="password"><br><br>           
            <input type="submit" name="signIn">
        </form>


    </body>
</html>