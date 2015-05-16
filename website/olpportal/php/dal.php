<?php
require 'database.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class useraccounts
{
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

    
}

$acc=new useraccounts();

/* Get Registration */
$acc->getRegister("Test", "password", "firstName", "lastName", "1234", "mobile", "abcd", "designation");