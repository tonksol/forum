<?php 
require_once ("../include/functions.php");
// require_once ("../include/session.php");
member_area();
require_once ("../presentation/header.php");  
require_once ("../business/userProfile.php");
// require_once ("uploadImage.php");
?>


<html>
    <!-- https://www.codeply.com/view/r0DGunLiWs -->
<body>      
    <div class = "user-cover">
        <?php echo update_userinfo_fail_message(); ?>
    </div> <!-- ./ user-cover -->
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
        <div class="col-sm-4"> <!-- the size of the row --> 
        <center><img src="<?php echo get_user_image($userImage) ?>" alt="profile-picture"></center>


                <form action="../business/uploadImage.php" method="post" enctype="multipart/form-data">
                    Select image to upload:
                    <input type="file" name="image"/>
                    <input type="submit" name="submit" value="UPLOAD"/>
                </form>       

        
                    <br>
            <div class="caption">
                <p><b><center><?php echo $username ?></center></b></p>
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
                    <input type="text" name="firstname" value="<?php echo $firstname ?>" <?php echo editable_form(); ?>><br>
                </div> <!-- col-sm-10 -->
            </div> <!-- ./ form-group row -->
            

            <div class="form-group row">
            <label for="prefix" class="col-sm-3 col-form-label"><b>Prefix: </b></label>
                <div class="col-sm-9">
                    <input type="text" name="prefix" value="<?php echo $prefix ?>" <?php echo editable_form(); ?>><br>
                </div> <!-- col-sm-9 -->
            </div> <!-- ./ form-group row -->
            
            <div class="form-group row">
                <label for="lastname" class="col-sm-3 col-form-label"><b>Lastname: </b></label>
                <div class="col-sm-9"> 
                    <input type="text" name="lastname" value="<?php echo $lastname ?>" <?php echo editable_form(); ?>><br>
                </div> <!-- col-sm-9 -->
            </div> <!-- ./ form-group row -->

            <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label"><b>Username: </b></label>
                <div class="col-sm-9">
                    <input type="text" name="username" value="<?php echo $username ?>" <?php echo editable_form(); ?>><br>
                </div> <!-- col-sm-9 -->
            </div> <!-- ./ form-group row -->

            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label"><b>Email: </b></label>
                <div class="col-sm-9">
                    <input type="text" name="email" value="<?php echo $email ?>" <?php echo editable_form(); ?>><br>
                </div> <!-- col-sm-9 -->
            </div> <!-- ./ form-group row -->

            <div class="form-group row">
                <label for="birthday" class="col-sm-3 col-form-label"><b>Birthday: </b></label>
                <div class="col-9">
                    <input type="text" name="birthday" value="<?php echo $birthday?>" <?php echo editable_form(); ?>><br>
                </div> <!-- col-sm-9 -->
            </div> <!-- ./ form-group row -->

            <div class="form-group row">
            <label for="quote" class="col-3 col-form-label"><b>Quote: </b></label>
                <div class="col-lg-9">
                    <input type="text" name="quote" value="<?php echo $quote?>" <?php echo editable_form(); ?>><br>
                </div> <!-- col-sm-10 -->
            </div> <!-- ./ form-group row -->
            
            <div class="form-group row">
            <label for="badge" class="col-3 col-form-label"><b>Badge: </b></label>
                <div class="col-lg-9">
                    <!-- <input type="image" name="badge" -->
                    <?php foreach ($badge as $b) { ?>
                    <img src="../images/badges/<?php echo $b?>">
                    <?php } ?>
                </div> <!-- col-sm-10 -->
            </div> <!-- ./ form-group row -->
            
            <!-- edit or submit button-->
            <?php echo edit_submit_button_switch();?>                            
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

<?php require ("../presentation/footer.php"); ?>