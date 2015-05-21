<?php
session_start();
 require 'database.php';
/* 
 * UserAccounts Class includes userregistration table, userlogin table
 */

class UserAccounts
{
    /* USER REGISTRATION FORM */
    /* Account creation : Insertion */
    function checkPhoneExist($mobile)
    {
         $result="NotExist";
         $sql="SELECT * FROM `userregistration` WHERE `mobile`='".$mobile."'";
         $dbObj=new InteractDatabase();
                 $res = $dbObj->getData($sql);

                if ($res->num_rows > 0) {
                    $result="Exist";
                }
               return $result;
    }
    
    function checkRegIDExist($reg)
    {
         $result="NotExist";
         $sql="SELECT * FROM `userlogin` WHERE `idUserRegistration`=".$reg.";";
         $dbObj=new InteractDatabase();
                 $res = $dbObj->getData($sql);

                if ($res->num_rows > 0) {
                    $result="Exist";
                }
               return $result;
    }
    
    function registerByStateAndPhone($mobile, $state)
    /* It returns Primary Key */
    {
        $regId=0;
        $dbObj=new InteractDatabase();
        $acc=new UserAccounts();
        
        // Check Already PhoneNumber exist or not
       $result=$acc->checkPhoneExist($mobile);
       if($result=='NotExist')
        {
            $isql="INSERT INTO `userregistration`(`mobile`, `state`) VALUES ('".$mobile."','".$state."')";
            $dbObj->addupdateData($isql);    
        }
        $ssql="SELECT idUserRegistration FROM `userregistration` WHERE mobile='".$mobile."';";
        $json=$dbObj->getJSONData($ssql); 
        $dejson=json_decode($json);
        if(!empty($dejson))
        { $regId=$dejson[0]->{'idUserRegistration'};}
        return $regId;
    }
    
    function addOTPatRegister($otpNum, $regId, $otpCount)
    {
        $dbObj=new InteractDatabase();
        $acc=new UserAccounts();
        
        // Check Already Registration Number exist or not
       $result=$acc->checkRegIDExist($regId);
       if($result=='NotExist' && $regId!=0)
        {
           $sql="INSERT INTO `userlogin`(`idUserRegistration`, `OTPCode`, `OTPCount`) VALUES (".$regId.",'".$otpNum."','".$otpCount."')";
           $dbObj->addupdateData($sql);
        }
        else
        {
           // Get OTPCount
            $gsql="SELECT OTPCount FROM `userlogin` WHERE `idUserRegistration`=".$regId; 
            $json=$dbObj->getJSONData($gsql); 
            $dejson=json_decode($json);
            $otpcount=$dejson[0]->{'OTPCount'};
            $otpcount++;
            $usql="UPDATE `userlogin` SET `OTPCode`='".$otpcount."', `OTPCode`='".$otpNum."' WHERE `idUserRegistration`=".$regId;
            $dbObj->addupdateData($usql);
        }
    }
    
    
    function validateOTP($otpNum, $regId)
    {
          $result="NotExist";
         $sql="SELECT * FROM `userlogin` WHERE `OTPCode`='".$otpNum."' AND `idUserRegistration`=".$regId;
         $dbObj=new InteractDatabase();
                 $res = $dbObj->getData($sql);

                if ($res->num_rows > 0) {
                    $result="Exist";
                }
               return $result;
    }
    
    
    
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

                $utilObj=new Utils();
                $otpCode=$utilObj->randomNumber(5);
                
             /* Inserting into userlogin table */
               $ltquery="INSERT INTO `userlogin`(`username`, `password`, `active`, `idUserRegistration`, `OTPCode`, `OTPCount`)";
               $ltquery=$ltquery." VALUES ('".$username."','".md5($password)."', 0,".$regId.",'".$otpCode."',0);";
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
        $sql=$sql."AND userlogin.password='".md5($pwd)."'";
             
        $dbObj=new InteractDatabase();
        $json=$dbObj->getJSONData($sql);
    
      //  echo $sql;
        
        $res="Failed";
         $dejson=  json_decode($json);

        if(!empty($dejson))
        {
         
        //  echo $dejson;
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
        
        
            $res="Success"; 
        }
        return $res;  
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

            function updateOTPCode()
            {
                $sql="";
            }
            
}




//$acc=new UserAccounts();

/* Get Registration */
// $acc->getRegister("Test", "password", "firstName", "lastName", "1234", "mobile", "abcd", "designation");

//$acc->getloginSession("Test", "password");