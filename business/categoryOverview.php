<?php
require_once("../include/functions.php");

$query = "SELECT * FROM `category`";
$result = mysqli_query($connection, $query);


    if ($result->num_rows > 0 ){
        while ($row = $result->fetch_assoc()){
            
            $categoryID[] = $row["categoryID"];
            $topicID[] = $row["topicID"];
            $categoryName[] = $row["categoryName"];
            $categoryDescription[] = $row["categoryDescription"];
            $img1[] = $row["img_path1"];
            $img2[] = $row["img_path2"];
            $img3[] = $row["img_path3"];
            

            // $categoryFields = array("Customer Name" => $row['Name'], 
             //     "Customer Age"  => $row['Age']);

            // return '<tr><td>' . $categoryName . '</td><td>' . $categoryDescription . '</td><td>';
        }
    }

        

        /*
        $categoryID[] = $row["categoryID"];
            $topicID[] = $row["topicID"];
            $categoryName[] = $row["categoryName"];
            $categoryDescription[] = $row["categoryDescription"];
            $img1[] = $row["img_path1"];
            $img2[] = $row["img_path2"];
            $img3[] = $row["img_path3"];


        echo "<table>";
        echo "<tbody>";
        echo "<tr>";

        // echo '<th scope="row">1</th>';
        echo "<td> {$row['categoryName']} </td>";
        // echo "<td>" . $categoryName . "</td>";
        echo "<td> {$row['categoryDescription']} </td>";
        echo "<td>12-04-2018 19:03</td>";
        
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
        */
    