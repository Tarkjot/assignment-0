<!-- <?php

//Inserting data (filled by user) into database
// if(isset($_POST['add_user'])){
//     $user_name=$_POST['user_name'];
//     $user_password=$_POST['password'];
//     $user_email=$_POST['email'];
//     $user_image=$_FILES['image']['name'];
//     $user_image_tmp=$_FILES['image']['tmp_name'];
//     $user_gender=$_POST['gender'];
//     $user_bday=$_POST['bday'];
//     $user_city=$_POST['city'];
//     $user_designation=$_POST['designation'];
//     $user_intro=$_POST['user_intro'];
//     $user_role=$_POST['user_role'];

      
//     //Validating
//     $user_name=mysqli_real_escape_string($conn,$user_name);
//     $user_password=mysqli_real_escape_string($conn,$user_password);

  
//     //Saving image to particular location
//     move_uploaded_file($user_image_tmp,"../images/$user_image");

//     //Insert Query
//     $query="INSERT INTO user(user_name,user_password,user_email,user_dob,user_city,user_designation,user_intro,user_gender,user_image,user_role) ";
//     $query.="VALUES('{$user_name}','{$user_password}','{$user_email}','{$user_bday}','{$user_city}','{$user_designation}','{$user_intro}','{$user_gender}','{$user_image}','{$user_role}')";

//     $result=mysqli_query($conn,$query);
//     confirm($result);

//     echo "User Created: "." "."<a href='users.php'>View Users</a>";

// }

?> -->


<!------------------------- Fields for the forms----------------------- -->

<form action="" method="post" enctype="multipart/form-data" name="myform" onsubmit="handleSignUp.error_msg()">

<!-- text -->
<div class= "form-group">
        <label for="title">User Name</label> 
        <input id="reqd_usr" type="text" class="form-control" name="user_name" oninput="handleSignUp.remove_warning('reqd_usr','msg_usr')">
        <p id="msg_usr"></p>
</div>

<!-- Password -->
<div class= "form-group">
        <label for="title">Password</label>
        <input id="reqd_pswd" type="password" class="form-control" name="password" oninput="handleSignUp.remove_warning('reqd_pswd','msg_pswd')">
        <p id="msg_pswd"></p>
</div>

<!-- email -->
<div class= "form-group">
        <label for="title">Email-id</label>
        <input id="reqd_email" type="text" class="form-control" name="email" oninput="handleSignUp.remove_warning('reqd_email','msg_email')">
        <p id="msg_email"></p>
</div>

<!-- role(Select) ----------------<option value="Subscriber">Select Options</option>------------------------------->
<div class= "form-group">
        <label for="title">Role</label>
        <select name="user_role" id="role" oninput="handleSignUp.remove_warning('role','msg_role')">
            <option value=""></option>
            <option value="Admin">Admin</option>
            <option value="Subcriber">Subscriber</option>        
        </select>
        <p id="msg_role"></p>
</div>

<!-- file ----------------------------------------------------->
<div class= "form-group">
        <label for="title">Your Image</label>
        <input type="file" class="form-control" name="image" id="image" onfocus="handleSignUp.remove_warning('image','msg_image')">
        <p id="msg_image"><p>
</div>

<!-- radio -->
<div class="form-group">
        <label for="title">Gender</label><br/>
        <input type="radio" class="form-control" id="1" name="gender" value="Male" oninput="handleSignUp.remove_warning('1','msg_gender')">Male
        <input type="radio" class="form-control" id="2" name="gender" value="Female" oninput="handleSignUp.remove_warning('2','msg_gender')">Female
        <input type="radio" class="form-control" id="3" name="gender" value="others" oninput="handleSignUp.remove_warning('3','msg_gender')">Other
        <p id="msg_gender"></p>
</div>
<!-- date ----------------------------------not date-time-local------>
<div class= "form-group">
        <label for="title">Date of Birth</label>
        <input type="date" id="reqd_date" class="form-control" name="bday" onfocus="handleSignUp.remove_warning('reqd_date','msg_date')">
        <p id="msg_date"></p>
</div>

 <!-- number ------------------------------------not in db---->
 <div>
    <label for="title">Age</label><br/>
    <input type="text" class="form-control" name="quantity" id="reqd_age" oninput="handleSignUp.remove_warning('reqd_age','msg_age')">
    <p id="msg_age"></p>
    </div>

<!-- select -->
<div class= "form-group">
        <label for="title">City</label>
        <select name="city" id="reqd_city" class="form-control" oninput="handleSignUp.remove_warning('reqd_city','msg_city')">
            <option value="Chandigarh">Chandigarh</option>
            <option value="Mohali">Mohali</option>
            <option value="Panchkula">Panchkula</option>        
        </select>
        <p id="msg_city"></p>
</div>

  <!-- multiple select---------------------------------not in db-->
  <div class= "form-group" >
        <label for="title">City</label><br/>
        <select name="city2" id="reqd_multi" class="form-control" oninput="handleSignUp.remove_warning('reqd_multi','msg_err')" multiple>
            <option value="Chandigarh">Chandigarh</option>
            <option value="Mohali">Mohali</option>
            <option value="Panchkula">Panchkula</option>        
        </select>
        <p id="msg_err"></p>
     </div>

<!-- checkbox -->
<div class= "form-group">
        <label for="title">Who are you?</label>
        <input type="checkbox" id="4" class="form-control" name="designation" value="Student" oninput="handleSignUp.remove_warning('4','msg_dsgn')">I am a Student<br/>
        <input type="checkbox" id="5" class="form-control" name="designation" value="Teacher" oninput="handleSignUp.remove_warning('5','msg_dsgn')">I am a Teacher<br/>
        <p id="msg_dsgn"></p>
</div>

<!-- textarea -->
<div class= "form-group">
        <label for="title">Tell us about yourself</label>
        <br/>
        <textarea name="user_intro" rows="10" cols="30" id="reqd_intro" oninput="handleSignUp.remove_warning('reqd_intro','msg_intro')">like...i love walking</textarea>
        <p id="msg_intro"></p>
</div>

 <!-- captcha --------------------------->
 <!-- <div class="g-recaptcha" data-sitekey="6LfUANUUAAAAAK3aKdWPf0o7rN0Y8IEavn3MJpKm" data-callback="verifyCaptcha"></div>
    <div id="g-recaptcha-error"></div> -->
    
<!-- button ------------------------>
<div class= "form-group">
        <!-- <input type="submit" class="btn btn-primary" name="add_user" value="Add User"> -->
        <button type="submit" class="btn btn-primary" name="add_user">Submit</button>
</div>
</form>