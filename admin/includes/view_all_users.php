<!-- don't show password -->
<!-- Table headings -->

<table class="table">
    <thead>
    <th>id</th>
    <th>User Name</th>
    <th>Password</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Date of Birth</th>
    <th>City</th>
    <th>Designation</th>
    <th>Intro</th>
    <th>Image</th>
    <th>Role</th>
    </thead>
    <tbody>


    <?php
    
//Fetching data from database
    $query="SELECT * FROM user";
    $result=mysqli_query($conn,$query);
    confirm($result);
    //echo "<br>What is in result?";
    // print_r($result);
    //  echo "<br>----------------------------------------------------------------------<br>";
    // $count=0;
    // print_r(mysqli_fetch_assoc($result));
    // echo "<br>----------------------------------------------------------------------<br>";
    // print_r(mysqli_fetch_assoc($result));
    // echo "<br>----------------------------------------------------------------------<br>";

    while($row=mysqli_fetch_assoc($result)){
        // $count=$count+1;
        // echo "<br> loop no. $count";
        // print_r($row);

        $user_id=$row['user_id'];
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

        //displaying all fetched data
        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$user_name}</td>";
        echo "<td>{$user_password}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td>{$user_gender}</td>";
        echo "<td>{$user_bday}</td>";
        echo "<td>{$user_city}</td>";
        echo "<td>{$user_designation}</td>";
        echo "<td>{$user_intro}</td>";
        echo "<td><img width='100' src='../images/$user_image' alt='image'></td>";
        echo "<td>{$user_role}</td>";
        echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
        echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
        echo "<td><a href='users.php?delete&p_id=$user_id'>DELETE</a></td>";
        echo "<td><a href='users.php?source=edit_user&p_id={$user_id}'>EDIT</a></td>";
        echo "</tr>";

    }

    //DELETE Query -----can put in a function
    if(isset($_GET['delete'])){
    $p_id=$_GET['p_id'];

    $query="DELETE FROM user WHERE user_id=$p_id";
    $result=mysqli_query($conn,$query);
    confirm($result);
    header("Location: users.php");
    }

    if(isset($_GET['change_to_admin'])){
        $the_user_id=$_GET['change_to_admin'];
            $query="UPDATE user SET user_role='Admin' WHERE user_id=$the_user_id";
            $result=mysqli_query($conn,$query);
            header("Location: users.php");
                if(!$result){
                die("QUERY FAILED".mysqli_error($conn));
            }
    
    }
    
 
    if(isset($_GET['change_to_sub'])){
        $the_user_id=$_GET['change_to_sub'];
            $query="UPDATE user SET user_role='Subscriber' WHERE user_id=$the_user_id";
            $result=mysqli_query($conn,$query);
            header("Location: users.php");
                if(!$result){
                die("QUERY FAILED".mysqli_error($conn));
            }
    
    }
    
    ?>
    </tbody>
</table>