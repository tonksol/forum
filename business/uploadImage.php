<?php
require_once ("../include/functions.php");
/*
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        /*
         * Insert image data into database
         */
        
/*
        $userID = $_SESSION['user_id'];
        //Insert image content into database
        // $insert = $connection->query("INSERT INTO user (userImage) VALUES ('$imgContent')");
        $update = $connection->query("UPDATE user SET userImage = $imgContent WHERE userID = $userID");
        if($update){
            echo "File uploaded successfully.";
            redirect_to("../presentation/uploadImage.php");
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
}
*/

// Defines (bepalen) a named constant
define ("MAX_SIZE","3000");

 function getExtension($string) {
        // strrpos = Find the position of the last occurrence(laatste instantie) of a substring in a string
         $string_position = strrpos($string,".");
         if (!$string_position) { 
             return ""; 
            }
        // strlen() = Get string length
        $string_length = strlen($string) - $string_position;
        // Return part of a string
        $string_part = substr($string,$string_position+1,$string_length);
         return $string_part;
 }

$errors=0;
if (isset($_POST["submit"])) {
    $image = $_FILES['image']['name'];
 	if ($image) {
         // Un-quotes a quoted string
        $filename = stripslashes($_FILES['image']['name']);
        $extension = getExtension($filename);
        // Make a string lowercase
        $extension = strtolower($extension);
        // check the file extension
        if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png")) {
 		    echo '<h1>Unknown filetype!</h1>';
 		    $errors=1;
 		} else {
            // get filesize
            $size = filesize($_FILES['image']['tmp_name']);
            
            // if the size is bigger then ... error message
            if ($size > MAX_SIZE*1024) {
                echo '<h1>Image is to big: Max 3 Mb!</h1>';
                $errors=1;
                return 0;
            }

            $image_name = $image;
            $newname = "../images/".$image_name;
            $copied = copy($_FILES['image']['tmp_name'], $newname);
            // if not copied error message
            if (!$copied) {
                echo '<h1>Copy unsuccessfull!</h1>';
                $errors=1;
            }
}
}
}

// if there are no errors execute query
if(isset($_POST['Submit']) && !$errors) {
    $query = "UPDATE user SET userImage = $filename WHERE userID = $userID";
    $result = mysqli_query($connection, $query);
    echo "<h1>Image succesful uploaded!</h1>";
    redirect_to("userProfile_page.php");
}
