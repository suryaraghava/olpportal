<?php
// session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'dal.useraccounts.php';
require 'msgconnectivity.php';

$action=$_GET["action"];
if($action=='loginUser')
{
    $userName=$_GET["login_user"];
    $pwd=$_GET["login_pwd"];
    
    if(strlen($userName)>0 && strlen($pwd)>0)
    {
         $acc=new UserAccounts();
         $res=$acc->getloginSession($userName, $pwd);
         echo $res;
    }
    else
    {
        echo "NoUser";
    }   
}
else if($action=='SendMessage')
{
    $state=$_GET["signup_state"];
    $sendPhone=$_GET["sendPhone"];
    $staffID='0000';
    $otpCount='0';
    $util=new Utils();
    $msgObj=new MobileMsg();
    
    $otpNum=$util->randomNumber(6);
    $otpMsg=$msgObj->otpMessage($otpNum);
    
    // Send Message
     $content=$msgObj->sendPhoneMessage($sendPhone, $otpMsg);
 //    echo $content;
    // Insert into Database
    $acc=new UserAccounts();
    $reqId=$acc->registerByStateAndPhone($sendPhone, $state, $staffID);

    
    
    $acc->addOTPatRegister($otpNum, $reqId, $otpCount);
    
    echo $reqId;
}
else if($action=='validateOTP')
{
    $otpNum=$_GET["otpNumber"];
    $regID=$_GET["regId"];
    
    $acc=new UserAccounts();
    $result=$acc->validateOTP($otpNum, $regID);
    
    echo $result;
}
else if($action=='updateRegistration')
{
    $util=new Utils();
     $regId=$_GET["regId"]; 
     $username=$_GET["uName"];
     $d_pwd=$util->randomNumber(10);
     $password=md5($d_pwd); 
     $firstName=$_GET["fName"]; 
     $lastName=$_GET["lName"]; 
     $staffID=$_GET["staffId"]; 
     $emailID=$_GET["email"];  
     $designation=$_GET["designation"];
     $active='0'; 
     
     $acc=new UserAccounts();
     $acc->updateSignup($regId, $username, $password, $firstName, $lastName, $staffID,$emailID, $designation, $active);  
     
     $emsg=new EmailMsg();
     $emailMsg=$emsg->signupGreeting($username, $d_pwd);
     mail($emailID,"Signup Process",$emailMsg);
}