<?php
// overview of all categories
require_once ("header.php");
require_once("../business/postRepliesOverview.php");
?>

<br><br>
<div class="container">
    <h1> Post name</h1>
    <br><br>
        <div class="container">

            <div class="card" >
                <img class="card-img-top" src="../images/cover1.jpg" alt="Card image">
                <div class="card-body">
                <h4 class="card-title">post title</h4>
                <p class="card-text">Content post</p>
            </div>
        </div>
        <br>

        <div class="container">
            <div class="card" >
                
                <div class="card-body">
                <h4 class="card-title">reply title</h4>
                <p class="card-text">Content reply</p>
            </div>
        </div>

        
        <?php 
         echo getPosts(1); // parameter = postID
         echo getPosts(2); // parameter = postID
         echo getPosts(3); // parameter = postID
         echo getPosts(4); // parameter = postID
        ?>
        

</div></div>
</div> <!-- ./ container -->
<br><br><br>


<?php require ("footer.php"); ?>