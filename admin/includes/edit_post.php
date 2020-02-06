<?php

if(isset($_GET['p_id'])){
        $the_post_id = $_GET['p_id'];
}
$query= "SELECT * FROM posts Where post_id=$the_post_id";
$select_post= mysqli_query($conn,$query);


while($row = mysqli_fetch_assoc($select_post)){
    $post_id=$row['post_id'];
    $post_category_id=$row['post_category_id'];
    $post_title=$row['post_title'];
    $post_author=$row['post_author'];
    $post_date=$row['post_date'];
    $post_image=$row['post_image'];
    $post_content=$row['post_content'];
    $post_tags=$row['post_tags'];
    $post_comment_count=$row['post_comment_count'];
    $post_status=$row['post_status'];

}
if(isset($_POST['update_post'])){
    $post_category_id=$_POST['post_category'];
    $post_title=$_POST['title'];
    $post_author=$_POST['author'];
    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];
    $post_content=$_POST['post_content'];
    $post_tags=$_POST['post_tags'];
    $post_status=$_POST['post_status'];


    move_uploaded_file($post_image_temp, "../images/$post_image");

    if(empty($post_image)){
            $query = "SELECT *FROM posts WHERE post_id=$the_post_id";
            $select_image=mysqli_query($conn,$query);

            while($row=mysqli_fetch_assoc($select_image)){
                    $post_image=$row['post_image'];
            }
    }

    $query="UPDATE posts SET post_category_id={$post_category_id},post_title='{$post_title}',post_author='{$post_author}',post_date=now(),post_image='{$post_image}',post_content='{$post_content}',post_tags='{$post_tags}',post_status='{$post_status}' WHERE post_id=$the_post_id";
   
    $result=mysqli_query($conn,$query);
    confirm($result);

    echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id={$the_post_id}'>View Post</a> OR <a href='posts.php'>Edit More Posts</a></p>";
}

?>


<form action="" method="post" enctype="multipart/form-data">

<div class= "form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title;?> "type="text" class="form-control" name="title">
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
        <input value="<?php echo $post_author;?> "type="text" class="form-control" name="author">
</div>
<div class= "form-group">
        <label for="title">Post Status</label>
        <input value="<?php echo $post_status;?> "type="text" class="form-control" name="post_status">
</div>
<div class= "form-group">
        <!-- <label for="title">Post Image</label> -->
        <img width="100" src="../images/<?php echo $post_image;?>" alt="image">
        <input type="file" class="form-control" name="image">
       <!-- <img width="100" src="../images/<?php echo $post_image;?>" alt="image"> -->
</div>
<div class= "form-group">
        <label for="title">Post Tags</label>
        <input value="<?php echo $post_tags;?> "type="text" class="form-control" name="post_tags">
</div>
<div class= "form-group">
        <label for="title">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10">
        <?php echo $post_content;?> 
        </textarea>
</div>
<div class= "form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
</div>
</form>