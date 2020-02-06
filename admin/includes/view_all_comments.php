<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response to</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>
       </tr> 
    </thead>
    <tbody>
    
    <?php
     $query= "SELECT * FROM comments";
     $select_comments= mysqli_query($conn,$query);
     
     
     while($row = mysqli_fetch_assoc($select_comments)){
         $comment_id=$row['comment_id'];
         $comment_post_id=$row['comment_post_id'];
         $comment_author=$row['comment_author'];
         $comment_date=$row['comment_date'];
         $comment_email=$row['comment_email'];
         $comment_content=$row['comment_content'];
         $comment_status=$row['comment_status'];
         
         echo "<tr>";
         echo "<td>$comment_id</td>";
         echo "<td>{$comment_author}</td>";
         echo "<td>{$comment_content}</td>";
         echo "<td>{$comment_email}</td>";
         echo "<td>{$comment_status}</td>";
         
        $query="SELECT *FROM posts WHERE post_id=$comment_post_id"; 
        $result=mysqli_query($conn,$query);
        // if(!$result){
        //     die("QUERY FAILED".mysqli_error($conn));
        // }
        while($row=mysqli_fetch_assoc($result)){
            $post_id=$row['post_id'];
            $post_title=$row['post_title'];

            echo "<td><a href='../post.php?p_id=$post_id'>$post_title<a></td>";
        }
        

        echo "<td>{$comment_date}</td>";
      
        echo "<td><a href=comments.php?Approve={$comment_id}>Approve</a></td>";
        echo "<td><a href=comments.php?Unapprove={$comment_id}>Unapprove</a></td>";
        echo "<td><a href=comments.php?delete={$comment_id}>DELETE</a></td>";
        echo "<td><a href=comments.php?source=edit_post&p_id={$comment_id}>EDIT</a></td>";
         echo "</tr>";
     }


    ?>

    </tbody>
</table>
<?php

if(isset($_GET['Unapprove'])){
    $the_comment_id=$_GET['Unapprove'];
        $query="UPDATE comments SET comment_status='Unapproved' WHERE comment_id=$the_comment_id";
        $result=mysqli_query($conn,$query);
        header("Location: comments.php");
            if(!$result){
            die("QUERY FAILED".mysqli_error($conn));
        }

}

if(isset($_GET['Approve'])){
    $the_comment_id=$_GET['Approve'];
        $query="UPDATE comments SET comment_status='Approved' WHERE comment_id=$the_comment_id";
        $result=mysqli_query($conn,$query);
        header("Location: comments.php");
            if(!$result){
            die("QUERY FAILED".mysqli_error($conn));
        }

}


if(isset($_GET['delete'])){
    $the_post_id=$_GET['delete'];
        $query="DELETE FROM comments WHERE comment_id={$the_post_id}";
        $delete_query=mysqli_query($conn,$query);
        header("Location: comments.php");
            if(!$result){
            die("QUERY FAILED".mysqli_error($conn));
        }

}

?>