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

$error = '';



//filtering html tags

if(isset($_POST['submit_post'])){
    $date = date('Y-m-d h:i:s');
    $title = strip_tags($_POST['title']);
    //uploader
    if($_FILES['image']['name'] != ''){
        $date = date('Y-m-d h:i:s');
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_ext = pathinfo($image_name,PATHINFO_EXTENSION);
        $image_path = '../images/'.$image_name;
        $image_db_path = 'images/'.$image_name;
        $status= $_POST['status'];
        
        if($image_size < 1000000){
            if($image_ext == 'jpg' || $image_ext == 'png' || $image_ext == 'gif' ){
            if(move_uploaded_file($image_tmp,$image_path)){
                $ins_sql = "INSERT INTO posts (title,description,image,category,status,date,author) VALUES ('$title','$_POST[description]','$image_db_path','$_POST[category]','$status','$date','$_SESSION[user]')";
                if(mysqli_query($conn,$ins_sql)){
                    header('post_list.php');
                }else{
                    $error = '<div class="alert alert-danger">The Query was not working</div>';
                }
            }else{
                $error = '<div class="alert alert-danger">In-correct Image Format</div>'; 
            }
                
            }else{
                $error = '<div class="alert alert-danger">Image file size is bigger </div>';
            }
        }else{
            $image_err = 'Image File Size Is Bigger';
        }
        
    }else{
        $ins_sql = "INSERT INTO posts (title,description,category,date,author) VALUES ('$title','$_POST[description]','$_POST[category]','$date','$_SESSION[user]')";
        
        if(mysqli_query($conn,$ins_sql)){
                    header('post_list.php');
                }else{
                    $error = '<div class="alert alert-danger">The Query was not working</div>';
                }
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
    
      <?php echo $error;
    include '/includes/sidebar.php';
    
    ?>
    
   <div class="col-lg-10">
      
          <div class="page-header"><h2>New Post</h2></div>
          <div class="container-fluid">
                   <form action="new_post.php" method="post" class="form-horizontal"  enctype="multipart/form-data">
          <div class="form-group">
              <label for="image" class="label-control">Upload an image</label>
              <input type="file" id="image" name="image" class="btn btn-primary">
          </div>
          
          
          <div class="form-group">
              <label for="title" class="label-control">Title</label>
              <input type="text" id="title" name="title" class="form-control" required>
          </div>
          
          
           <div class="form-group">
              <label for="category" class="label-control">Category</label>
              <select name="category" id="category" class="form-control" required>
                <option value="">Select Any Category</option>
                 <?php 
                  
                  $sel_sql = "SELECT * FROM category";
                  $run_sql = mysqli_query($conn,$sel_sql);
                  while($rows = mysqli_fetch_assoc($run_sql)){
                      echo '<option value="'.$rows['c_id'].'">'.ucfirst($rows['category_name']).'</option>';
                  }
                  ?>
              </select>
          </div>
          
          
           <div class="form-group">
              <label for="description" class="label-control">Description</label>
              <textarea name="description" id="description" cols="60" rows="6"  ></textarea>
          </div>
          
          
           <div class="form-group">
              <label for="status" class="label-control">Status</label>
              <select name="status" id="status" class="form-control">
                  <option value="draft">Draft</option>
                  <option value="published">Publish</option>
              </select>
          </div>
          
          
          
 <div class="form-group">
              <label for="submit" class="label-control">Title</label>
              <input type="submit" id="submit" name="submit_post" class="btn btn-danger btn-block">
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