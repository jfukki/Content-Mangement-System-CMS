    <header class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <a href="index.php" class="navbar-brand">CMS</a>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php">Home</a></li>
                <?php
                $sel_cat ="SELECT * FROM category";
                $run_cat= mysqli_query($conn,$sel_cat);
                while($rows = mysqli_fetch_assoc($run_cat)){
                    echo '<li><a href="menu.php?cat_id='.$rows['c_id'].'">'.ucfirst($rows['category_name']).'</a></li>';
                }
                ?>
                
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="registration.php">Registration</a></li>
                
            </ul>
        </div>
    </header>
   
    