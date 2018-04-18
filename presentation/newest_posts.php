<?php
require_once("header.php");
require_once("../include/functions.php");
?>

<br><br>
<div class="container">
    <h1>Newest discussions</h1>
    <br><br>

    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Topic</th>
            <th scope="col">Discussion</th>
            <th scope="col">Number of Replies</th>
            <th scope="col">Started on (date)</th>
            <th scope="col">(time)</th>
        </tr>
    </thead>
    <tbody>
        
        <?php 
        echo getTopics(); 
        ?>
        
    </tbody>
    </table>
</div> <!-- ./ container -->
<?php require_once("footer.php");