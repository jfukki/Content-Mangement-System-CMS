<?php 
include 'includes/db.php';

 $match = " ";

if(isset($_POST['submit_user'])){
    
    if($_POST['password'] == $_POST['con_password']){
        
        $date = date('Y-m-d h:i:s');
        
        $ins_sql = "INSERT INTO users (role,user_f_name,user_l_name,user_email,user_password,user_gender,user_marital_status,user_phone_no,user_address,user_designation,user_website,user_about_me,user_date) VALUES ('subscriber','$_POST[first_name]','$_POST[last_name]','$_POST[email]','$_POST[password]','$_POST[gender]','$_POST[marital_status]','$_POST[phone_no]','$_POST[address]','$_POST[designation]','$_POST[user_website]','$_POST[about_me]','$date')";
        
    $ins_sql = mysqli_query($conn,$ins_sql);    
     
        echo '<div class="alert alert-success">Congratulations Now You&acute;r Member Of This System </div>';
        
        
    }else {
        $match = '<div class="alert alert-danger">Password doesn&acute;t match</div>';
    }
    
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
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

      <?php 
        echo $match;
    ?>      
    <div class="container">
        <article class="row">
          <section class="col-lg-8">
              <div class="page-header">
                  <h2>Registration Form</h2>
              </div>
              <form action="registration.php" method="post" class="form-horizontal"> 
              
              <div class="form-group">
                  <label for="name" class="col-sm-2">First Name</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="first_name" placeholder="Insert Your Name" id="name">
                  </div>
              </div>
              
              <div class="form-group">
                  <label for="last_name" class="col-sm-2">Last Name</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="last_name" placeholder="Insert Your Name" id="name">
                  </div>
              </div>
              
              
              
              <div class="form-group">
                  <label for="email" class="col-sm-2">Email</label>
                  <div class="col-sm-8">
                      <input type="email" class="form-control" name="email" placeholder="Insert Your Email" id="email">
                  </div>
              </div>
              
                <div class="form-group">              
                  <label for="password" class="col-sm-2">Password</label>
                  <div class="col-sm-8">
                      <input type="password" class="form-control" name="password" placeholder="Password" id="pasword">
                  </div>
              </div>
                
<div class="form-group">
                                 <label for="con_password" class="col-sm-2">Confirm Password</label>
                  <div class="col-sm-8">
                      <input type="password" class="form-control" name="con_password" placeholder="Confrim Password" id="con_password">
                  </div>
              </div>
              
              <div class="form-group">
              
                           <label for="gender" class="col-sm-2">Gender</label>
                  <div class="col-sm-4">
                    
                     <select name="gender" id="" class="form-control">
                         <option value="">Select Gender</option>
                         <option value="male">Male</option>
                         <option value="female">Female</option>
                     </select>
                  </div>
             
                           <label for="marital_status" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-3">
                    
                     <select name="marital_status" id="" class="form-control">
                         <option value="">Select Status</option>
                         <option value="married">Married</option>
                         <option value="single">Single</option>
                         <option value="divorced">Divorced</option>
                     </select>
                  </div>
              </div>
              
              
    <div class="form-group">
                                 <label for="phone_no" class="col-sm-2">Phone Number</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="phone_no" placeholder="Inset Your Contact Number" id="number">
                  </div>
              </div>          
              
              
              
              
      
    <div class="form-group">
                                 <label for="designation" class="col-sm-2">Designation</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="designation" placeholder="Inset Your Designation" id="designation">
                  </div>
              </div>        
              
                          
                                      
    <div class="form-group">
                                 <label for="Website" class="col-sm-2">Website</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="user_website" placeholder="Inset Your Website" id="Website">
                  </div>
              </div>                                                       
                                                                          
              
 <div class="form-group">
                                 <label for="address" class="col-sm-2">Address</label>
                  <div class="col-sm-8">
                      <textarea name="address" id="address" cols="70" rows="6"></textarea>
                  </div>
              </div> 
             
             
             <div class="form-group">
                                 <label for="about_me" class="col-sm-2">About Me</label>
                  <div class="col-sm-8">
                      <textarea name="about_me" id="address" cols="70" rows="8"></textarea>
                  </div>
              </div> 
             
             
              <div class="form-group">
                  <label for="submit_user" class="col-sm-2"></label>
                  <div class="col-sm-8">
                     <input type="submit" value="Register YourSelf" name="submit_user" class="btn btn-lg-block btn-danger" id="submit_user">
                  </div>
              </div>
              
              
              </form>
          </section>      
            
            
             <?php 
include 'includes/aside.php';
?> 
            
        </article>
    </div>    
         
          
          
</body>
</html>