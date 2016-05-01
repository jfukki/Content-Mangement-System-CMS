<?php 
include 'includes/db.php';
if(isset($_POST['submit_contact'])){
$date = date('Y-m-d h:i:s');
$ins_sql = "INSERT INTO comments (name,email,subject,comment,date) VALUES 
('$_POST[name]','$_POST[email]','$_POST[subject]','$_POST[comment]','$date')";  
    
        
    $run_sql = mysqli_query($conn,$ins_sql);
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact-Us</title>
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
              <div class="page-header">
                  <h2>Contact Us Form</h2>
              </div>
              <form action="contact.php" method="post" class="form-horizontal"> 
              
              <div class="form-group">
                  <label for="name" class="col-sm-2">Name</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="name" placeholder="Insert Your Name" id="name">
                  </div>
              </div>
              
              <div class="form-group">
                  <label for="name" class="col-sm-2">Email</label>
                  <div class="col-sm-8">
                      <input type="email" class="form-control" name="email" placeholder="Insert Your Email" id="email">
                  </div>
              </div>
              
              <div class="form-group">
                  <label for="subject" class="col-sm-2">Subject</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="subject" placeholder="Subject" id="subject">
                  </div>
              </div>
              
              <div class="form-group">
                  <label for="comment" class="col-sm-2">Comment</label>
                  <div class="col-sm-8">
        <textarea name="comment" id="comment"  rows="10" style="resize:none;" class="form-control"></textarea>    
                  </div>
              </div>
              
              <div class="form-group">
                  <label for="name" class="col-sm-2"></label>
                  <div class="col-sm-8">
                     <input type="submit" value="Submit your form" name="submit_contact" class="btn btn-lg-block btn-danger" id="subject">
                  </div>
              </div>
              
              
              </form>
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