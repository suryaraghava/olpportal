<?php session_start();
require 'php/define.php';
if(!isset($_SESSION[constant("SESSION_USER_USERNAME")]))
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
    <style>
       #login-ErrorMsg
       {
           display:none;
           width:100%;color:#ffff00;margin-right:1%; 
       }
     </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
        function login()
        {
            var user=$('#login-user');
            var pwd=$('#login-pwd');
            
            //user validation
            //pwd validation
            
            //php-controller
             var result="";
                 $.ajax({type: "GET", 
                                    async: false,
                                    url: 'php/dac.useraccounts.php',
                                    data: { 
                                        login_user :user.val(),
                                        login_pwd : pwd.val(),
                                        action : 'loginUser'
                                    },
                                    success: function(resp)
                                    {
                                          result=resp;
                                    }
                                   });
                                   
                                   console.log("resilt :"+result);
                
               var msgElem=document.getElementById("login-ErrorMsg");
               
                if(result==='Failed')
                {
                    msgElem.style.display='block';
                    msgElem.innerHTML="Invalid Credentials";
                }
                else if(result==='NoUser')
                {
                    msgElem.style.display='block';
                    msgElem.innerHTML="Please enter Username and Password";
                }
                else
                {
                    msgElem.style.display='none';
                    window.location.href='user-landing.php';
                }
                
                   // alert(result);
        }
    </script>
  </head>
<body>


<!--   ----------------------  Start  Header Content -----------------------    -->
<div class="container">
   <div class="col-xs-12 col-xs-6 col-md-8"><a href="#"><img class="img-responsive" src="images/samarthya-logo.jpg" alt="samarthya" /></a></div>
   <div class="col-xs-12 col-xs-6 col-md-4"><img class="img-responsive center-block" src="images/emblem-img.jpg" alt="Indian Emblem" /></div>
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
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#">Reports</a></li>
         </ul>
         <!--<ul class="nav navbar-nav navbar-right">
            <li><a href="#">Sign Up</a></li>
         </ul>-->
      </div>
   </div>
</nav>

<!--   ---------------------- End  Navigation -----------------------    -->

<!--   ---------------------- Start  Login Form -----------------------    -->

<!--   ---------------------- End  Login Form -----------------------    -->


<!--   ---------------------- Start Home Page Slider -----------------------    -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">
<div class="courses-btn"><a href="courses.php">COURSES</a></div>
<div class="login-form col-xs-6">
<form class="form-horizontal">
<fieldset>
<legend class="login-txt">LOGIN</legend>
  <div class="container-fluid">
      <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                      <input type="text" id="login-user" class="form-control" placeholder="USERNAME">
    </div>
      <div class="input-group space">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    <input type="password" id="login-pwd" class="form-control" placeholder="PASSWORD">
                </div>
      <span id="login-ErrorMsg"></span>
      <div class="input-group space login-btn">
          
                    <button type="button" class="btn btn-default loginbtn" onclick="javascript:login()">Login</button>
    </div>
    </div>
    <div class="container-fluid">
    <div class="col-sm-6 left-padding">
      <div class="input-group space">
         <a href="#" data-toggle="modal" data-target="#myModal">Sign Up</a>
      </div>
    </div>
    <div class="col-sm-6 right-padding">
      <div class="input-group space login-btn">
         <a href="#" data-toggle="modal" data-target="#myModal1">Forgot Password?</a>
      </div>
    </div>
    </div>
</fieldset>
</form>
</div>
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
        <li data-target="#myCarousel" data-slide-to="5"></li>
        <li data-target="#myCarousel" data-slide-to="6"></li>
        <li data-target="#myCarousel" data-slide-to="7"></li>
        <li data-target="#myCarousel" data-slide-to="8"></li>
        <li data-target="#myCarousel" data-slide-to="9"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="images/slider-img-01.jpg" height="430" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Enabling technical staff under<br/>MGNREGA to enhance their skill</h1>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="images/slider-img-02.jpg" height="430" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Enabling technical staff under<br/>MGNREGA to enhance their skill</h1>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="images/slider-img-03.jpg" height="430" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Enabling technical staff under<br/>MGNREGA to enhance their skill</h1>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="fourth-slide" src="images/slider-img-04.jpg" height="430" alt="Fourth slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Enabling technical staff under<br/>MGNREGA to enhance their skill</h1>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="fifth-slide" src="images/slider-img-05.jpg" height="430" alt="Fifth slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Enabling technical staff under<br/>MGNREGA to enhance their skill</h1>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="fifth-slide" src="images/slider-img-06.jpg" height="430" alt="Fifth slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Enabling technical staff under<br/>MGNREGA to enhance their skill</h1>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="fifth-slide" src="images/slider-img-07.jpg" height="430" alt="Fifth slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Enabling technical staff under<br/>MGNREGA to enhance their skill</h1>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="fifth-slide" src="images/slider-img-08.jpg" height="430" alt="Fifth slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Enabling technical staff under<br/>MGNREGA to enhance their skill</h1>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="fifth-slide" src="images/slider-img-09.jpg" height="430" alt="Fifth slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Enabling technical staff under<br/>MGNREGA to enhance their skill</h1>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="fifth-slide" src="images/slider-img-10.jpg" height="430" alt="Fifth slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Enabling technical staff under<br/>MGNREGA to enhance their skill</h1>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>


<!--   ---------------------- End Home Page Slider -----------------------    -->

<!--   ---------------------- Start Home Page About Content -----------------------    -->
<br/>
<div class="container">
   <div class="row featurette">
      <div class="col-md-7">
         <h2 class="featurette-heading"><span class="text-muted">About</span> MGNREGA</h2>
         <p class="lead">"Mahatma Gandhi National Rural Employment Guarantee Act aims at enhancing the livelihood security of people in rural areas by guaranteeing hundred days of wage employment in a financial year to a rural household whose adult members volunteer to do unskilled manual work" &copy; 2015 NIRD Inc. All rights reserved.</p>
      </div>
      <div class="col-md-5"><img class="featurette-image img-responsive center-block" src="images/homepage-img.jpg" alt="About Image"></div>
   </div>
</div>
<!--   ---------------------- End Home Page About Content -----------------------    -->
<br/>
<br/>
<!--   ---------------------- Start Footer Page Content -----------------------    -->

<div class="container">
   <hr class="featurette-divider footerdivider">
   <div class="col-xs-12 col-md-7">
   <ul class="nav navbar-nav footer-menu">
      <li class="active"><a href="index.php">Home</a></li>
      <li>|</li>
      <li class="active"><a href="courses.php">Courses</a></li>
      <li>|</li>
      <li class="active"><a href="index.php">Login</a></li>
      <li>|</li>
      <li class="active"><a href="#" data-target="#myModal" data-toggle="modal">Sign Up</a></li>
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
<!--   ---------------------- End Footer Page Content -----------------------    -->

<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="text-center">Forgot Password?</h3>
      </div>
      <br/>
    <div class="container-fluid">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          <p>If you have forgotten your password - reset it here.</p>
                            <div class="panel-body">
                              
                              <form class="form"><!--start form--><!--add form action as needed-->
                                <fieldset>
                                  <div class="form-group">
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                      <!--EMAIL ADDRESS-->
                                      <input id="emailInput" placeholder="email address" class="form-control" type="email" oninvalid="setCustomValidity('Please enter a valid email address!')" onchange="try{setCustomValidity('')}catch(e){}" required="">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <input class="btn btn-default pull-right" value="Send My Password" type="submit">
                                  </div>
                                </fieldset>
                                <br/>
                                <div class="container-fluid">
                                <div class="form-group">
                        <div class="alert alert-success">We sent password to your email id</div>
                        </div>
                        </div>
                              </form><!--/end form-->
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
    </div>
</div>
</div>


<!--     Sign Up Form     -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">SIGN UP</h4>
      </div>
      <div class="modal-body">
		<div class="well">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#step1" data-toggle="tab">Step1</a></li>
				<li><a href="#step2" data-toggle="tab">Step2</a></li>
                <li><a href="#step3" data-toggle="tab">Step3</a></li>
			</ul>
			<div id="myTabContent" class="tab-content">
				<div class="tab-pane active in" id="step1">
					<form class="form-horizontal" action='' method="POST">
                    <div class="container-fluid">
  <div class="form-group">
  <br/>
    <select class="form-control" value="">
       <option>Select State</option>
       <option>Andaman and Nicobar Islands</option>
       <option>Andhra Pradesh</option>
       <option>Arunachal Pradesh</option>
       <option>Assam</option>
       <option>Bihar</option>
       <option>Chandigarh</option>
       <option>Chhattisgarh</option>
       <option>Dadra and Nagar Haveli</option>
       <option>Daman and Diu</option>
       <option>Delhi</option>
       <option>Goa</option>
       <option>Gujarat</option>
       <option>Haryana</option>
       <option>Himachal Pradesh</option>
       <option>Jammu and Kashmir</option>
       <option>Jharkhand</option>
       <option>Karnataka</option>
       <option>Kerala</option>
       <option>Lakshadweep</option>
       <option>Madhya Pradesh</option>
       <option>Maharashtra</option>
       <option>Manipur</option>
       <option>Meghalaya</option>
       <option>Mizoram</option>
       <option>Nagaland</option>
       <option>Odisha</option>
    </select>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="mobileNumber" placeholder="Mobile Number">
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-default pull-right">Submit</button>
  </div>
  <div class="form-group">
  <div class="alert alert-danger bs-alert-old-docs">
      <strong>"You cannot register into OLP unless you are registered in MGNREGA staff database"</strong>
    </div>
  </div>
  <div class="form-group">
  <div class="alert alert-danger bs-alert-old-docs">
      <strong>"If you have not registered with the MGNREGA staff portal,</strong> <a href="http://getbootstrap.com/components/">click here"</a>
    </div>
  </div>
  </div>
					</form>                
				</div>
				<div class="tab-pane fade" id="step2">
					<form id="tab" class="form-horizontal">
                    <div class="container-fluid">
                    <div class="form-group">
                    <br/>
    <label for="exampleInputFile">Enter NETSECURE<sup>TM</sup>(OTP) Code</label>
    <input type="text" id="otp"><button type="submit" class="btn btn-default pull-right">Resend OTP</button></div>
    <div class="form-group">
    <div class="alert alert-danger bs-alert-old-docs">
      <strong>"The OTP</strong> is <strong>not valid, please reenter the OTP"</strong></a>
    </div>
  </div>					
						<div class="form-group">
							<button type="submit" class="btn btn-default pull-right">Submit</button>
						</div>
                        </div>
					</form>
				</div>
                <div class="tab-pane fade" id="step3">
					<form id="tab" class="form-horizontal">
                    <div class="container-fluid">
                    <div class="form-group">
                    <br/>
                       <input class="form-control" type="text" placeholder="Name">
                    </div>	
                    <div class="form-group">
                       <input class="form-control" type="text" placeholder="Staff ID">
                    </div>
                    <div class="form-group">
                       <input class="form-control" type="text" placeholder="Designation">
                    </div>
                    <div class="form-group">
                       <input class="form-control" type="text" placeholder="Email ID">
                    </div>				
						<div class="form-group">
							<button type="submit" class="btn btn-default pull-right">Confirm</button>
						</div>
                        <div class="form-group">
                        <div class="alert alert-success">
              <strong>"Thanks for Signing Up.</strong> Please log in using the user id and password sent to your email id."
            </div>
                        </div>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
    </div>
  </div>
</div>

<!--     Sign Up Form     -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } else {     header("location:user-landing.php"); }?>