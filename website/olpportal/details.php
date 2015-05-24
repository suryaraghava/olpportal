<?php session_start();
 require 'php/define.php'; 
 if(isset($_SESSION[constant("SESSION_COURSEID")])) {
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
    <script type="text/javascript">
        function courseDetails()
        {
            var courseId='<?php if(isset($_SESSION[constant("SESSION_COURSEID")])) { echo $_SESSION[constant("SESSION_COURSEID")]; } ?>';
            if(courseId.length>0)
            {
             var result="";
                 $.ajax({type: "GET", 
                                    async: false,
                                    url: 'php/dac.courses.php',
                                    data: { 
                                        courseID :courseId,
                                        action : 'viewCourseDetails'
                                    },
                                    success: function(resp)
                                    {
                                          result=resp;
                                    }
                                   });
                                   
                                   console.log("result :"+result);
                var res=JSON.parse(result);
                
            var content='';
            for(var index=0;index<res.length;index++)
            {
                console.log("Title : "+res[index].title);
                console.log("courseEngVideoLink : "+res[index].courseEngVideoLink);
                console.log("courseEngPDFLink : "+res[index].courseEngPDFLink);
                console.log("courseHindiVideoLink : "+res[index].courseHindiVideoLink);
                console.log("courseHindiPDFLink : "+res[index].courseHindiPDFLink);
                console.log("courseTeluguVideoLink : "+res[index].courseTeluguVideoLink);
                console.log("courseTeluguPDFLink : "+res[index].courseTeluguPDFLink);
                
              content+='<div class="col-xs-4">';
              content+='<div class="course-video">';
              content+='<h5 align="center" class="course-title">'+res[index].title+'</h5>';
              content+='<div  align="center" class="video-frame">';
              
              content+='<iframe width="92%" height="200px"';
              content+='src="'+res[index].courseEngVideoLink+'" ';
              content+='frameborder="0" allowfullscreen></iframe>';
              content+='</div>';
              content+='<div id="course-links" align="center">';
              content+='<div class="linkheader">You tube Video</div>';
              content+='<a  href="'+res[index].courseEngVideoLink+'"  target="_blank"><div class="english">English</div></a>';
              content+='<a  href="'+res[index].courseHindiVideoLink+'"  target="_blank"><div class="hindi">Hindi</div></a>';
              content+='<a  href="'+res[index].courseTeluguVideoLink+'"  target="_blank"><div class="telugu">Telugu</div></a>';
              content+='<a href="#" target="new">';
              content+='<div class="pdf-download"></div>';
              content+='</a>';
              content+='</div>';
              content+='<div id="course-links" align="center">';
              content+='<div class="linkheader">PDF Links</div>';
              content+='<a  href="'+res[index].courseEngPDFLink+'"  target="_blank"><div class="english">English</div></a>';
              content+='<a  href="'+res[index].courseHindiPDFLink+'"  target="_blank"><div class="hindi">Hindi</div></a>';
              content+='<a  href="'+res[index].courseTeluguPDFLink+'"  target="_blank"><div class="telugu">Telugu</div></a>';
              content+='<a href="#" target="new">';
              content+='<div class="pdf-download"></div>';
              content+='</a>';
              content+='</div>';
              content+='</div>';
              content+='</div>';
            }
            
            document.getElementById("courseslink-details").innerHTML=content;
            }
        }
    </script>
  </head>
<body onload="courseDetails()">

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
            <li class="active dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false"><span class="icon-cog"></span>Settings<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
               <li><a href="#">Profile</a></li>
               <li><a href="#">Logout</a></li>
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
      <h3 class="featurette-heading">Course I on <span class="text-muted">Natural Resources Management</span></h3>
      <hr class="featurette-divider">
         <p>The National Rural Employment Guarantee Act 2005 (or, NREGA No 42) was later renamed as the "Mahatma Gandhi National Rural Employment Guarantee Act" (or, MGNREGA), is an Indian labour law and social security measure that aims to guarantee the 'right to work'. It aims to ensure livelihood security in rural areas by providing at least 100 days of wage employment in a financial year to every household whose adult members volunteer to do unskilled manual work.It is one of the important scheme being implemented by government to achive inclusive growth.
</p>
   </div>
</div>
<!--   ---------------------- Start Details Page video Content -----------------------    -->

<div class="container">
    <div id="courseslink-details" class="col-xs-12">
        <!--div class="col-xs-4">
           
            <div class="course-video">
                    <h5 align="center" class="course-title">Water Shed</h5>
                    <div  align="center" class="video-frame">
                      <iframe width="92%" height="200px" 
                              src="https://www.youtube.com/embed/QOrVotzBNto?rel=0" 
                              frameborder="0" allowfullscreen></iframe>
                    </div>

                    <div id="course-links" align="center">
                        <div class="linkheader">You tube Video</div>
                        <div class="english">English</div>
                        <div class="hindi">Hindi</div>
                        <div class="telugu">Telugu</div>
                        <a href="#" target="new">
                            <div class="pdf-download"></div>
                        </a>
                    </div>

                    <div id="course-links" align="center">
                         <div class="linkheader">PDF Links</div>
                        <div class="english">English</div>
                        <div class="hindi">Hindi</div>
                        <div class="telugu">Telugu</div>
                        <a href="#" target="new">
                            <div class="pdf-download"></div>
                        </a>
                    </div>
            </div>  
         </div-->
        
        
        
        
        
        
    </div>
    
    
    <div class="col-xs-12">
        <a href="assessment.php">
        <button class="btn btn-default pull-right">Go for Assesment</button>
        </a>
    </div>
      
    
    </div>
    
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
<?php } else {     header("location:user-landing.php"); } ?>