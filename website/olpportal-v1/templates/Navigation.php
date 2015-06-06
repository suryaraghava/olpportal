<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
             #updatePwd { width:400px;height:220px }
             #labelPwd { color:#0033cc;font-size: 16px;margin-top:2%;margin-bottom:2%; }
             #label {  margin-top:1%;margin-bottom:1%;}
             #labelInput { margin-bottom:2%; }
        </style>
        <script>
            
          function opendropdown(){
                $(".dropdown-menu").dropdown("toggle");
              }
        </script>
    </head>
    <body>
        
        <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                       <?php   if(isset($_SESSION[constant("SESSION_USER_USERNAME")])) { ?>
                             <?php   if($_SESSION[constant("SESSION_USER_USERNAME")]=='Administrator') { ?>
                    
                                        <!-- Page : User Details -->
                                        <?php   if($page=="UserDetails") {?>
                                                <li class="active"><a href="user-details.php">User Details</a></li>
                                        <?php } else { ?>
                                                 <li><a href="user-details.php">User Details</a></li>
                                        <?php } ?>
                                     
                                        <!-- Page : User History --->
                                        <?php   if($page=="UserHistory") {?>
                                                <li class="active"><a href="user-history.php">User History</a></li>
                                        <?php } else { ?>
                                                <li><a href="user-history.php">User History</a></li>
                                        <?php } ?>
                                                
                                        <!-- Page : AdminTestResults --->
                                        <?php   if($page=="AdminTestResults") {?>
                                              <li class="active"><a href="admin-test-results.php">User Test Results</a></li>
                                        <?php } else { ?>
                                              <li><a href="admin-test-results.php">User Test Results</a></li>
                                        <?php } ?>
                                                
                       <?php } else { ?>
                                         
                                        <!-- Page : UserLanding Page -->
                                         <?php   if($page=="Home") {?>
                                            <li class="active"><a href="user-landing.php">Home</a></li>
                                        <?php } else { ?>
                                            <li><a href="user-landing.php">Home</a></li>
                                        <?php } ?>
                                            
                                        <!-- Page : PreviousTestResults --->
                                        <?php   if($page=="PreviousTestResults") {?>
                                             <li class="active"><a href="previous-test-results.php">Test Results</a></li>
                                        <?php } else { ?>
                                             <li><a href="previous-test-results.php">Test Results</a></li>
                                        <?php } ?>
                                             
                       <?php  } ?>

                       <?php   if($_SESSION[constant("SESSION_USER_USERNAME")]=='Administrator') { ?>
                                        
                                             <!-- Page : Manage Courses -->
                                             <?php   if($page=="ManageCourses") {?>
                                                    <li class="active"><a href="manage-courses.php">Manage Courses</a></li>
                                             <?php } else { ?>
                                                    <li><a href="manage-courses.php">Manage Courses</a></li>
                                             <?php } ?>
                                                    
                                              <!-- Page : Manage Tests -->  
                                              <?php   if($page=="ManageTest") {?>
                                                    <li class="active"><a href="manage-onlinetest.php">Manage Tests</a></li>
                                              <?php } else { ?>
                                                    <li><a href="manage-onlinetest.php">Manage Tests</a></li>
                                              <?php } ?>
                                                        
                        <?php } else {?>
                                           <!-- Page : Visited Courses --> 
                                            <?php   if($page=="VisitedCourses") {?>
                                                    <li class="active"><a href="visited-courses.php">Visited Courses</a></li>
                                            <?php } else { ?>
                                                    <li><a href="visited-courses.php">Visited Courses</a></li>
                                            <?php } ?>     
                                         
                                        <?php  } ?>
                        
                         <?php  } else { ?>
                                    
                             <!-- Page : Index Page -->
                               <?php if($page=="Index") { ?>
                                  <li class="active"><a href="index.php">Home</a></li>
                               <?php } else { ?>  
                                  <li><a href="index.php">Home</a></li> 
                               <?php } ?>
                                 
                                 
                             <!-- Page : Reports -->
                             <?php if($page=="Report") { ?>
                                <li class="active"><a href="reports.php">Reports</a></li>
                               <?php } else { ?>
                                <li><a href="reports.php">Reports</a></li>
                               <?php } ?>
                         <?php } ?>
                </ul>
             <?php  if(isset($_SESSION[constant("SESSION_USER_USERNAME")])) { ?>
                 <ul class="nav navbar-nav navbar-right right-margin">
             
             
             
                 <li class="user-info">Welcome  <span class="user-name"><?php if(isset($_SESSION[constant("SESSION_USER_USERNAME")])) echo $_SESSION[constant("SESSION_USER_USERNAME")]; ?></span></li>
                 <li><a href="php/logout.php">Logout</a></li>
                 <li class="active dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false"><span class="icon-cog"></span>Settings<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu" data-toggle="dropdown">
                         <li class="mychangedrop">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                                <!-- Update Password -->
                                 <div id="updatePwd" style="">
                                        <div id="labelPwd" align="center" class="col-xs-12"><B> Change Password </B> </div>
                                        <div id="label" class="col-xs-12"><B> Password </B> </div>
                                        <div id="labelInput" class="col-xs-12">
                                            <input id="input-Pwd"  type="password" class="form-control" placeholder="Enter password ... " onclick="opendropdown()"/>
                                        </div>
                                        <div  id="label" class="col-xs-12"><B> Re-enter Password </B> </div>
                                        <div  id="labelInput" class="col-xs-12">
                                           <input id="input-RePwd" type="password" class="form-control" placeholder="Enter Re-enter password ... "  onclick="opendropdown()"/>
                                        </div>
                                        <div  id="label" class="col-xs-12">
                                            <button class="btn btn-danger pull-right">Reset Password</button>
                                        </div>
                                 </div>
                            </a>
                         </li>
                    </ul>
                </li>
          </ul>
            <?php  } else { ?>
           <ul class="nav navbar-nav navbar-right right-margin">
            <li class="active"><a href="index.php"><span class="icon-login"></span>Login</a></li>
            <li class="separator"></li>
            <li class="active"><a href="index.php"><span class="icon-signup"></span>Sign Up</a></li>
         </ul>
           <?php } ?>
      </div>
        
         
    </body>
</html>
