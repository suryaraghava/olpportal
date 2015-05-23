<?php session_start();
 require 'php/define.php';
 if(isset($_SESSION[constant("SESSION_USER_USERNAME")]))
 {
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
     <script>
        function getCoursesListAfterLogin()
        {
             var result="";
                 $.ajax({type: "GET", 
                                    async: false,
                                    url: 'php/dac.courses.php',
                                    data: { 
                                        action : 'courseListOnly'
                                    },
                                    success: function(resp)
                                    {
                                          result=resp;
                                    }
                                   });
                                   
                                   //console.log("result :"+result);
                                   var res=JSON.parse(result);
                             var content='';
                             for(var index=0;index<res.length;index++)
                             {
                                 content+='<div id="course-content" class="col-xs-12 col-xs-6 col-md-3">';  
                                 content+='<div class="course-box">';     
                                 content+='<div class="course-header"><h5 class="course-title">Course '+res[index].idCourses+'</h5></div>';
                                 content+='<div align="center" class="course-img"><img src="'+res[index].courseImage+'" />';
                                 content+='</div>';
                                 content+='<div class="course-footer"><a href="#">'+res[index].courseName+'<img src="images/course-arrow.png" class="pull-right" /></a></div>';
                                 content+=' </div>';
                                 content+='<div class="course-menu">';
                                 content+='<ul>';
                                 content+='<li><span class="course-subTag" onclick="javascript:preTestforCourse(\''+res[index].courseName+'\',\''+res[index].idCourses+'\',\'preTest\' )">';
                                 content+='Take a Pretest</span></li>';
                                 content+='<li><span class="course-subTag" onclick="javascript:preTestforCourse(\''+res[index].courseName+'\',\''+res[index].idCourses+'\',\'Details\' )">Details</a></li>';
                                 content+='<li><span class="course-subTag" onclick="javascript:preTestforCourse(\''+res[index].courseName+'\',\''+res[index].idCourses+'\',\'Module\' )">Go to Module</a></li>';
                                 content+='<li><span class="course-subTag" onclick="javascript:preTestforCourse(\''+res[index].courseName+'\',\''+res[index].idCourses+'\',\'Assessment\' )">Go for Assessment</a></li>';
                                 content+='</ul>';
                                 content+='</div>';
                                 content+='</div>';
                                 // pre-test.php
                             }
                             
           document.getElementById("view-courses-list").innerHTML=content;
          
        }
        function preTestforCourse(courseName, courseId, link)
        {
            // Check for Tesr Taken Or Not 
           // link='preTest';
            var response;
             $.ajax({type: "GET", 
                                    async: false,
                                    url: 'php/dac.courses.php',
                                    data: { 
                                        action : 'CheckForTest',
                                        courseId:courseId
                                    },
                                    success: function(resp)
                                    {
                                          response=resp;
                                    }
                                   });
            var res=JSON.parse(response);
            var flag=false;
            for(var ind=0;ind<res.length;ind++)
            {
                console.log(res[ind].testTaken);
                if(res[ind].testTaken==='1')
                {
                    flag=true;
                    
                }
            }
            
            if(flag)
            {
                if(link==='preTest') {
                  alert("Already your Pre-Test is Completed..!!!");
                }
                else if(link==='Details')
                {
                    window.location.href='details.php';
                }
                else if(link==='Module')
                {
                     window.location.href='#';
                }
                 else if(link==='Assessment')
                {
                     window.location.href='assessment.php';
                }
    } else {
             var result="";
                 $.ajax({type: "GET", 
                                    async: false,
                                    url: 'php/sessions.php',
                                    data: { 
                                        action : 'SetCourseSession',
                                        courseName : courseName,
                                        courseId : courseId
                                    },
                                    success: function(resp)
                                    {
                                          result=resp;
                                    }
                                   });
           window.location.href='pre-test.php'; // Page Redirect  
            }
        }
        
        function checkpreTestCompletedOrNot()
        {
            
            
        }
    </script>
    <style>
        .course-subTag
        {
            cursor:pointer;
        }
         #course-content
         {
             margin-bottom:1%;
         }
    </style>
  </head>
<body onload="getCoursesListAfterLogin()">

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
            <li><a href="previous-test-results.php">Previous Test Results</a></li>
            <li><a href="visited-courses.php">Visited Courses</a></li>
         </ul>
         <ul class="nav navbar-nav navbar-right right-margin">
             <li class="user-info">Welcome  <span class="user-name"><?php if(isset($_SESSION[constant("SESSION_USER_USERNAME")])) echo $_SESSION[constant("SESSION_USER_USERNAME")]; ?></span></li>
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
      <h3 class="featurette-heading">COURSES</h3>
      <hr class="featurette-divider">
         <p>"Mahatma Gandhi National Rural Employment Guarantee Act aims at enhancing the livelihood security of people in rural areas by guaranteeing hundred days of wage employment in a financial year to a rural household whose adult members volunteer to do unskilled manual work" © 2015 NIRD Inc. All rights reserved. "Mahatma Gandhi National Rural Employment Guarantee Act aims at enhancing the livelihood security of people in rural areas by guaranteeing hundred days of wage employment in a financial year to a rural household whose adult members volunteer to do unskilled manual work"</p>
<p>
     "Mahatma Gandhi National Rural Employment Guarantee Act aims at enhancing the livelihood security of people in rural areas by guaranteeing hundred days of wage employment in a financial year to a rural household whose adult members volunteer to do unskilled manual work" © 2015 NIRD Inc. All rights reserved. "Mahatma Gandhi National Rural Employment Guarantee Act aims at enhancing the livelihood security of people in rural areas by guaranteeing hundred days of wage employment in a financial year to a rural household whose adult members volunteer to do unskilled manual work"
</p>
<br/>
</div>
</div>
<div id="view-courses-list" class="container">
    <!--div class="col-xs-12 col-xs-6 col-md-3">
    <div class="course-box">
    <div class="course-header"><h5 class="course-title">Course I</h5></div>
    <div align="center" class="course-img"><img src="images/course-i-img.jpg" />
    </div>
    <div class="course-footer"><a href="#">Natural resources management<img src="images/course-arrow.png" class="pull-right" /></a></div>
    <div class="course-menu">
    <ul>
    <li><a href="pre-test.php">Take a Pretest</a></li>
    <li><a href="details.php">Details</a></li>
    <li><a href="#">Go to Module</a></li>
    <li><a href="assessment.php">Go for Assessment</a></li>
    </ul>
    </div>
    </div>   
    </div>
    
    <div class="col-xs-12 col-xs-6 col-md-3">
    <div class="course-box">
    <div class="course-header"><h5 class="course-title">Course II</h5></div>
    <div align="center" class="course-img"><img src="images/course-ii-img.jpg" />
    </div>
    <div class="course-footer"><a href="#">Community/Individual assets<img src="images/course-arrow.png" class="pull-right" /></a></div>
    <div class="course-menu">
    <ul>
    <li><a href="pre-test.php">Take a Pretest</a></li>
    <li><a href="details.php">Details</a></li>
    <li><a href="#">Go to Module</a></li>
    <li><a href="assessment.php">Go for Assessment</a></li>
    </ul>
    </div>
    </div>   
    </div>
    
    <div class="col-xs-12 col-xs-6 col-md-3">
    <div class="course-box">
    <div class="course-header"><h5 class="course-title">Course III</h5></div>
    <div align="center" class="course-img"><img src="images/course-iii-img.jpg" />
    </div>
    <div class="course-footer"><a href="#">Common infrastructure<img src="images/course-arrow.png" class="pull-right" /></a></div>
    <div class="course-menu">
    <ul>
    <li><a href="pre-test.php">Take a Pretest</a></li>
    <li><a href="details.php">Details</a></li>
    <li><a href="#">Go to Module</a></li>
    <li><a href="assessment.php">Go for Assessment</a></li>
    </ul>
    </div>
    </div>   
    </div>
    
    <div class="col-xs-12 col-xs-6 col-md-3">
    <div class="course-box">
    <div class="course-header"><h5 class="course-title">Course IV</h5></div>
    <div align="center" class="course-img"><img src="images/course-iv-img.jpg" />
    </div>
    <div class="course-footer"><a href="#">Rural infrastructure<img src="images/course-arrow.png" class="pull-right" /></a></div>
    <div class="course-menu">
    <ul>
    <li><a href="pre-test.php">Take a Pretest</a></li>
    <li><a href="details.php">Details</a></li>
    <li><a href="#">Go to Module</a></li>
    <li><a href="assessment.php">Go for Assessment</a></li>
    </ul>
    </div>
    </div>   
    </div-->

    </div>
      <br/>
      <br/>
      <br/>
<!--   ---------------------- Start Details Page video Content -----------------------    -->


    
    <!--   ---------------------- End Details Page video Content -----------------------    -->
    
    <!--   ---------------------- Start Footer Page Content -----------------------    -->
    
    <div class="container">
       <hr class="featurette-divider footerdivider">
       <div class="col-xs-12 col-md-7">
       <ul class="nav navbar-nav footer-menu">
          <li class="active"><a href="#">Home</a></li>
          <li>|</li>
          <li class="active"><a href="#">Courses</a></li>
          <li>|</li>
          <li class="active"><a href="#">Login</a></li>
          <li>|</li>
          <li class="active"><a href="#">Sign Up</a></li>
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
<footer><div class="container">&copy; 2015 Copyright | ONLINE COURSES.</div></footer>

</div>

<!--   ---------------------- End Footer Page Content -----------------------    -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } else {     header("location:index.php"); } ?>