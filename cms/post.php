<?php 


include 'includes/db.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS</title>
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
                 
                if(isset($_GET['post_id'])){
                       $sel_sql="SELECT * FROM posts where id = '$_GET[post_id]'";
                $run_sql=mysqli_query($conn,$sel_sql);
                while($rows = mysqli_fetch_assoc($run_sql)){
                    
                    echo '
                     <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="panel-header">
                          <h2>'.$rows['title'].'</h2>
                      </div>
                      <img src="'.$rows['image'].'" alt="" width="100%">
                      <p>'.$rows['description'].'</p>
                    </div>
                </div>
                    
                    ';
                }
                }else{
                 echo   '<div class="alert alert-danger">Not Found</div>';
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
    
    
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>