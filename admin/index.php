<?php include 'includes/header.php'?>

    <div id="wrapper">

    <?php 
    if($conn){
    echo "connected successfully!!";
    }
    ?>

        <!-- Navigation -->
        <?php include 'includes/navigation.php'?>
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin


                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->


       
                <!-- /.row -->
                
                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

<?php //counting no. of posts
$query="SELECT * FROM posts";
$result=mysqli_query($conn,$query);
$post_counts=mysqli_num_rows($result);

echo "<div class='huge'>{$post_counts}</div>";

// $query="SELECT count(post_id) FROM posts";
// $result=mysqli_query($conn,$query);
// //$post_counts=mysqli_num_rows($result);
// //echo "$result";
// //print_r($result);
// echo "<div class='huge'>'{$result->num_rows()}'</div>";

?>

                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php //counting no. of comments
$query="SELECT * FROM comments";
$result=mysqli_query($conn,$query);
$comment_counts=mysqli_num_rows($result);

echo "<div class='huge'>{$comment_counts}</div>";

?>
                    
                     
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                   

<?php //counting no. of users
$query="SELECT * FROM user";
$result=mysqli_query($conn,$query);
$user_counts=mysqli_num_rows($result);

echo "<div class='huge'>{$user_counts}</div>";



?>

                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php //counting no. of categories
$query="SELECT * FROM categories";
$result=mysqli_query($conn,$query);
$category_counts=mysqli_num_rows($result);

echo "<div class='huge'>{$category_counts}</div>";



?>

                       
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->

<?php

$query ="SELECT * FROM posts WHERE post_status='draft'";
$result=mysqli_query($conn,$query);
$post_draft_counts=mysqli_num_rows($result);

$query ="SELECT * FROM comments WHERE comment_status='Unapproved'";
$result=mysqli_query($conn,$query);
$unapprove_count=mysqli_num_rows($result);

$query ="SELECT * FROM user WHERE user_role='Subscriber'";
$result=mysqli_query($conn,$query);
$subscriber_count=mysqli_num_rows($result);

?>




<div class="row">

<!-- Chart -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
          
          <?php //Putting data into chart
          $element_text=['All Posts','Draft Posts','Comments','Pending Comments','Users','Subscribers','Categories'];
          $element_count=[$post_counts,$post_draft_counts,$comment_counts,$unapprove_count,$user_counts,$subscriber_count,$category_counts];

          for($i=0;$i<7;$i++){
              echo "['{$element_text[$i]}'".","."{$element_count[$i]}],";
          }
          
          
          ?>

          //['Posts', 1000],
         
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
     <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>


</div>




            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


    <?php include 'includes/footer.php'?>