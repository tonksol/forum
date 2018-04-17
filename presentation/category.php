<?php
// overview of all categories
require_once ("header.php");
require_once("../business/categoryOverview.php");
?>

<br><br>
<div class="container">
        <?php 
            for($i = 0; $i < count($row); ++$i) {
                $row[$i];
            }

        ?>
<!--
        <?php //foreach ($categoryName as $name) { ?>
        <td><?php //echo $name ?></td>
        <br>
        <?php // } ?>

        <?php //if(is_array($categoryDescription)){
            //foreach ($categoryDescription as $description) { ?>
            <td><?php //echo $description ?></td>
            <br>
            <br>
        <?php // }} ?>
-->
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Category</th>
        <th scope="col">Description</th>
        <th scope="col">Topic</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        
        <?php foreach ($categoryName as $name) { ?>
        <?php echo '<tr><td>', $name, '</td>'?>
        <?php } ?>
        
        <?php foreach ($categoryDescription as $d) { ?>
        <?php echo '<td>', $d, '</td></tr>'?>
        <?php } ?>


        <tr>
        <th scope="row">2</th>
        <td></td>
        <td>Thornton</td>
        <td>@fat</td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td></td>
        <td>the Bird</td>
        <td>@twitter</td>
        </tr>
    </tbody>
    </table>


    <div class="form-group row">
        <label for="categoryname" class="col-sm-3 col-form-label"><b>name: </b></label>
        <div class="col-9">
            <input type="text" name="categoryname" value="<?php echo $categoryName?>"><br>
        </div> <!-- col-sm-9 -->
    </div> <!-- ./ form-group row -->

</div> <!-- ./ container -->
<br><br><br>


<?php require ("footer.php"); ?>