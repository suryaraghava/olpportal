<?php
session_start();
require 'database.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class useraccounts
{
    /* USER REGISTRATION FORM */
    /* Account creation : Insertion */
    function getRegister($username, $password, $firstName, $lastName, $staffID, $mobile, $emailID, $designation)
    {
         $register='None';
         $dbObj=new InteractDatabase();
         $acc=new useraccounts();
         $usernameCheck=$acc->checkUsernameExist($username);
         $staffIDCheck=$acc->checkStaffID($staffID);
         if($staffIDCheck=='NotExist' && $usernameCheck=='NotExist') { 
             $register='Add'; 
             
         } else {
             if($staffIDCheck=='Exist') { echo "StaffIDExist";        }
             else if($usernameCheck=='Exist') { echo "UsernameExist"; }
             else { echo "Error";}
         } 
         
         if($register=='Add') {
             /* Inserting into userregistration table */
                $rtquery="INSERT INTO `userregistration`";
                $rtquery=$rtquery."(`firstName`, `lastName`, `staffID`, `mobile`, `emailID`, `designation`) ";
                $rtquery=$rtquery."VALUES ('".$firstName."','".$lastName."','".$staffID."', '".$mobile."' ,'".$emailID."','".$designation."')";
                $dbObj->addupdateData($rtquery);

             /* Getting UserRegistrationID using Staff-ID */
                $getReqIdQuery="SELECT `idUserRegistration` FROM `userregistration` WHERE `staffID`='".$staffID."'";
                $jsonObj=$dbObj->getJSONData($getReqIdQuery);
                $dejson=json_decode($jsonObj);
                $regId=$dejson[0]->{'idUserRegistration'};


             /* Inserting into userlogin table */
               $ltquery="INSERT INTO `userlogin`(`username`, `password`, `active`, `idUserRegistration`)";
               $ltquery=$ltquery." VALUES ('".$username."','".$password."', 0,".$regId.");";
               $dbObj->addupdateData($ltquery);
               
            echo "UserRegistered";
         }
    }

            /* Account StaffID : Check */
            function  checkStaffID($staffID)
            {
                $result="NotExist";
                $sql="SELECT * FROM `userregistration` WHERE `staffID`='".$staffID."'";
                 $dbObj=new InteractDatabase();
                 $res = $dbObj->getData($sql);

                if ($res->num_rows > 0) {
                    $result="Exist";
                }
               return $result;
            }
    
            /* Account UserName : Check */
            function checkUsernameExist($username)
            {
                $result="NotExist";
                $sql="SELECT * FROM `userlogin` WHERE `username`='".$username."'";
                 $dbObj=new InteractDatabase();
                 $res = $dbObj->getData($sql);

                if ($res->num_rows > 0) {
                    $result="Exist";
                }
               return $result;
            }

    /* LOGIN FORM */
    function getloginSession($login, $pwd)
    /* $login can be email or username, it validates with password and gets data */
    {
        $sql="SELECT * FROM `userregistration`, `userlogin` ";
        $sql=$sql."WHERE userregistration.idUserRegistration=userlogin.idUserRegistration ";
        $sql=$sql."AND (userregistration.emailID='".$login."' OR userlogin.username='".$login."') ";
        $sql=$sql."AND userlogin.password='".$pwd."'";
        
        $dbObj=new InteractDatabase();
        $json=$dbObj->getJSONData($sql);
        $dejson=json_decode($json);
        
        $_SESSION[constant("SESSION_USER_REGID")]=$dejson[0]->{'idUserRegistration'};
        $_SESSION[constant("SESSION_USER_LOGID")]=$dejson[0]->{'idUserLogin'};
        $_SESSION[constant("SESSION_USER_USERNAME")]=$dejson[0]->{'username'};
        $_SESSION[constant("SESSION_USER_PASSWORD")]=$dejson[0]->{'password'};
        $_SESSION[constant("SESSION_USER_FIRSTNAME")]=$dejson[0]->{'firstName'};
        $_SESSION[constant("SESSION_USER_LASTNAME")]=$dejson[0]->{'lastName'};
        $_SESSION[constant("SESSION_USER_STAFFID")]=$dejson[0]->{'staffID'};
        $_SESSION[constant("SESSION_USER_MOBILE")]=$dejson[0]->{'mobile'};
        $_SESSION[constant("SESSION_USER_EMAIL")]=$dejson[0]->{'emailID'};
        $_SESSION[constant("SESSION_USER_DESIGNATION")]=$dejson[0]->{'designation'};
        $_SESSION[constant("SESSION_USER_ACTIVE")]=$dejson[0]->{'active'}; 
    }
            /* Update Forgot Password using username */
            function updatePassword($login, $newpwd)
            {
                $sql="UPDATE `userlogin` SET `password`='".$newpwd."' ";
                $sql.="WHERE userlogin.idUserRegistration=(SELECT `idUserRegistration` FROM ";
                $sql.="`userregistration` WHERE `emailID`='".$login."') OR userlogin.username='".$login."';";
               
                $dbObj=new InteractDatabase();
                $dbObj->addupdateData($sql);
            }
}

$acc=new useraccounts();

/* Get Registration */
// $acc->getRegister("Test", "password", "firstName", "lastName", "1234", "mobile", "abcd", "designation");

$acc->getloginSession("Test", "password");