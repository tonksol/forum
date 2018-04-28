<?php 
require_once (__DIR__ . "/../include/functions.php");
require_once (__DIR__ . "/../business/userDAO.php");
// require_once ("include/session.php");
memberArea();
require_once (__DIR__ . "/../presentation/header.php");  
require_once (__DIR__ . "/../business/userProfile.php");
// require_once ("uploadImage.php");
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
        <center><img src="images/<?php echo getUserImage($row["userImage"]) ?>" alt="profile-picture"></center>


                <form action="business/uploadImage.php" method="post" enctype="multipart/form-data">
                    Select image to upload:
                    <input type="file" name="image"/>
                    <input type="submit" name="submit" value="UPLOAD"/>
                </form>       

        
                    <br>
            <div class="caption">
                <p><b><center><?php echo $row["userName"] ?></center></b></p>
                </div>
            </div>
        
    
                <!-- labels and info -->
    <div class="col-sm-6">
        <h1>Personal profile info</h1>  
        <br> 
        <br>                
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="userinfo">

        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
            <div class="form-group row">
                <label for="firstname" class="col-sm-3 col-form-label"><b>Firstname: </b></label> 
                <div class="col-sm-9">                              
                    <input type="text" name="firstname" value="<?php echo $row["firstName"]; ?>" <?php echo editableForm(); ?>><br>
                </div> <!-- col-sm-10 -->
            </div> <!-- ./ form-group row -->
            

            <div class="form-group row">
            <label for="prefix" class="col-sm-3 col-form-label"><b>Prefix: </b></label>
                <div class="col-sm-9">
                    <input type="text" name="prefix" value="<?php echo $row["prefix"] ?>" <?php echo editableForm(); ?>><br>
                </div> <!-- col-sm-9 -->
            </div> <!-- ./ form-group row -->
            
            <div class="form-group row">
                <label for="lastname" class="col-sm-3 col-form-label"><b>Lastname: </b></label>
                <div class="col-sm-9"> 
                    <input type="text" name="lastname" value="<?php echo $row["lastName"] ?>" <?php echo editableForm(); ?>><br>
                </div> <!-- col-sm-9 -->
            </div> <!-- ./ form-group row -->

            <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label"><b>Username: </b></label>
                <div class="col-sm-9">
                    <input type="text" name="username" value="<?php echo $row["userName"] ?>" <?php echo editableForm(); ?>><br>
                </div> <!-- col-sm-9 -->
            </div> <!-- ./ form-group row -->

            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label"><b>Email: </b></label>
                <div class="col-sm-9">
                    <input type="text" name="email" value="<?php echo $row["email"]; ?>" <?php echo editableForm(); ?>><br>
                </div> <!-- col-sm-9 -->
            </div> <!-- ./ form-group row -->

            <div class="form-group row">
                <label for="birthday" class="col-sm-3 col-form-label"><b>Birthday: </b></label>
                <div class="col-9">
                    <input type="text" name="birthday" value="<?php echo $row["birthday"];?>" <?php echo editableForm(); ?>><br>
                </div> <!-- col-sm-9 -->
            </div> <!-- ./ form-group row -->

            <div class="form-group row">
            <label for="quote" class="col-3 col-form-label"><b>Quote: </b></label>
                <div class="col-lg-9">
                    <input type="text" name="quote" value="<?php echo $row["quote"]?>" <?php echo editableForm(); ?>><br>
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