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
    $otpCount='0';
    $util=new Utils();
    $msgObj=new MobileMsg();
    
    $otpNum=$util->randomNumber(6);
    $otpMsg=$msgObj->otpMessage($otpNum);
    
    // Send Message
     $msgObj->sendPhoneMessage($sendPhone, $otpMsg);
    // Insert into Database
    $acc=new UserAccounts();
    $reqId=$acc->registerByStateAndPhone($sendPhone, $state);

    $_SESSION[constant("SESSION_SIGNUP_REGID")]=$reqId;
    
    $acc->addOTPatRegister($otpNum, $reqId, $otpCount);
    
}
else if($action=='validateOTP')
{
    $otpNum=$_GET["otpNumber"];
    $regID=$_GET["regId"];
    
    $acc=new UserAccounts();
    $result=$acc->validateOTP($otpNum, $regID);
    
    echo $result;
}