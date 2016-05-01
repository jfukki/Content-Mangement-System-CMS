<?php  session_start();
include 'includes/db.php';

if(isset($_SESSION['user']) && isset($_SESSION['password']) == true){
    
    $sel_sql= "SELECT * FROM users where user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'";
   
   
    if($run_sql = mysqli_query($conn,$sel_sql)){
        
        while($rows = mysqli_fetch_assoc($run_sql)){
            
       $name =  $rows['user_f_name'].' '.$rows['user_l_name'];
            $job = $rows['user_designation'];
            $gender = $rows['user_gender'];
            $contact_no = $rows['user_phone_no'];
            $email = $rows['user_email'];
            $role  = $rows['role'];
        
        if(mysqli_num_rows($run_sql) == 1){
            
            
        }else{
           header('Location: ../index.php');
        }
            
        }        
    }
    
} else{
           header('Location: ../index.php');
    
}



   //counting posts
           $sql_post = "SELECT * FROM posts WHERE status = 'published' ";
           $run_post = mysqli_query($conn,$sql_post
           );
           $total_posts = mysqli_num_rows($run_post);
            

//Counting categories
      $sql_cat = "SELECT * FROM category";
           $run_cat = mysqli_query($conn,$sql_cat
           );
           $total_category = mysqli_num_rows($run_cat);

//counting users

      $sql_users = "SELECT * FROM users ";
           $run_users = mysqli_query($conn,$sql_users
           );
           $total_users = mysqli_num_rows($run_users);
//counting comments

      $sql_comment = "SELECT * FROM comment WHERE status = 'published' ";
           $run_comment = mysqli_query($conn,$sql_comment
           );
          // $total_comment = mysqli_num_rows($run_comment);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
     <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="bootstrapProject.css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
     <script src="../../js.jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/npm.js"></script>
    <script src="js/bootstrap.js"></script>
   
    
    <script src="js/ie-emulation-modes-warning.js"></script>
    
</head>
<body>
  <?php 
    include '/includes/header.php';
    
    ?>
    
      <?php 
   echo $_SESSION['user'];
    include '/includes/sidebar.php';
    
    ?>
    
   <div class="col-lg-10">
      <!-- <div style="width:50px;height:50px;"></div>
           -->
      
       <div class="col-md-3">
          <?php 
        
           ?>
           <div class="panel panel-danger">
               <div class="panel-heading">
                   <div class="row">
                       <div class="col-xs-3"><i class="glyphicon glyphicon-signal"  style="font-size:4.5em"></i></div>
                       <div class="col-xs-9 text-right">
                       <div style="font-size:2.5em;"><?php echo $total_posts;?></div>
                       <div>Posts</div>
                       </div>
                       
                   </div>
               </div>
               <a href="post_list.php">
                   <div class="panel-footer">
                  <div class="pull-left"> View Post</div>
                  
                  <div class="pull-right"> <i class="glyphicon glyphicon-circle-arrow-left"></i></div>
                  <div class="clearfix"></div>
               </div>
                   
               </a>
               
           </div>
           
           
       </div>
       
       <!-- -->
       <div class="col-md-3">
           <div class="panel panel-primary">
               <div class="panel-heading">
                   <div class="row">
                       <div class="col-xs-3"><i class="glyphicon glyphicon-th-list"  style="font-size:4.5em"></i></div>
                       <div class="col-xs-9 text-right">
                       <div style="font-size:2.5em;"><?php echo $total_category;?></div>
                       <div>Categories</div>
                       </div>
                       
                   </div>
               </div>
               <a href="category_list.php">
                   <div class="panel-footer">
                  <div class="pull-left"> View Categories</div>
                  
                  <div class="pull-right"> <i class="glyphicon glyphicon-circle-arrow-left"></i></div>
                  <div class="clearfix"></div>
               </div>
                   
               </a>
               
           </div>
           
           
       </div>
       
       
       
       
       
       
       
       
       <!-- -->
       
       
       <div class="col-md-3">
           <div class="panel panel-warning">
               <div class="panel-heading">
                   <div class="row">
                       <div class="col-xs-3"><i class="glyphicon glyphicon-user"  style="font-size:4.5em"></i></div>
                       <div class="col-xs-9 text-right">
                       <div style="font-size:2.5em;"><?php echo $total_users; ?></div>
                       <div>Users</div>
                       </div>
                       
                   </div>
               </div>
               <a href="">
                   <div class="panel-footer">
                  <div class="pull-left"> View Users</div>
                  
                  <div class="pull-right"> <i class="glyphicon glyphicon-circle-arrow-left"></i></div>
                  <div class="clearfix"></div>
               </div>
                   
               </a>
               
           </div>
           
           
       </div>
       
       
       
       <!-- -->
       
       
       
       <div class="col-md-3">
           <div class="panel panel-info">
               <div class="panel-heading">
                   <div class="row">
                       <div class="col-xs-3"><i class="glyphicon glyphicon-comment"  style="font-size:4.5em"></i></div>
                       <div class="col-xs-9 text-right">
                       <div style="font-size:2.5em;"><?php  //$total_comment;?></div>
                       <div>Comments</div>
                       </div>
                       
                   </div>
               </div>
               <a href="#">
                   <div class="panel-footer">
                  <div class="pull-left"> View Comments</div>
                  
                  <div class="pull-right"> <i class="glyphicon glyphicon-circle-arrow-left"></i></div>
                  <div class="clearfix"></div>
               </div>
                   
               </a>
               
           </div>
           
           
       </div>
       
       <div class="clearfix"></div>
       
       <!--Top Block Ends -->
       
       <!-- Users Area -->
       
        <div class="col-lg-8">
           <div class="panel panel-primary">
               <div class="panel-heading">
                  <h4>Users List</h4>
               </div>
              
             
               <div class="panel-body">
                   <table class="table table-stripped">
                       <thead>
                           <tr>
                                                                                    <th>S.NO</th>
                               <th>Name</th>
                               <th>Roles</th>
                               
                           </tr>
                       </thead>
                       <tbody>
                         <?php 
                        $s = "select * from users  LIMIT 5";
                        $r = mysqli_query($conn,$s);
                               $number = 1;
                              while($rows = mysqli_fetch_assoc($run_users)){
                    
            echo '
                   <tr>
                               <td>'.$number.'</td>
                               <td>'.$rows['user_f_name'].''.$rows['user_l_name'].'</td>
                               
                               <td>'.$rows['role'].'</td>
                           </tr>
                         
            ';                      
                                  
                                $number++;  
                                  
                                  
                                  
                       
                              }
                               
                               
                               
                               ?>
   
                       </tbody>
                   </table>
               </div>
           </div>
           
           
       </div>
       
       <!--Profile area -->
        <div class="col-lg-4">
           
              <div class="panel panel-primary">
               <div class="panel-heading">
                   <div class="col-md-7">
                  <div class="page-header"><h4><?php echo $name?></h4></div>
              </div>
              
             <div class="col-md8">
                 <img src="images/cat.jpg" alt="" width="120px;" class="img-circle">
             </div>
              
               <div class="panel-body">
                   <table class="table table-condensed">
                       
                       <tbody>
                          
                            <tr>
                               <th>Job</th>
                               <td><?php echo $job; ?></td>
                           </tr>
                          
                           <tr>
                               <th>Role</th>
                               <td>><?php echo $_SESSION['role']; ?></td>
                           </tr>
                            
                             <tr>
                               <th>Email</th>
                               <td>><?php echo $email; ?></td>
                           </tr>
                            <tr>
                               <th>Contact</th>
                               <td>><?php echo $contact_no;?></td>
                           </tr>
                           
                           <tr>
                               <th>Gender</th>
                               <td>><?php echo $gender; ?></td>
                           </tr>
                         
                       </tbody>
                   </table>
               </div> 
                   
               </div>
              
           </div>
           
           
       </div>
       <div class="clearfix"></div>
       
       
       
       
       
       
       <!--Top lists Ends -->
       
       
       
       <div class="panel panel-primary">
           <div class="panel-heading"><h3>Latest Posts</h3></div>

               <div class="panel-body">
                   <table class="table">
                       <thead>
                          <tr>
                            <th>S.NO</th>
                           <th>Date</th>
                           <th>Image</th>
                           <th>Title</th>
                           <th>Description</th>
                           <th>Category</th>
                           <th>Author</th>
                          </tr>
                           
                       </thead>
                       <tbody>
                <?php 
                    
                  //  $sq = "SELECT * FROM posts WHERE author = '$_SESSION[user]' AND status = 'published' ";
                    $sq = "SELECT * FROM posts p join category c ON c.c_id = p.category WHERE p.author = '$_SESSION[user]' AND p.status = 'published' ";
                        $rs = mysqli_query($conn,$sq);
                           $number = 1;
    while($rows = mysqli_fetch_assoc($rs)){
        
        echo '
                              <tr>
                               <td>'.$number.'</td>
                           <td>'.$rows['date'].'</td>
                           <td><img src="../'.$rows['image'].'" alt="" width="100px">  </td>
                           <td>'.$rows['title'].'</td>
                           <td>'.substr($rows['description'],0,50).'....</td>
                           <td>'.ucfirst($rows['category_name']).'</td>
                           <td>'.$name.'</td>      
                          </tr>
        
        ';
        
        $number ++;
        
    }                       


                   ?>  
                        </tbody>
                   </table>
               </div>
       </div>
       
       <!-------------- COMMENTS Area ---------------->
       
         <div class="panel panel-primary">
           <div class="panel-heading"><h3>Latest Comments</h3>           </div>

               <div class="panel-body">
                   <table class="table">
                       <thead>
                          <tr>
                            <th>S.NO</th>
                           <th>Date</th>
                           <th>Author</th>
                           <th>Email</th>
                           <th>Post</th>
                           <th>Comments</th>
                          </tr>
                           
                       </thead>
                       <tbody>
                          <tr>
                             <td>1</td>
                           <td>2015-10-21</td>
                          <td>Michael</td>
                           <td>m@gmail.com</td>
                           <td>2</td>
                           <td>I like this post</td>                            </tr>
                           
                            <tr>
                             <td>2</td>
                           <td>2015-10-21</td>
                          <td>Michael</td>
                           <td>m@gmail.com</td>
                           <td>2</td>
                           <td>I like this post</td>                            </tr>
                           
                            <tr>
                             <td>3</td>
                           <td>2015-10-21</td>
                          <td>Michael</td>
                           <td>m@gmail.com</td>
                           <td>2</td>
                           <td>I like this post</td>                            </tr>
                           
                            <tr>
                             <td>4</td>
                           <td>2015-10-21</td>
                          <td>Michael</td>
                           <td>m@gmail.com</td>
                           <td>2</td>
                           <td>I like this post</td>                            </tr>
                            <tr>
                            
                             <td>5</td>
                           <td>2015-10-21</td>
                          <td>Michael</td>
                           <td>m@gmail.com</td>
                           <td>2</td>
                           <td>I like this post</td>                            </tr>
                           
                            <tr>
                             <td>6</td>
                           <td>2015-10-21</td>
                          <td>Michael</td>
                           <td>m@gmail.com</td>
                           <td>2</td>
                           <td>I like this post</td>                            </tr>
                          
                       </tbody>
                   </table>
               </div>
       </div>
       
       
   </div>
   
   
   <footer></footer>
   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>