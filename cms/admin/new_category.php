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


$result = "";
if(isset($_POST['submit_category'])){
    $category = strip_tags($_POST['category']);
    $sql = "INSERT INTO category (category_name) VALUES ('$category')";
    if(mysqli_query($conn,$sql)){
        $result = '<div class="alert alert-success">You created a new category</div>';
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
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

   
    
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
     
         <?php echo $result?> 
          <div class="page-header"><h2>New Category</h2></div>
          <div class="container-fluid">
                   <form action="new_category.php" method="post" class="form-horizontal col-lg-5"  enctype="multipart/form-data">
         
          
          
          <div class="form-group">
              <label for="category" class="label-control">Category</label>
              <input type="text" id="category" name="category" class="form-control">
          </div>
          
          
        
          
         
          
          
 <div class="form-group">
             
              <input type="submit" id="submit" name="submit_category" class="btn btn-danger btn-block">
          </div>
          
          
          
          
      </form>        
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