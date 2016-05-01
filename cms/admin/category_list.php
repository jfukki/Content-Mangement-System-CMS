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


$resultt= '';


if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $sql = "DELETE FROM category WHERE c_id = '$del_id' ";
    if($runn = mysqli_query($conn,$sql)){
        $resultt = '<div class="alert alert-danger">Category Deleted</div>';
        
    }
}


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
          
      
       
       
        <div class="col-lg-8">
           <div class="panel panel-primary">
               <div class="panel-heading">
                  <h4>Categories</h4>
               </div>
              
             
               <div class="panel-body">
                   <table class="table table-stripped">
                       <thead>
                           <tr>
                               <th>S.NO</th>
                               <th>Category Name</th>
                               <th>Delete</th>
                               <th>Edit</th>
                               
                           </tr>
                       </thead>
                       <tbody>
                          <?php 
                           $select_category = "SELECT * FROM category";
                           $result_category = mysqli_query($conn,$select_category);
                           while($rows= mysqli_fetch_assoc($result_category)){
                               
                          echo '
                          
                          
                 ?edit_category='.$rows['c_id'].'         <tr>
                               <td>'.$rows['c_id'].'</td>
                               <td>'.$rows['category_name'].'</td>
                                 <th><a href="category_list.php?del_id='.$rows['c_id'].'" class="btn btn-danger  btn-xs">Delete </a></th>
                               <td><a href="?edit_category.php?cat_id='.$rows['c_id'].'" class="btn btn-warning  btn-xs">Edit</a></td>
                           </tr>
                           
                          
                          ';
                
                           }
                           
                           ?>
                                                
                      </tbody>
                   </table>
               </div>
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