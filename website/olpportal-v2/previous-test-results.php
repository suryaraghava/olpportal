
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
    <script type="text/javascript">
        function getResults()
        {
            
            
            var result="";
                 $.ajax({type: "GET", 
                                    async: false,
                                    url: 'php/dac.questions.php',
                                    data: { 
                                        action : 'viewTestResults'
                                 
                                    },
                                    success: function(resp)
                                    {
                                          result=resp;
                                    }
                                   });
               console.log("answers : "+result);
               var res=JSON.parse(result);
               
               var response="";
                 $.ajax({type: "GET", 
                                    async: false,
                                    url: 'php/dac.questions.php',
                                    data: { 
                                        action : 'viewFinalTestResults'
                                 
                                    },
                                    success: function(resp)
                                    {
                                          response=resp;
                                    }
                                   });
               console.log("response : "+response);
               
               
               
               var content='';
               var tmp=[];
               
                             content+='<table class="table table-responsiv table-bordered">';
                             content+='<thead>';
                             content+='<tr>';
                             content+='<th>Examination</th>';
                             content+='<th>TestModel</th>';
                             content+='<th>Date of Examination</th>';
                             content+='<th>Questions</th>';
                             content+='<th>Marks</th>';
                             content+='<th>Status</th>';
                             content+='</tr>';
                             content+='</thead>';
                  content+='<tbody>';           
               for(var index=0;index<res.length;index++)
               {
                    if(index%2===0){
                    content+='<tr>';
                            } else {
                                  content+='<tr class="info">';
                                    }
                        content+='<td>'+res[index].courseName+'</td>';   
                        content+='<td>'+res[index].testType+'</td>';
                        content+='<td>'+res[index].ExamDate+'</td>';
                        content+='<td>'+res[index].questionResults+'</td>';  
                        content+='<td>'+res[index].marksResults+'</td>'; 
                        content+='<td>'+res[index].ExamStatus+'</td>'; 

                        content+='</tr>';  
               }
               
               if(response.length>0)
               {
                    console.log(response);
                    response=JSON.parse(response);
                   
                     for(var index=0;index<response.length;index++)
                        {
                             if(index%2===0){
                    content+='<tr>';
                            } else {
                                  content+='<tr class="info">';
                                    }
                        content+='<td>Final Examination</td>';   
                        content+='<td>'+response[index].testType+'</td>';
                        content+='<td>'+response[index].ExamDate+'</td>';
                        content+='<td>'+response[index].questionResults+'</td>';  
                        content+='<td>'+response[index].marksResults+'</td>'; 
                        content+='<td>'+response[index].ExamStatus+'</td>'; 

                        content+='</tr>';  

                        }
              }
               
              
               content+='</tbody>';
               content+='</table>';
             //  content+='<th>Pre Test</th>';
             //  content+='<th>Post Test</th>';
               
              
              
               
               
               
               
               
              
               
            document.getElementById("resultsTable").innerHTML=content;   
               
        }
    </script>
  </head>
<body onload="getResults()">

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
                <li><a href="user-landing.php">Home</a></li>
                <?php   if($_SESSION[constant("SESSION_USER_USERNAME")]=='Administrator') { ?>
                <li><a href="user-details.php">User Details</a></li>
                <li><a href="user-history.php">User History</a></li>
                <li><a href="admin-test-results.php">User Test Results</a></li>
                <?php } else { ?>
                <li class="active"><a href="previous-test-results.php">Test Results</a></li>
                <?php  } ?>

                <?php   if($_SESSION[constant("SESSION_USER_USERNAME")]=='Administrator') { ?>
                <li><a href="manage-courses.php">Manage Courses</a></li>
                <li><a href="manage-onlinetest.php">Manage Tests</a></li>
                <?php } else {?>
                 <li><a href="visited-courses.php">Visited Courses</a></li>
                <?php  } ?>
         </ul>
         <ul class="nav navbar-nav navbar-right right-margin">
             <li class="user-info">Welcome  <span class="user-name"><?php if(isset($_SESSION[constant("SESSION_USER_USERNAME")])) echo $_SESSION[constant("SESSION_USER_USERNAME")]; ?></span></li>
         <li><a href="php/logout.php">Logout</a></li>
            <li class="active dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false"><span class="icon-cog"></span>Settings<span class="caret"></span></a>
                 <ul class="dropdown-menu" role="menu" data-toggle="dropdown">
                    <li class="mychangedrop">
                         <a href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                           <?php include 'templates/changePassword.php';?>
                         </a>
                    </li>
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
<h3 class="featurette-heading">PREVIOUS TEST RESULTS</h3>
      <hr class="featurette-divider">
</div>
</div>
<div class="container">
<div class="col-xs-12">
<div id="resultsTable" class="panel panel-default">

</div>
<p>"Mahatma Gandhi National Rural Employment Guarantee Act aims at enhancing the livelihood security of people in rural areas by guaranteeing hundred days of wage employment in a financial year to a rural household whose adult members volunteer to do unskilled manual work" © 2015 NIRD Inc. All rights reserved. "Mahatma Gandhi National Rural Employment Guarantee Act aims at enhancing the livelihood security of people in rural areas by guaranteeing hundred days of wage employment in a financial year to a rural household whose adult members volunteer to do unskilled manual work"</p>
<br/>
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
<footer><div class="container">&copy; 2015 Copyright | ONLINE COURSES.</div></footer>

</div>


<!--   ---------------------- End Footer Page Content -----------------------    -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>