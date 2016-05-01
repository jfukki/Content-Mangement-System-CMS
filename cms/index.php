<?php session_start(); 

    include 'includes/db.php';
$login_err = "";

if(isset($_GET['login_error'])){
    if($_GET['login_error'] == 'empty'){
        $login_err = '<div class="alert alert-danger">User Name Or Password was empty</div>';
    }elseif ($_GET['login_error'] == 'wrong'){
          $login_err = '<div class="alert alert-danger">User Name Or Password was Wrong</div>';
    }elseif ($_GET['login_error'] == 'query_error'){
          $login_err = '<div class="alert alert-danger">Query Error</div>';
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
    <title>CMS</title>
     <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="bootstrapProject.css">
   <link rel="stylesheet" href="css/style.css">
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
       <?php echo $login_err;    ?>
        <article class="row">
            <section class="col-lg-8">
               <?php 
                $sel_sql = "SELECT * FROM posts WHERE status = 'published' ORDER BY id DESC LIMIT $start_form,$per_page";
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
                ?>
               
                           </section>
                           
             <?php 
                include 'includes/aside.php';
            
            ?>
           
        </article>
            <div class="text-center">
               <ul class="pagination">
        
           <?php
            $pagination_sql = "SELECT * FROM posts WHERE STATUS = 'published'";
            $run_pagination = mysqli_query($conn,$pagination_sql);
        
        $count = mysqli_num_rows($run_pagination);
        
        $total_pages = ceil($count/$per_page);        
        
        for($i=1;$i<=$total_pages;$i++){
            
            echo '  <li><a href="index.php?page='.$i.'">'.$i.'</a></li> ';
        }
        
        ?>
        
           
           
        </ul> 
        
        </div>
    </div>
    
   <?php 
   // include 'includes/footer.php';
    ?>
    
    
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>