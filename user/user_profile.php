<?php require_once ("../include/functions.php"); ?>
<?php require_once ("../include/session.php"); ?>
<?php member_area(); ?>
<?php require_once ("../header.php"); ?> 


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
                    <img src="../images/user-image-placeholder.png" alt="profile-picture">
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
                        <table class="table">
                            <tbody>
                                <tr>
                                <th scope="row">Firstname: </th>
                                <td>Tonke</td>                                
                                </tr>
                                <tr>
                                <th scope="row">Prefix: </th>
                                <td></td>
                                </tr>
                                <tr>
                                <th scope="row">Lastname: </th>
                                <td>Bult</td>
                                </tr>
                                <tr>
                                <th scope="row">Username: </th>
                                <td>magicUnicorn</td>
                                </tr>
                                <tr>
                                <th scope="row">Birthday: </th>
                                <td>11-02-1991</td>
                                </tr>
                                <tr>
                                <th scope="row">Quote: </th>
                                <td>Take nothing then photograph's. Leave nothing then footprints.</td>
                                </tr>
                            </tbody>
                            </table>
                </div> <!-- ./ col-sm-8 -->
            </div> <!-- ./ col-sm-4 -->
            </div> <!-- ./ row -->
            <br>
            <br>
            <br>
	    </div> <!-- ./ container --> 
    </body>


<?php require ("../footer.php"); ?>