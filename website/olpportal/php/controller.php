<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'dal.useraccounts.php';

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
        
    }
   
    
    
}