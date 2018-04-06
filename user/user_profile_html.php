<?php 
require_once ("../include/functions.php");
// require_once ("../include/session.php");
member_area();
require_once ("../presentation/header.php");  
require_once ("user-profile.php");
// require_once ("uploadImage.php");
?>


<html>
    <!-- https://www.codeply.com/view/r0DGunLiWs -->
    <body>      
        <div class = "user-cover">
        
        </div> <!-- ./ user-cover -->
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row">
            <div class="col-sm-4"> <!-- the size of the row --> 
            <img src="<?php echo get_user_image($userImage) ?>" alt="profile-picture">

                    <!--
                    <form action="uploadImage.php" method="post" enctype="multipart/form-data">
                        Select image to upload:
                        <input type="file" name="image"/>
                        <input type="submit" name="submit" value="UPLOAD"/>
                    </form>       
                    -->
                    <!-- 
                        ../images/user-image-placeholder.png 
                        getUserImage.php?id=1
                    -->
                    <br>
                        <div class="caption">
                        <p>Lorem ipsum...</p>
                        </div>
                </div>
                <!-- labels and info -->
                <div class="col-sm-8">
                   <h1>Personal profile info</h1>  
                   <br> 
                   <br>                
                        <form action="user_profile_html.php" method="POST">
                        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
                            <div class="form-group row">
                                <label for="firstname" class="col-sm-2 col-form-label"><b>Firstname: </b></label> 
                                <div class="col-sm-10">                              
                                    <input type="text" name="firstname" value="<?php echo $firstname ?>"><br>
                                </div> <!-- col-sm-10 -->
                            </div> <!-- ./ form-group row -->
                            

                            <div class="form-group row">
                            <label for="prefix" class="col-sm-2 col-form-label"><b>Prefix: </b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="prefix"><br>
                                </div> <!-- col-sm-10 -->
                            </div> <!-- ./ form-group row -->
                            
                            <div class="form-group row">
                                <label for="lastname" class="col-sm-2 col-form-label"><b>Lastname: </b></label>
                                <div class="col-sm-10"> 
                                    <input type="text" name="lastname"><br>
                                </div> <!-- col-sm-10 -->
                            </div> <!-- ./ form-group row -->

                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label"><b>Username: </b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" value="<?php echo $username ?>"><br>
                                </div> <!-- col-sm-10 -->
                            </div> <!-- ./ form-group row -->

                            <div class="form-group row">
                                <label for="birthday" class="col-sm-2 col-form-label"><b>Birthday: </b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="birthday"><br>
                                </div> <!-- col-sm-10 -->
                            </div> <!-- ./ form-group row -->

                            <div class="form-group row">
                            <label for="birthday" class="col-sm-2 col-form-label"><b>Quote: </b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="quote"><br>
                                </div> <!-- col-sm-10 -->
                            </div> <!-- ./ form-group row -->

                            <input type="hidden" name="form_submitted" value="1" />
                            
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="submit">
                            <input class="btn btn-primary btn-block" type="button" name="edit" value="edit info"><br>
                            <br>
                            

                        </form>
                        <br>
                        <br>
                        <br>
                        <table class="table">
                            <tbody>
                                <tr>
                                <th scope="row">Firstname: </th>
                                    <td><?php echo $firstname ?> </td>    
                                </tr>
                                <tr>
                                <th scope="row">Prefix: </th>
                                    <td><?php echo $prefix ?> </td>
                                </tr>
                                <tr>
                                <th scope="row">Lastname: </th>
                                    <td><?php echo $lastname ?></td>
                                </tr>
                                <tr>
                                <th scope="row">Username: </th>
                                <td><?php echo $username ?></td>
                                </tr>
                                <tr>
                                <th scope="row">Birthday: </th>
                                <td><?php echo $birthday ?></td>
                                </tr>
                                <tr>
                                <th scope="row">Quote: </th>
                                <td><?php echo $quote ?></td>
                                </tr>
                            </tbody>
                        
                        </table>
                </div> <!-- ./ col-sm-8 -->
            </div> <!-- ./ col-sm-4 -->
            
            <br>
            <br>
            
            <div class="col-sm-2">

                <input class="btn btn-primary btn-block" type="button" name="edit" value="edit info"><br>
            </div> <!-- ./ col-sm-2 -->
            </div> <!-- ./ row -->
            <br>
            <br>
            <br>
	    </div> <!-- ./ container --> 
    </body>


<?php require ("../presentation/footer.php"); ?>

<!-- 
 UPDATE fixen
 Formulier fixen
 
    -->