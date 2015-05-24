
<?php session_start();
 require 'php/define.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="icon" href="">
    <title>::Samarthya::Online Learning Portal for Technical Staff under MGNREGA</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        #leftMenuContainer1, #leftMenuContainer2
        {
            display:none;
        }
        .questions-text, .text-muted
        {
           margin-bottom:2%; 
        }
    </style>
    <script type="text/javascript">
        var coursesList;
   
      function managecoursesload()
      {
          var result;
          $.ajax({type: "GET", 
                                    async: false,
                                    url: 'php/dac.courses.php',
                                    data: { 
                                        action : 'courseListOnly',
                                    },
                                    success: function(resp)
                                    {
                                          result=resp;
                                    }
                                   });
                                   var res=JSON.parse(result);
          coursesList=res;
          viewLeftMenu1();
          
      }
      
      function viewLeftMenu1()
      {
          document.getElementById("leftMenuContainer1").style.display='block';
          document.getElementById("leftMenuContainer2").style.display='none';
          
          adminGetCourseList();
          $("#leftMenu-1").addClass("active");
          $("#leftMenu-2").removeClass("active");
      }
      
      function adminGetCourseList()
        {
             var res=coursesList;
                 
               console.log("courses : "+res);
           
               var content='<table class="table table-responsiv table-bordered">';
                   content+='<thead>';
                   content+='<tr>';
                   content+='<th>S. No.</th>';
                   content+='<th>Course Name</th>';
                   content+='<th>Course Number</th>';
                   content+='</tr>';
                   content+='</thead>';
                   content+='<tbody>';
                  
                  for(var index=0;index<res.length;index++)
                  {
                      content+='<tr>'
                      content+='<td>'+(index+1)+'</td>';
                      content+='<td>'+res[index].courseName+'</td>';
                      content+='<td>'+res[index].courseNumber+'</td>';
                      content+='</tr>'
                  }
                  
                   content+='</tbody>';
                   content+='</table>';
                   content+='</div>';
                   
                   document.getElementById("leftMenuContainer1").innerHTML=content;
        }
      
      
      function viewLeftMenu2()
      {
          document.getElementById("leftMenuContainer1").style.display='none';
          document.getElementById("leftMenuContainer2").style.display='block';
          
          // Dynamic Mmenu
          
          var courseListing=document.getElementById("courseList");
          var p_option = document.createElement("option");
			 p_option.id = "";
			p_option.text = "Select a Course";
			p_option.value = "";
			courseListing.add(p_option);
            var res=coursesList;
            for(var ind=0;ind<res.length;ind++)
           {
                var option = document.createElement("option");
			option.id = res[ind].courseName;
			option.text = res[ind].courseName;
			option.value = res[ind].idCourses;
			courseListing.add(option);
               console.log("courseName : "+res[ind].courseName);
           }
            
          
          $("#leftMenu-1").removeClass("active");
          $("#leftMenu-2").addClass("active");
      }
      
      
      function viewCourseDetails()
      {
          var courseName=document.getElementById("view-courseName").value;
           var result="";
                 $.ajax({type: "GET", 
                                    async: false,
                                    url: 'php/dac.courses.php',
                                    data: { 
                                        action : 'viewCourseDetails',
                                        courseID :courseName,
                                       
                                    },
                                    success: function(resp)
                                    {
                                          result=resp;
                                    }
                                   });
               console.log("answers : "+result);
          
          var res=JSON.parse(result);
          var content='<table class="table table-responsiv table-bordered">';
                   content+='<thead>';
                   content+='<tr>';
                   content+='<th>S. No.</th>';
                   content+='<th>Title Name</th>';
                   content+='</tr>';
                   content+='</thead>';
                   content+='<tbody>';
                  
                  for(var index=0;index<res.length;index++)
                  {
                      content+='<tr>'
                      content+='<td>'+(index+1)+'</td>';
                      content+='<td>'+res[index].title+'</td>';
                      content+='</tr>'
                  }
                  
                   content+='</tbody>';
                   content+='</table>';
                   content+='</div>';
                   document.getElementById("view-courseDetails").style.display='block';
                   document.getElementById("view-courseDetails").innerHTML=content;
      }
    </script>
  </head>
  <body onload="managecoursesload()">
<div class="container page-wrapper">

<!--   ----------------------  Start  Header Content -----------------------    -->
<div class="container">
   <div class="col-xs-12 col-xs-6 col-md-8"><a href="#"><img class="img-responsive" src="images/samarthya-logo.jpg" alt="samarthya" /></a></div>
   <div class="col-xs-12 col-xs-6 col-md-4"><img class="img-responsive center-block right-align" src="images/emblem-img.jpg" alt="Indian Emblem" /></div>
</div>
<!--   ---------------------- End  Header Content -----------------------    -->

<!--   ---------------------- Start  Navigation -----------------------    -->

<nav class="navbar navbar-default">
   <div class="container">   
      <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
      </div>
  <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav">
                <li class="active"><a href="user-landing.php">Home</a></li>
                <?php   if($_SESSION[constant("SESSION_USER_USERNAME")]=='Administrator') { ?>
                <li><a href="dashboard.php">Dashboard</a></li>
                <?php } ?>
                <li><a href="previous-test-results.php">Previous Test Results</a></li>
                <li><a href="visited-courses.php">Visit Courses</a></li>

                <?php   if($_SESSION[constant("SESSION_USER_USERNAME")]=='Administrator') { ?>
                <li><a href="manage-courses.php">Manage Courses</a></li>
                <li><a href="visited-courses.php">Manage Online Tests</a></li>
                <?php } ?>
         </ul>
         <ul class="nav navbar-nav navbar-right right-margin">
             <li class="user-info">Welcome  
                 <span class="user-name">
                     <?php if(isset($_SESSION[constant("SESSION_USER_USERNAME")])) 
                         echo $_SESSION[constant("SESSION_USER_USERNAME")]; ?>
                 </span>
             </li>
         <li><a href="php/logout.php">Logout</a></li>
            <li class="active dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false"><span class="icon-cog"></span>Settings<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
               <li><a href="user-details.php">Profile</a></li>
            </ul>
            </li>
         </ul>
      </div>
   </div>
</nav>

<!--   ---------------------- End  Navigation -----------------------    -->


<!--   ---------------------- Start Home Page About Content -----------------------    -->
<br/>
<div class="container">
<div class="col-xs-12">
<h3 class="featurette-heading">MANAGE ONLINE TEST</h3>
      <hr class="featurette-divider">
</div>
</div>
<div class="container">
<div class="col-xs-12">

<p>
    "Mahatma Gandhi National Rural Employment Guarantee Act aims at enhancing the livelihood 
    security of people in rural areas by guaranteeing hundred days of wage employment in a financial
    year to a rural household whose adult members volunteer to do unskilled manual work" © 2015 NIRD Inc.
    All rights reserved. "Mahatma Gandhi National Rural Employment Guarantee Act aims at enhancing
    the livelihood security of people in rural areas by guaranteeing hundred days of wage employment
    in a financial year to a rural household whose adult members volunteer to do unskilled manual 
    work"
</p>
<br/>
</div>
   
    <div id="course-container" class="col-xs-12">
        <div class="col-xs-3">
        <ul class="nav nav-pills nav-stacked">
        <li id="leftMenu-1"><a href="#" onclick="viewLeftMenu1()">View Exam Questions</a></li>
        <li id="leftMenu-2"><a href="#" onclick="viewLeftMenu2()">Add Exam Questions</a></li>
       </ul>
        </div>
        
        <div class="col-xs-8">
        
            
            <!-- viewLeftMenu1 : View Courses-->
            <div id="leftMenuContainer1" class="panel panel-default">
               
            </div>
            
            <!-- viewLeftMenu2 : Add a Courses-->
            <div class="col-xs-12" id="leftMenuContainer2">
                <div class="row">
                    <div class="col-xs-12">
                        <h4><B>Add Examination Questions</B></h4><hr/>
                    </div>
                </div>
                <div id="form-Div" class="row" style="">
                   <div class="col-xs-12">
 
          <div class="questions-text">
              <span class="text-muted">Course:</span>
              <select id="courseList" class="form-control"></select>
          </div>
          <div class="questions-text">
              <span class="text-muted">Test Type:</span>
                   <div class="checkbox">
                         <label>
                             <input type="checkbox" name="quiz" id="C_PreTest" value="Pre Test">
                             Pre-Test
                         </label>
                   </div>
                   <div class="checkbox">
                         <label>
                             <input type="checkbox" name="quiz" id="C_PostTest" value="Post Test">
                             Post-Test
                         </label>
                   </div>
           </div>
            <div class="questions-count">
                <span class="text-muted">Question:</span>
            </div>
            <div class="questions-text">
                <input type="text" class="form-control" id="AddQuestion" placeholder="Add a Question"/>
            </div>
   
            
            <!--form role="form" name="quizform" action="quiztest.asp?qtest=HTML" method="post"-->
                <div id="qtest-option" class="multiple-choice">
                   <div class="radio">
                         <label>
                             <input type="radio" id="C_Option1" name="quiz"  value="1">
                             <input type="text" id="T_Option1" class="form-control" placeholder="Option-1"/>
                         </label>
                   </div>
                   <div class="radio">
                        <label>
                            <input type="radio" id="C_Option2"  name="quiz"  value="1">
                            <input type="text" id="T_Option2" class="form-control" placeholder="Option-2"/>
                        </label>
                    </div> 
                    <div class="radio">
                         <label>
                             <input type="radio" id="C_Option3" name="quiz"  value="1">
                             <input type="text" id="T_Option3" class="form-control" placeholder="Option-3"/>
                         </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" id="C_Option4" name="quiz"  value="1">
                            <input type="text" id="T_Option4" class="form-control" placeholder="Option-4"/>
                        </label>
                    </div> 
                </div>
	<br>
        <div class="questions-text">
              
                   <div class="checkbox">
                         <label>
                             <input type="checkbox" name="quiz" id="activeQuestion" value="1">
                             <span class="text-muted">Active Question</span>
                         </label>
                   </div>
               
           </div>
     <button class="btn btn-default pull-right" onclick="AddQuestionOnSubmit()"> Submit  </button>	
	<!--/form-->
    <br/>
     
   </div>
                </div>
               
            </div>
           
            
            
        </div>
    </div>
</div>

<!--   ---------------------- Start Details Page video Content -----------------------    -->


    
    <!--   ---------------------- End Details Page video Content -----------------------    -->
    
    <!--   ---------------------- Start Footer Page Content -----------------------    -->
    
    <div class="container">
       <hr class="featurette-divider footerdivider">
       <div class="col-xs-12 col-md-7">
       <ul class="nav navbar-nav footer-menu">
          <li class="active"><a href="user-landing.php">Home</a></li>
          <li>|</li>
          <li class="active"><a href="user-landing.php">Courses</a></li>
          <li>|</li>
          <li class="active"><a href="contact.php">Contact Us</a></li>   
       </ul>
       </div>
       <div class="col-xs-12 col-md-5">
          <ul class="nav navbar-nav social-menu">
          <li class="followus">Follow Us</li>
          <li><a href="#"><img src="images/facebook-icon.png" /></a></li>
          <li><a href="#"><img src="images/twitter-icon.png" /></a></li>
          <li><a href="#"><img src="images/pinterest-icon.png" /></a></li>
      <li><a href="#"><img src="images/flickr-icon.png" /></a></li>
      <li><a href="#"><img src="images/youtube-icon.png" /></a></li>
      </ul>
   </div>
</div>
<footer><div align="center" class="container">&copy; 2015 Copyright | ONLINE COURSES.</div></footer>

</div>
      
      
<!--   ---------------------- End Footer Page Content -----------------------    -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>