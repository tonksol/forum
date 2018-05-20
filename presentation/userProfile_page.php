<?php 
require_once (__DIR__ . "/../include/functions.php"); // still needed for memerArea()
require_once (__DIR__ . "/../business/userDAO.php");
require_once (__DIR__ . "/../business/badgeDAO.php");
memberArea();
require_once (__DIR__ . "/../presentation/header.php");

$userID = $_SESSION['user_id'];
$userID = trim(mysqli_real_escape_string($connection, $userID));
$badges = getBadges($userID); // badges = array 
$row = getUserProfile($userID); // row = array
  
if (isset($_POST['submit'])) {
    $firstname = trim(mysqli_real_escape_string($connection, $_POST["firstname"])); 
    $prefix = trim(mysqli_real_escape_string($connection, $_POST["prefix"])); 
    $lastname = trim(mysqli_real_escape_string($connection, $_POST["lastname"])); 
    $birthday = trim(mysqli_real_escape_string($connection, $_POST["birthday"])); 
    $email = trim(mysqli_real_escape_string($connection, $_POST["email"])); 
    $username = trim(mysqli_real_escape_string($connection, $_POST["username"])); 
    $quote = trim(mysqli_real_escape_string($connection, $_POST["quote"]));
    updateUserInfo($userID, $firstname, $prefix, $lastname, $birthday, $email, $username, $quote);
}
?>


<html>
    <!-- https://www.codeply.com/view/r0DGunLiWs -->
<body>      
    <div class = "user-cover">
        <?php echo updateUserinfoFailMessage(); ?>
    </div> <!-- ./ user-cover -->
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
        <div class="col-sm-4"> <!-- the size of the row --> 
        <center><img src="images/<?php echo getUserImage(mysqlPrepare($row["userImage"])) ?>" alt="profile-picture"></center>

                <!-- TO DO mysqlPrepare() form action -->
                <form action="business/uploadImage.php" method="post" enctype="multipart/form-data">
                    Select image to upload:
                    <input type="file" name="image"/>
                    <input type="submit" name="submit" value="UPLOAD"/>
                </form>       

        
                    <br>
            <div class="caption">
                <p><b><center><?php echo mysqlPrepare($row["userName"]) ?></center></b></p>
                </div>
            </div>
        
    
                <!-- labels and info -->
    <div class="col-sm-6">
        <h1>Personal profile info</h1>  
        <br> 
        <br>                
        <form action="<?php echo mysqlPrepare($_SERVER['PHP_SELF']);?>" method="POST" class="userinfo">

        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
            <div class="form-group row">
                <label for="firstname" class="col-sm-3 col-form-label"><b>Firstname: </b></label> 
                <div class="col-sm-9">                              
                    <input type="text" name="firstname" value="<?php echo mysqlPrepare($row["firstName"]); ?>" <?php echo editableForm(); ?>><br>
                </div> <!-- col-sm-10 -->
            </div> <!-- ./ form-group row -->
            

            <div class="form-group row">
            <label for="prefix" class="col-sm-3 col-form-label"><b>Prefix: </b></label>
                <div class="col-sm-9">
                    <input type="text" name="prefix" value="<?php echo mysqlPrepare($row["prefix"]) ?>" <?php echo editableForm(); ?>><br>
                </div> <!-- col-sm-9 -->
            </div> <!-- ./ form-group row -->
            
            <div class="form-group row">
                <label for="lastname" class="col-sm-3 col-form-label"><b>Lastname: </b></label>
                <div class="col-sm-9"> 
                    <input type="text" name="lastname" value="<?php echo mysqlPrepare($row["lastName"]) ?>" <?php echo editableForm(); ?>><br>
                </div> <!-- col-sm-9 -->
            </div> <!-- ./ form-group row -->

            <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label"><b>Username: </b></label>
                <div class="col-sm-9">
                    <input type="text" name="username" value="<?php echo mysqlPrepare($row["userName"]) ?>" <?php echo editableForm(); ?>><br>
                </div> <!-- col-sm-9 -->
            </div> <!-- ./ form-group row -->

            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label"><b>Email: </b></label>
                <div class="col-sm-9">
                    <input type="text" name="email" value="<?php echo mysqlPrepare($row["email"]); ?>" <?php echo editableForm(); ?>><br>
                </div> <!-- col-sm-9 -->
            </div> <!-- ./ form-group row -->

            <div class="form-group row">
                <label for="birthday" class="col-sm-3 col-form-label"><b>Birthday: </b></label>
                <div class="col-9">
                    <input type="text" name="birthday" value="<?php echo mysqlPrepare($row["birthday"]);?>" <?php echo editableForm(); ?>><br>
                </div> <!-- col-sm-9 -->
            </div> <!-- ./ form-group row -->

            <div class="form-group row">
            <label for="quote" class="col-3 col-form-label"><b>Quote: </b></label>
                <div class="col-lg-9">
                    <input type="text" name="quote" value="<?php echo mysqlPrepare($row["quote"]);?>" <?php echo editableForm(); ?>><br>
                </div> <!-- col-sm-10 -->
            </div> <!-- ./ form-group row -->
            
            <div class="form-group row">
            <label for="badge" class="col-3 col-form-label"><b>Badge: </b></label>
                <div class="col-lg-9">
                    <!-- <input type="image" name="badge" -->
                    <?php foreach ($badges as $b) { ?>
                    <img src="images/badges/<?php echo $b?>">
                    <?php } ?>
                </div> <!-- col-sm-10 -->
            </div> <!-- ./ form-group row -->
            
            <!-- edit or submit button-->
            <?php echo editSubmitButtonSwitch();?>                            
        </form>
    <br>
    <br>
    <br>

        </div> <!-- ./ col-sm-6 -->
        </div> <!-- ./ col-sm-4 -->
        </div> <!-- ./ row -->
            
            <br>
            <br>
            <br>
            <br>
            <br>
    </div> <!-- ./ container --> 
</body>

<?php require (__DIR__ . "/../presentation/footer.php"); ?>