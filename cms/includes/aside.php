 <aside class="col-lg-4">
               <form action="search.php" class="panel-group form-horizontal" role="form" >
                   <div class="panel panel-default">
                       <div class="panel-body">
                           <div class="panel-header">
                               <h4>Search SomeThing</h4>
                           </div>
                           <div class="form-group col-sm-10">
                           <div class="<input-group-btn">
                           
                           <input type="search" class="form-control" placeholder="Search Something...." name="search" >  
                        <button class="btn btn-primary" type="submit" name="search_submit"><i class="glyphicon glyphicon-search" ></i></button>       
                           </div>
                          
                           </div>
                           
                       </div>
                   </div>
               </form>
                <form action="accounts/login.php" role="form" class="panel-group form-horizontal" method="post">
                   <div class="panel panel-default">
                    <div class="panel-heading">
                            Login Area
                        </div>
                       <div class="panel-body">
                        
                        <div class="form-group">
                            <label for="username" class="control-label col-sm-4">User Name:</label>
                            <div class="col-sm-7">
                                <input type="text" id="username" class="form-control" placeholder="Insert Email Address" name="user_name">
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="password" class="control-label col-sm-4">Password:</label>
                            <div class="col-sm-7">
                                <input type="password" id="password" class="form-control" placeholder="Insert Password" name="password">
                            </div>
                        </div>
                          <div class="form-group">
                            
                            <div class="<col-sm-12></col-sm-12>">
                                <input type="submit"  class="form-control btn btn-success btn-block"  name="submit_login">
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <div class="list-group">
                   <?php 
                    
                    $sel_side = "SELECT * FROM posts ORDER BY id DESC LIMIT 4";
                    $run_side = mysqli_query($conn,$sel_side);
                    while($rows= mysqli_fetch_assoc($run_side)){
                     if(isset($_GET['post_id'])){
                         if($_GET['post_id'] == $rows['id']){
             $class = 'active';                
                         }else {
                             $class = '';
                         }
                     }else {
                         $class = '';
                     }
                        
                        echo '
                           
                        <a href="post.php?post_id='.$rows['id'].'" class="list-group-item '.$class.'">
                   <div class="col-sm-4">
                   <img src="'.$rows['image'].'" width="100%">
                   </div>
                   <div class="col-sm-8">
                   <h4 class="list-group-item-heading">'.$rows['title'].'</h4>
                    <p >'.substr($rows['description'],0,80).'.....</p>
                     </div>
                   <div style="clear:both"></div>
                   </a>
                   
                 
                        
                        ';
                    }
                    ?>
                    
            
                </div>
                
            </aside> 