
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
        #leftMenuContainer1, #leftMenuContainer2, 
        #leftMenuContainer3, #leftMenuContainer4
        {
            display:none;
        }
    </style>
    <script type="text/javascript">
        function adminGetCourseList()
        {
             var result="";
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
               console.log("courses : "+result);
               var res=JSON.parse(result);
               var content='<table class="table table-responsiv table-bordered">';
                   content+='<thead>';
                   content+='<tr>';
                   content+='<th>S. No.</th>';
                   content+='<th>Course Name</th>';
                   content+='</tr>';
                   content+='</thead>';
                   content+='<tbody>';
                  
                  for(var index=0;index<res.length;index++)
                  {
                      content+='<tr>'
                      content+='<td>'+(index+1)+'</td>';
                      content+='<td>'+res[index].courseName+'</td>';
                      content+='</tr>'
                  }
                  
                   content+='</tbody>';
                   content+='</table>';
                   
                   
                   document.getElementById("leftMenuContainer1").innerHTML=content;
        }
        
        
      function managecoursesload()
      {
          viewLeftMenu1();
          
      }
      
      function viewLeftMenu1()
      {
          document.getElementById("leftMenuContainer1").style.display='block';
          document.getElementById("leftMenuContainer2").style.display='none';
          document.getElementById("leftMenuContainer3").style.display='none';
          document.getElementById("leftMenuContainer4").style.display='none';
          adminGetCourseList();
          $("#leftMenu-1").addClass("active");
          $("#leftMenu-2").removeClass("active");
          $("#leftMenu-3").removeClass("active");
          $("#leftMenu-4").removeClass("active");
      }
      function viewLeftMenu2()
      {
          document.getElementById("leftMenuContainer1").style.display='none';
          document.getElementById("leftMenuContainer2").style.display='block';
          document.getElementById("leftMenuContainer3").style.display='none';
          document.getElementById("leftMenuContainer4").style.display='none';
          
          $("#leftMenu-1").removeClass("active");
          $("#leftMenu-2").addClass("active");
          $("#leftMenu-3").removeClass("active");
          $("#leftMenu-4").removeClass("active");
      }
      function viewLeftMenu3()
      {
          document.getElementById("leftMenuContainer1").style.display='none';
          document.getElementById("leftMenuContainer2").style.display='none';
          document.getElementById("leftMenuContainer3").style.display='block';
          document.getElementById("leftMenuContainer4").style.display='none';
          $("#leftMenu-1").removeClass("active");
          $("#leftMenu-2").removeClass("active");
          $("#leftMenu-3").addClass("active");
          $("#leftMenu-4").removeClass("active");
      }
      function viewLeftMenu4()
      {
          document.getElementById("leftMenuContainer1").style.display='none';
          document.getElementById("leftMenuContainer2").style.display='none';
          document.getElementById("leftMenuContainer3").style.display='none';
          document.getElementById("leftMenuContainer4").style.display='block';
          $("#leftMenu-1").removeClass("active");
          $("#leftMenu-2").removeClass("active");
          $("#leftMenu-3").removeClass("active");
          $("#leftMenu-4").addClass("active");
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
<h3 class="featurette-heading">MANAGE COURSES</h3>
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
   
    <div class="col-xs-12">
        <div class="col-xs-3">
        <ul class="nav nav-pills nav-stacked">
        <li id="leftMenu-1"><a href="#" onclick="viewLeftMenu1()">View Courses</a></li>
        <li id="leftMenu-2"><a href="#" onclick="viewLeftMenu2()">Add a Course</a></li>
        <li id="leftMenu-3"><a href="#" onclick="viewLeftMenu3()">View Course Details</a></li>
        <li id="leftMenu-4"><a href="#" onclick="viewLeftMenu4()">Add Course Details</a></li>
       </ul>
        </div>
        
        <div class="col-xs-8">
        
            
            <!-- viewLeftMenu1 : View Courses-->
            <div id="leftMenuContainer1"  class="panel panel-default">
               
            </div>
            
            <!-- viewLeftMenu2 : Add a Courses-->
            <div id="leftMenuContainer2">
                
            </div>
            
            <!-- viewLeftMenu3 : View Course Details-->
            <div id="leftMenuContainer3">
                
            </div>
            
            <!-- viewLeftMenu4 : Add Course Details-->
            <div id="leftMenuContainer4">
                
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>