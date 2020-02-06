<?php //Inserting into database
if(isset($_POST['create_post'])){
 
    $post_category_id=$_POST['post_category'];
    $post_title=$_POST['title'];
    $post_author=$_POST['author'];
    
    $post_date=date('d-m-y');
    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];
    $post_content=$_POST['post_content'];
    $post_tags=$_POST['post_tags'];
    $post_status=$_POST['post_status'];


    move_uploaded_file($post_image_temp, "../images/$post_image");
    $query="INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status) ";
    $query .="VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
    $result=mysqli_query($conn,$query);
  confirm($result);
}

?>


<form action="" method="post" enctype="multipart/form-data">

<div class= "form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
</div>


<div class= "form-group">
        <label for="title">Post Category Id</label>
        <select name="post_category" id="post_category">

        <?php
         $query= "SELECT * FROM categories";
         $select_post_id= mysqli_query($conn,$query);

         confirm($select_post_id);

         while($row = mysqli_fetch_assoc($select_post_id)){
             $cat_id=$row['cat_id'];
             $cat_title=$row['cat_title'];
             echo "<option value='{$cat_id}'>{$cat_title}</option>";
         }

        ?>
     </select>

</div>


<div class= "form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="author">
</div>
<div class= "form-group">
        <label for="title">Post Status</label>
        <input type="text" class="form-control" name="post_status">
</div>
<div class= "form-group">
        <label for="title">Post Image</label>
        <input type="file" class="form-control" name="image">
</div>
<div class= "form-group">
        <label for="title">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
</div>
<div class= "form-group">
        <label for="title">Post Content</label>
        <input type="text" class="form-control" name="post_content" id="" cols="30" rows="10">
</div>
<div class= "form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
</div>
</form>