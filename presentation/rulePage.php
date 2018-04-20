<?php
require_once("../include/functions.php");
admin_area();
require_once("header.php");
require_once("../business/forumPageDAO.php");


?>
<body>
    <div class="container">
    <br><br><br>
        <?php echo getPage ("Rules and regulations"); 
        echo getRules(); ?>
        <br><br><br>
    </div>
</body>

<?php require_once("footer.php");?>