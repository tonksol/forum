<?php
// overview of all categories
require_once ("header.php");
require_once("../business/categoryOverview.php");
?>

<br><br>
<div class="container">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Number of posts</th>
        <th scope="col">latest posts</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">1</th>
        <td><?php echo $categoryName ?></td>
        <td>10</td>
        <td>12-04-2018 19:03</td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td><?php echo $categoryName ?></td>
        <td>Thornton</td>
        <td>@fat</td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td><?php echo $categoryName ?></td>
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