<?php

function confirm($result){
    global $conn;
    if(!$result){
        die("QUERY FAILED".mysqli_error($conn));
}
}
function insert_categories(){
    global $conn;
    if(isset($_POST['submit'])){
        $cat_title=$_POST['cat_title'];
        
        if($cat_title =="" || empty($cat_title)){
            echo "This field should not be empty";
        }
        else{

        $query="INSERT INTO cms.categories(cat_title) VALUES ('$cat_title');";//"INSERT INTO user_data(name,password) VALUES ('$name','$pass')";
        //$query .="VALUES ('$cat_title')";
        
        $create_category_query=mysqli_query($conn,$query);
        if(!$create_category_query){
            die('QUERY FAILED'.mysqli_error($conn));
        }
        }
    }
}

function findAllCat(){
 global $conn;

 $query= "SELECT * FROM categories";
$select_cat= mysqli_query($conn,$query);


while($row = mysqli_fetch_assoc($select_cat)){
    $cat_id=$row['cat_id'];
    $cat_title=$row['cat_title'];
    echo "<tr>";
    echo " <td>{$cat_id}</td>";
    echo " <td>{$cat_title}</td>";
    echo " <td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
    echo " <td><a href='categories.php?edit={$cat_id}'>EDIT</a></td>";
    echo "</tr>";
}

}

function deletequery(){
    global $conn;
    if(isset($_GET['delete'])){
        $the_cat_id=$_GET['delete'];
        $query="DELETE FROM categories WHERE cat_id={$the_cat_id}";
        $delete_query=mysqli_query($conn,$query);
        header("Location: categories.php");///used to refresh the page after deleting
    }
}


?>