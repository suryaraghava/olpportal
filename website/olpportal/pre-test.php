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
    
    <script type="text/javascript">
        var q_json;
        var q_cindex;  // currentIndex
        var q_lindex;  // lastIndex
        
        function pageOnload()
        {
            q_cindex=0;
            testReady();
            currentQuestionView();
        }
        function previousQuestionView()
        {
            q_cindex=q_cindex-1;
            console.log("current q : "+q_cindex);
            currentQuestionView();
        }
        function nextQuestionView()
        {
            console.log("Total : "+q_lindex);
           
            q_cindex++;
            currentQuestionView();
            
        }
        function currentQuestionView()
        {
            var qNumber=q_cindex+1;
            document.getElementById("qNum").innerHTML='Q'+qNumber+':';
            document.getElementById("qtest-question").innerHTML=q_json[q_cindex].question;
            
            var options='';
                options+='<div class="radio">';
                options+='<label><input type="radio" name="quiz" id="1" value="'+q_json[q_cindex].option1+'">'+q_json[q_cindex].option1+'</label>';
                options+='</div>';
                options+='<div class="radio">';
                options+='<label><input type="radio" name="quiz" id="2" value="'+q_json[q_cindex].option2+'">'+q_json[q_cindex].option2+'</label>';
                options+='</div>';
                options+='<div class="radio">';
                options+='<label><input type="radio" name="quiz" id="3" value="'+q_json[q_cindex].option3+'">'+q_json[q_cindex].option3+'</label>';
                options+='</div>';
                options+='<div class="radio">';
                options+='<label><input type="radio" name="quiz" id="3" value="'+q_json[q_cindex].option4+'">'+q_json[q_cindex].option4+'</label>';
                options+='</div>';
                
            document.getElementById("qtest-option").innerHTML=options;
            console.log("question : "+q_json[q_cindex].question);
            console.log("option1 : "+q_json[q_cindex].option1);
            console.log("option2 : "+q_json[q_cindex].option2);
            console.log("option3 : "+q_json[q_cindex].option3);
            console.log("option4 : "+q_json[q_cindex].option4);
        
                    
            
            
           // qNum
           // qtest-question
        }
        function testReady()
        {
           var courseName='<?php if(isset($_SESSION[constant("SESSION_COURSENAME")])) echo $_SESSION[constant("SESSION_COURSENAME")]; ?>'; 
           
            var result="";
                 $.ajax({type: "GET", 
                                    async: false,
                                    url: 'php/dac.questions.php',
                                    data: { 
                                        action : 'TestDetails',
                                        courseName : courseName
                                    },
                                    success: function(resp)
                                    {
                                          result=resp;
                                    }
                                   });
                  console.log("result : "+result); 
                  var res=JSON.parse(result);
                  
                  var tqnum=res[0].totalquestions;
                  var tdId=res[0].idTestDetails;
                  var time=res[0].testTime;
                  
                  var t=time.split(":");
                  var hour=t[0];
                  var min=t[1];
                  var sec=t[2];
                   var viewtime=hour+":"+min+":"+sec;
                  setInterval(function(){ 
                      if(sec>0)
                      {
                          sec=sec-1;
                          if(sec<=9)
                          {
                              viewtime=hour+":"+min+":"+'0'+sec; 
                          } 
                      }
                     else if(sec==0)
                      {
                          sec=59;
                          min=min-1;
                         
                      }
                      else  if(min>0)
                      { 
                          if(min<=9)
                          {
                            viewtime=hour+":"+'0'+min+":"+sec; 
                          }
                      }
                     else if(min==0)
                     {
                         min=59;
                         hour=hour-1;
                         if(hour<=9)
                          {
                              viewtime='0'+hour+":"+min+":"+sec; 
                          }
                          
                     }
                     else
                     {
                         viewtime=hour+":"+min+":"+sec; 
                     }
              document.getElementById("future_date").innerHTML=viewtime;
                   //  console.log("Hour length : "+hour.length);
                  //   console.log("Min length : "+min.length);
                    
                     
                       
                  }, 1000);
                //  console.log(t.length);
                  
                      //     console.log("hour : "+hour);
                 // console.log("min : "+min);
                //  console.log("sec : "+sec);
                  
               
                  
                  document.getElementById("future_date").innerHTML=res[0].testTime;
                  
                  var qres="";
                  $.ajax({type: "GET", 
                                    async: false,
                                    url: 'php/dac.questions.php',
                                    data: { 
                                        action : 'GetQuestions',
                                        TestDetailsID : tdId,
                                        qtotal :tqnum
                                    },
                                    success: function(resp)
                                    {
                                          qres=resp;
                                    }
                                   });
                  console.log("result : "+qres); 
                  q_json=JSON.parse(qres);
                  q_lindex=q_json.length;
        }
    </script>
  </head>
<body onload="pageOnload()">

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
            <li ><a style="color:#FFF" href="user-landing.php">Home</a></li>
            <li class="active"><a href="user-landing.php">Courses</a></li>
         </ul>
         <ul class="nav navbar-nav navbar-right right-margin">
                     <li class="user-info">Welcome  
                         <span class="user-name">
                              <?php if(isset($_SESSION[constant("SESSION_USER_USERNAME")])) echo $_SESSION[constant("SESSION_USER_USERNAME")]; ?>
                         </span>
                     </li>
         <li><a href="#">Logout</a></li>
            <li class="active dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false"><span class="icon-cog"></span>Settings<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
               <li><a href="#">Profile</a></li>
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
<h3 class="featurette-heading">COURSE-1:
    <span class="text-muted">
    <?php if(isset($_SESSION[constant("SESSION_COURSENAME")])) echo $_SESSION[constant("SESSION_COURSENAME")]; ?> 
        (PRE TEST)
    </span>
   
    <div id="countdowntimer" class="time-left pull-right">Time Left: <span id="future_date" class="text-muted">00:00 Hrs</span></div></h3>
      <hr class="featurette-divider">
</div>
</div>
<div class="container">
<div class="col-xs-12">
   <div class="row featurette">
      <div class="col-md-8">
          
            <span id="qNum" class="text-muted"></span>
            
            <div id="qtest-question" class="questions-text"></div>
            
            <!--form role="form" name="quizform" action="quiztest.asp?qtest=HTML" method="post"-->
                <div id="qtest-option" class="multiple-choice">
                   
                </div>
	<br>
    <input type="submit"   id="prevButton" class="btn btn-default" value=" Previous " onclick="previousQuestionView()">
	<input type="button"  id="NextButton" class="btn btn-default" value=" Next " onclick="nextQuestionView()">
    <input type="submit" class="btn btn-default" value=" Submit ">	
	<!--/form-->
    <br/>
      </div>
      <div class="col-md-4"><img class="featurette-image img-responsive center-block" src="images/post-test-img.jpg" alt="Post Test Image"></div>
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