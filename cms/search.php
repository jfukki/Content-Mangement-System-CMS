<?php 
include 'includes/db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS SYSTEM</title>
     <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="bootstrapProject.css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
    
    <script src="js/ie-emulation-modes-warning.js"></script>
</head>
<body>
  
    <?php 
include 'includes/header.php';
?>
      
    <div class="container">
        <article class="row">
          <section class="col-lg-8">
                                                    <?php 
              
              if(isset($_GET['search_submit'])){
              
                  
                    $sel_sql = "SELECT * FROM posts WHERE title LIKE '%$_GET[search]%' or description LIKE '%$_GET[search]%'";
                $run_sql= mysqli_query($conn,$sel_sql);
                while($rows = mysqli_fetch_assoc($run_sql)){
                    echo '
                    
                     <div class="panel panel-success">
                    <div class="panel-heading">
                          <h3>  <a href="post.php?post_id='.$rows['id'].'">'.$rows['title'].'</a></h3>
                      </div>
                    <div class="panel-body">
                     <div class="col-lg-4">
                      <img src="'.$rows['image'].'" alt="" width="100%">   
                     </div>
                    <div class="col-lg-8">
                     
                      <p>'.substr($rows['description'],0,600).'.......</p>  
                    </div>  
                      <a href="post.php?post_id='.$rows['id'].'" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                    
                    ';
          }
              
            }
        ?>
               
     
   
            
            </section>      
            
            
             <?php 
include 'includes/aside.php';
?> 
            
        </article>
    </div>    
         
          
    <?php 
include 'includes/footer.php';
?>
          
          
</body>
</html>