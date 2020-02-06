<?php //session_start();?>
<?php include 'includes/header.php'?>
<?php include '../includes/db.php'?>

<?php
if(isset($_SESSION['username'])){

    $username=$_SESSION['username'];
$query="SELECT * FROM user WHERE user_name='{$username}'";
        $result=mysqli_query($conn,$query);
        confirm($result);
       
        while($row=mysqli_fetch_assoc($result)){
                $user_name=$row['user_name'];
                $user_password=$row['user_password'];
                $user_email=$row['user_email'];
                $user_gender=$row['user_gender'];
                $user_bday=$row['user_dob'];
                $user_city=$row['user_city'];
                $user_designation=$row['user_designation'];
                $user_intro=$row['user_intro'];
                $user_image=$row['user_image'];
                $user_role=$row['user_role'];
        }

}
?>
<?php

if(isset($_POST['update_profile'])){
    $user_name=$_POST['user_name'];
    $user_password=$_POST['password'];
    $user_email=$_POST['email'];
    $user_gender=$_POST['gender'];
    $user_bday=$_POST['bday'];
    $user_city=$_POST['city'];
    $user_designation=$_POST['designation'];
    $user_intro=$_POST['user_intro'];
    $user_role=$_POST['user_role'];
    $user_image=$_FILES['image']['name'];
    $user_image_tmp=$_FILES['image']['tmp_name'];

    //Inserting Updated data into database
    move_uploaded_file($user_image_tmp,"../images/$user_image");
    if(empty($user_image)){
    $query = "SELECT *FROM user WHERE user_name='{$username}'";
        $select_image=mysqli_query($conn,$query);
  
        while($row=mysqli_fetch_assoc($select_image)){
                $user_image=$row['user_image'];
        }

     }
     
    $query="UPDATE user SET user_name='{$user_name}',user_password='{$user_password}',user_email='{$user_email}',user_dob='{$user_bday}',user_city='{$user_city}',user_designation='{$user_designation}',user_intro='{$user_intro}',user_gender='{$user_gender}',user_image='{$user_image}',user_role='{$user_role}' WHERE user_name='{$username}'";
    
    $result=mysqli_query($conn,$query);

    confirm($result);
}
?>


    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/navigation.php'?>
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                                Welcome to Admin
                                <small>author</small>
                            </h1>

                        <form action="" method="post" enctype="multipart/form-data">

<!-- text -->
<div class= "form-group">
        <label for="title">User Name</label> 
        <input type="text" class="form-control" name="user_name" value="<?php echo $user_name?>" required>
</div>

<!-- Password -->
<div class= "form-group">
        <label for="title">Password</label>
        <input type="password" class="form-control" name="password" value="<?php echo $user_password?>" required>
</div>

<!-- email -->
<div class= "form-group">
        <label for="title">Email-id</label>
        <input type="email" class="form-control" name="email" value="<?php echo $user_email?>" required>
</div>

<!-- role(Select) -->
<div class= "form-group">
        <label for="title">Role</label>
        <select name="user_role" id="">
            <option value="Subscriber"><?php echo $user_role; ?></option>
            <?php 
            if($user_role=='Admin'){
                echo "<option value='Subcriber'>Subscriber</option>";   
            }else{
                echo "<option value='Admin'>Admin</option>";
                 
            }
            ?>
   
        </select>
</div>


<!-- file -->
<div class= "form-group">
        <label for="title">Your Image</label>
        <img width="100" src="../images/<?php echo $user_image;?>" alt="image">
        <input type="file" class="form-control" name="image">
</div>


<!-- radio -->
<div class="form-group">
        <label for="title">Gender</label><br/>
        <input type="radio" class="form-control" name="gender" value="Male" <?php if($user_gender=='Male'){ echo "checked";}?>>Male
        <input type="radio" class="form-control" name="gender" value="Female" <?php if($user_gender=='Female'){ echo "checked";}?>>Female
        <input type="radio" class="form-control" name="gender" value="others" <?php if($user_gender=='others'){ echo "checked";}?>>Other

</div>
<!-- date -->
<div class= "form-group">
        <label for="title">Date of Birth</label>
        <input type="date" class="form-control" name="bday" value="<?php echo $user_bday?>">
</div>

<!-- select (Dropdown)-->
<div class= "form-group">
        <label for="title">City</label>
        <select name="city" value="<?php echo $user_password?>">
            <option value="Chandigarh">Chandigarh</option>
            <option value="Mohali">Mohali</option>
            <option value="Panchkula">Panchkula</option>        
        </select>
</div>

<!-- checkbox -->
<div class= "form-group">
        <label for="title">Who are you?</label>
        <input type="checkbox" class="form-control" name="designation" value="Student" <?php if($user_designation=='Student'){ echo "checked";}?>>I am a Student<br/>
        <input type="checkbox" class="form-control" name="designation" value="Teacher" <?php if($user_designation=='Teacher'){ echo "checked";}?>>I am a Teacher<br/>
</div>

<!-- textarea -->
<div class= "form-group">
        <label for="title">Tell us about yourself</label>
        <br/>
        <textarea name="user_intro" value="<?php echo $user_intro?>" rows="10" cols="30">like...i love walking</textarea>
</div>

<!-- button -->
<div class= "form-group">
        <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
</div>
</form>    

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


    <?php include 'includes/footer.php'?>