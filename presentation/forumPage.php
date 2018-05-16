<?php
require_once(__DIR__ . "/../include/functions.php");
require_once(__DIR__ . "/../presentation/header.php");
require_once(__DIR__ . "/../business/forumPageDAO.php");
?>

<body>
    <div class="container">
        <br><br><br>
        <?php echo getPage(mysqlPrepare($_GET['forumPageID'])); ?>
        <br>
        <?php if (mysqlPrepare($_GET['forumPageID']) == 2) {
           echo getRules();} ?>
        <br><br>
    </div>
</body>

<?php require_once(__DIR__ . "/../presentation/footer.php");?>


