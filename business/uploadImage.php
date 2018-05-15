<?php
require_once (__DIR__ . "/../include/functions.php");

// Defines (defineren) a named constant
define ("MAX_SIZE",3000);
$userID = $_SESSION['user_id'];
$errors = 0;
if (isset($_POST["submit"])) { 
    // Check if file was uploaded ok
    // Check if the filename is refers to a file that was actually uploaded. Or if the upload was succesful
    if( ! is_uploaded_file($_FILES['image']['tmp_name']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK)
    {
        exit('File not uploaded. Possibly too large.');
    }
    // Get filename and put it in $image
    $image_path = $_FILES['image']['name'];
 	if ($image_path) {
         // Un-quotes a quoted string (escape characters, delete slashes). Name = the name of the file on the client
        $filename = stripslashes($_FILES['image']['name']);
        // Pathinfo get the file extension (after the .)
        // It's better to check on the mime type instead of the extension however the browser doens't support that always.
        $extension =  pathinfo($filename, PATHINFO_EXTENSION);
        // Make a string lowercase
        $extension = strtolower($extension);
        // Check the file extension
        if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png")) {
 		    echo '<h1>Unknown filetype!</h1>';
 		    $errors=1;
 		} else {
            // Get filesize (tmp_name is the temporary path and filename of the file on the server). Tmp_name is a new generated filename
            $size = filesize($_FILES['image']['tmp_name']);      
            // If the size is bigger then ... error message filesize = bytes ( calculation for mb)
            if ($size > MAX_SIZE*1024) {
                echo '<h1>Image is to big: Max 3 Mb!</h1>';
                $errors = 1;
                return;
            }
            $image_name = $image_path;
            $newname = "images/".$image_name;
            $copied = copy($_FILES['image']['tmp_name'], $newname);
            // If not copied error message
            if (!$copied) {
                echo '<h1>Copy unsuccessfull!</h1>';
                $errors=1;
            }
            // Create image from file
            switch(strtolower($_FILES['image']['type']))
            {
                case 'image/jpeg':
                        $image = imagecreatefromjpeg($_FILES['image']['tmp_name']);
                        break;
                case 'image/png':
                        $image = imagecreatefrompng($_FILES['image']['tmp_name']);
                        break;
                case 'image/gif':
                        $image = imagecreatefromgif($_FILES['image']['tmp_name']);
                        break;
                default:
                        exit('Unsupported type: '.$_FILES['image']['type']);
            }
            // Delete the uploaded file
            unlink($_FILES['image']['tmp_name']);
            // Target dimensions
            $max_width = 150;
            $max_height = 150;
            // Get current dimensions
            $old_width  = imagesx($image);
            $old_height = imagesy($image);
            if ($old_width > 1500 || $old_height > 1500) {
                echo '<h1>Image is too wide or too heigh: Max 1500!</h1>';
                $errors = 1;
                return;
            }
            // Calculate the scaling we need to do to fit the image
            $scale      = min($max_width/$old_width, $max_height/$old_height);
            // Get the new dimensions
            $new_width  = ceil($scale*$old_width);
            $new_height = ceil($scale*$old_height);
            // Create new empty image. returns an image identifier representing a black image of the specified size.
            $new = imagecreatetruecolor($new_width, $new_height);
            // Make the empty image background transparant instead of black
            imagesavealpha($new, true);
            $trans_colour = imagecolorallocatealpha($new, 0, 0, 0, 127);
            imagefill($new, 0, 0, $trans_colour);
            // Resize old image into new ($image = image_path)
            imagecopyresampled($new, $image, 
                0, 0, 0, 0, 
                $new_width, $new_height, $old_width, $old_height);
            // Write the new resized image to the new image_path 
            imagepng($new, $newname);    
            // $new_image = ob_get_clean();
            // Destroy resources
            imagedestroy($image);
            imagedestroy($new);
        }
    }
}

echo $newname;
// if there are no errors execute query
if(isset($_POST['submit']) && !$errors) {
    $userID = trim(mysqli_real_escape_string($connection, $userID));
    $newname = trim(mysqli_real_escape_string($connection, $newname));
    $query = "CALL proc_update_profilepicture($userID, '$newname')";
    $result = mysqli_query($connection, $query);
    mysqli_next_result($connection);
    echo "<h1>Image succesful uploaded!</h1>";
    redirectTo("/../presentation/userProfile_page.php");
}