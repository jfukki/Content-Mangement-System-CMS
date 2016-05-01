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
                           <th>Subject</th>
                           <th>Comments</th>
                           <th>Status</th>
                           <th>Delete</th>
                          </tr>
                           
                       </thead>
                       <tbody>
                         <?php 
                           $sql_comments = "SELECT * FROM comments";
                           $run_comments = mysqli_query($conn,$sql_comments);
                           $number = 1;
                           while($rows = mysqli_fetch_assoc($run_comments)){
                          echo '
                               
                                <tr>
                             <td>'.$number.'</td>
                           <td>'.$rows['date'].'</td>
                          <td>'.$rows['name'].'</td>
                           <td>'.$rows['email'].'</td>
                           <td>'.$rows['subject'].'</td>
                           <td>'.$rows['comment'].'</td>
                          <td><a href="#" class="btn btn-warning   btn-xs">Approve</a></td>
                       <td><a  href="#" class="btn btn-danger   btn-xs">Delete</a></td>
                   </tr>
                          
                          
                          ';     
                          
                            $number ++;       
                           }
                           
                           
                           
                           
                           
                           ?>
                         
                         
                         
                     
                           
                          
                          
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