<?php
/**
 * Created by PhpStorm.
 * User: frede
 * Date: 21-03-2018
 * Time: 14:31
 */
// Create variable and select collumns from DB
$categories = "SELECT categoryName, categoryDescription, imgpath1, imgpath2, imgpath3 FROM category";
$result = $connection->query($categories);

//Check if table contain rows
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo HTML bootstrap carousel
        echo '
<div class="card">
    <div class="card-header">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100 slider" src='/* Imagepath from database*/. $row["imgpath1"] . ' alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 slider" src='./* Imagepath from database*/ $row["imgpath2"] . ' alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 slider" src='./* Imagepath from database*/ $row["imgpath3"] . ' alt="Third slide">
            </div>
           </div>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title">'/* Category name from database*/ . $row["categoryName"] . '</h5>
        <p class="card-text">'/* Category description from database*/ . $row["categoryDescription"] . '</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div><br>';

    }

} else {
    echo "0 results";
}
