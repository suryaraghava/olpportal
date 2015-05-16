<?php
require 'database.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class useraccounts
{
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
    
    /* Account creation : Insertion */
    function getRegister($userID, $password, $firstName, $lastName, $staffID, $mobile, $emailID, $designation)
    {
         $dbObj=new InteractDatabase();
         $acc=new useraccounts();
         $staffIDCheck=$acc->checkStaffID($staffID);
         if($staffIDCheck=='NotExist') {
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
               $ltquery="INSERT INTO `userlogin`(`userID`, `password`, `active`, `idUserRegistration`)";
               $ltquery=$ltquery." VALUES (".$userID.",'".$password."', 0,".$regId.");";
               $dbObj->addupdateData($ltquery);
               
            echo "UserRegistered";
         }
         else {
             echo "StaffIDExist";
         } 
    }
}

$acc=new useraccounts();
$acc->getRegister("1", "password", "firstName", "lastName", "staffID", "mobile", "emailID", "designation");