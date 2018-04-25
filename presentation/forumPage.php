<?php
require_once(__DIR__ . "/../include/functions.php");
require_once(__DIR__ . "/../presentation/header.php");
require_once(__DIR__ . "/../business/forumPageDAO.php");
?>

<body>
    <div class="container">
    <br><br><br>
        <?php echo getPage($_GET['forumPageID']) ?>
        <br><br><br>
    </div>
</body>

<?php require_once(__DIR__ . "/../presentation/footer.php");?>


