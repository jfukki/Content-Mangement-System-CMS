<?php  session_start();
include 'includes/db.php';

if(isset($_SESSION['user']) && isset($_SESSION['password']) == true){
    
    $sel_sql= "SELECT * FROM users where user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'";
   
   
    if($run_sql = mysqli_query($conn,$sel_sql)){
       
        while($rows = mysqli_fetch_assoc($run_sql)){
         
            if(mysqli_num_rows($run_sql) == 1){
            
            if($rows['role'] == 'admin'){
                
            }else{  
                header('Location: ../index.php');     
            }
                
        }else{
           header('Location: ../index.php');
        }
            
        }
        
        
    }
    
} else{
           header('Location: ../index.php');
    
}


//Updating stauts

$result= '';
if(isset($_GET['new_status'])){
    $new_status = $_GET['new_status'];
    $sql = "UPDATE posts SET status = '$new_status' WHERE id = $_GET[id] ";
    if($run = mysqli_query($conn,$sql)){
        $result = '<div class="alert alert-success">Status Updated</div>';
        
    }
}


//Deleting Post

$resultt= '';


if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $sql = "DELETE FROM posts WHERE id = '$del_id' ";
    if($runn = mysqli_query($conn,$sql)){
        $resultt = '<div class="alert alert-danger">Post Deleted</div>';
        
    }
}


$per_page = 5;
if(isset($_GET["page"])){
    
 $page = $_GET["page"];   
}else{
    $page = 1;
}
$start_form = ($page-1) * $per_page;


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
    include '/includes/sidebar.php';
    
    ?>
    
   <div class="col-lg-10">
       <div class="clearfix"></div>
       
       <?php echo $result;
            echo $resultt;    
        ?>
       
       
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
                           <th>Status</th>
                           <th>Action</th>
                           <th>Edit Post</th>
                           <th>View Post</th>
                           <th>Delete Post</th>
                          </tr>
                           
                       </thead>
                       <tbody>
                         
                         <?php 
                           
                         //  $sql_post = "SELECT * FROM posts ORDER BY ID DESC";
                           $sql_post = "SELECT * FROM posts  JOIN users  ON posts.author = users.user_email ";
                           $run_post = mysqli_query($conn,$sql_post);
                           while($rows = mysqli_fetch_assoc($run_post)){
                               
                               echo '
                               
                                 <tr>
                               <td>'.$rows['id'].'</td>
                           <td>2015-10-21</td>
                           <td><img src="../'.$rows['image'] .'" alt="" width="100px">  </td>
                           <td>"'.$rows['title'].'"</td>
                           <td>"'.substr($rows['description'],0,100).'"........</td>
                           <td>"'.$rows['category'].'"</td>
                           <td>"'.$rows['user_f_name'].'_'.$rows['user_l_name'].'"</td> 
                           <td>"'.$rows['status'].'"</td>
                         <th>'.($rows['status']=='draft'?'<a href="post_list.php?new_status=published&id='.$rows['id'].'" class="btn btn-primary  btn-xs navbar-btn">Publish</a>': '<a href="post_list.php?new_status=draft&id='.$rows['id'].'" class="btn btn-info  btn-xs navbar-btn">Draft</a>').'</th>   
                         <th><a href="#" class="btn btn-warning btn-xs navbar-btn">Edit Post</a></th>
                           <th><a href="../post.php?post_id='.$rows['id'].'" class="btn btn-success btn-xs navbar-btn">View Post</a></th>
                           <th><a href="post_list.php?del_id='.$rows['id'].'" class="btn btn-danger btn-xs navbar-btn">Delete Post</a></th>
                           
    
                          </tr>
                        
                               
                               
                               
                               ';
                               
                           }
                           
                           ?>
                         
                        
                        
                         
                        
                       
                   
                        
                       </tbody>
                   </table>
               </div>
       </div>
    
    <div class="text-center">
               <ul class="pagination">
        
           <?php
            $pagination_sql = "SELECT * FROM posts WHERE STATUS = 'published'";
            $run_pagination = mysqli_query($conn,$pagination_sql);
        
        $count = mysqli_num_rows($run_pagination);
        
        $total_pages = ceil($count/$per_page);        
        
        for($i=1;$i<=$total_pages;$i++){
            
            echo '  <li><a href="post_list.php?page='.$i.'">'.$i.'</a></li> ';
        }
        
        ?>
        
           
           
        </ul> 
        
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