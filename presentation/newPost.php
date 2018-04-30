<?php
require_once(__DIR__ . "/../include/functions.php");
require_once(__DIR__ . "/../business/topicDAO.php");
require_once(__DIR__ . "/../business/categoryDAO.php");
require_once(__DIR__ . "/../presentation/header.php");
?>

<div class="container"> 
    <br><br>             
    <div class="form-group">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="categories"><h5>choose a category:</h5></label>
            <select onchange="this.form.submit()" class="form-control" id="category" name="category">
                <?php $categories = getCategories(); foreach ($categories as $category) { ?> 
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name'];?></option>
                    <?php } ?>
            </select>
            <noscript><input type="submit" value="Submit"></noscript>
            </form>
    </div>

      <div class="form-group">
        <label for="topics"><h5>choose a topic:</h5></label>
            <select class="form-control" id="topic" name="topic">
            <?php 
            $topics = getTopics($_POST['category']);
            foreach ($topics as $topic) { ?> 
                <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']?></option>
                <?php } ?>
            </select>
    </div>



    

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Choose Topic
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>

</div> <!-- ./ container -->