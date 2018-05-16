<?php
require_once(__DIR__ . "/../include/functions.php");
require_once(__DIR__ . "/../business/topicDAO.php");
require_once(__DIR__ . "/../business/categoryDAO.php");
require_once(__DIR__ . "/../business/postDAO.php");

$userID = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $result = newPost($userID, $_POST['selectedTopic'], $_POST['postName'], $_POST['postContent']);
   redirectTo("postReplies.php?postID=" . $result);
}

require_once(__DIR__ . "/../presentation/header.php");
?>

<!-- https://stackoverflow.com/questions/8315887/onchange-this-form-submit-versus-two-submit-buttons?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa -->
<div class="container"> 
    <br><br>             
    <div class="form-group">
        <form action="<?php echo mysqlPrepare($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="categories"><h5>choose a category:</h5></label>
            <!-- select instead of input -->
            <select onchange="this.form.submit()" class="form-control" id="category" name="selectedCategory">
                <option value=""></option>
                <?php $categories = getCategories(); foreach ($categories as $category) { ?> 
                    <!-- $_POST['category'] is selected category by the categoryID -->
                    <option value="<?php echo $category['id']; ?>"<?php if (isset($_POST['selectedCategory']) && $_POST['selectedCategory'] == $category['id']){echo "selected";} ?>><?php echo $category['name'];?></option>
                    <?php } ?>
            </select>
        </form>
    </div>



    <br><br>
    <h5>Create a new discussion</h5>   
    <form action="<?php echo mysqlPrepare($_SERVER["PHP_SELF"]);?>" method="POST">
    
    <div class="form-group">
        <label for="topics">choose a topic:</label>
            <select class="form-control" id="topic" name="selectedTopic">
            <?php 
            $topics = getTopics($_POST['selectedCategory']);
            foreach ($topics as $topic) { ?> 
                <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']?></option>
                <?php } ?>
            </select>
    </div>
    
    <div class="form-group">
        <div class="col-sm-10">
            <textarea class="form-control postName" name="postName" id="postName" placeholder="Enter your title"></textarea>
            <br>
            <textarea class="form-control texteditor" name="postContent" formaction="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" placeholder="Enter your new discussion..." rows="5" id="postContent"></textarea>  
        </div>
    </div>
    <input class='btn btn-primary btn-block' type='submit' name='submit' value='submit'>
    </form>

</div> <!-- ./ container -->
