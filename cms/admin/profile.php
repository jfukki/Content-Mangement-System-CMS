<?php  session_start();
include 'includes/db.php';

if(isset($_SESSION['user']) && isset($_SESSION['password']) == true){
    
    $sel_sql= "SELECT * FROM users where user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'";
   
   
    if($run_sql = mysqli_query($conn,$sel_sql)){
       
        while($rows = mysqli_fetch_assoc($run_sql)){
            $user_f_name = $rows ['user_f_name'];
            $user_l_name = $rows ['user_f_name'];
            $user_gender = $rows ['user_gender'];
            $user_marital_status = $rows ['user_marital_status'];
            $user_phone_no = $rows ['user_phone_no'];
            $user_designation = $rows ['user_designation'];
            $user_website = $rows ['user_website'];
            $user_address= $rows ['user_address'];
            $user_about_me= $rows ['user_about_me'];
            
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
     
        <div class="col-lg-12">
           
              <div class="panel panel-primary">
               <div class="panel-heading">
                   
              
             <div class="col-md-3">
                 <img src="images/cat.jpg" alt="" width="100%" class="img-thumbnail">
             </div>
             
             <div class="col-md-7">
                 <h4><u> <?php echo $user_f_name.' '.$user_l_name ?></u></h4>
                  <p><span class="glyphicon glyphicon-console"></span> <?php echo $user_designation ?></p>
                  <p><span class="glyphicon glyphicon-road"></span> <?php echo $user_address?></p>
                  <p><span class="glyphicon glyphicon-phone"></span> <?php echo $user_phone_no?></p>
                  <p><span class="glyphicon glyphicon-sunglasses"></span> <?php echo $_SESSION['user']?></p>
                  
                   </div>
                   <div class="clearfix"></div>
          
               </div>
              
           </div>
           
           
       </div>
       <div class="col-md-3">
           <div class="panel panel-default">
               <div class="panel-heading">
                   <table class="table table-condonsed">
                       <tbody>
                           <tr>
                               <th>Gender</th>
                               <td><?php echo ucfirst($user_gender)?></td>
                           </tr>
                           <tr>
                               <th>M.Status</th>
      <td><?php echo ucfirst( $user_marital_status);?></td>                     </tr>
                      <tr>
                          <th>Website</th>
                          <td><?php echo $user_website?></td>
                      </tr>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
       
        <div class="col-md-3">
           <div class="panel panel-default">
               <div class="panel-heading">
                   <table class="table table-condonsed">
                       <tbody>
                           <tr>
                             <td width="5%">1</td>
                              <td> <a href="#">Thie First Post</a></td>
                              
                           </tr>
                            <tr>
                             <td width="5%">1</td>
                              <td> <a href="#">Thie Second Post</a></td>
                              
                           </tr>
                     <tr>
                             <td width="5%">1</td>
                              <td> <a href="#">Thie Third Post</a></td>
                              
                           </tr>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
       
       
       <div class="col-md-6">
           <div class="panel panel-default">
               <div class="panel-heading">
                   <h4>About Me</h4>
                   <p><?php echo $user_about_me?> </p>
               </div>
           </div>
       </div>
       
       
    </div>
      
       <div class="clearfix"></div>

   <footer></footer>
   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>