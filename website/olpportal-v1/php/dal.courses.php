<?php
session_start();
require 'database.php';
/* 
 * Courses Class includes courses table, courselinks table 
 */



class Courses
{
    /* GetCourseId based on CourseName */
    function getCourseId($courseName)
    {
         $dbObj=new InteractDatabase();
         $sql="SELECT * FROM `courses` WHERE courseName='".$courseName."'";
         $json=$dbObj->getJSONData($sql);
         $dejson=json_decode($json);
         $courseId='';
         if(count($dejson)>0)
         {
              $courseId=$dejson[0]->{'idCourses'};
         }
        
         return $courseId;
    }
    /* GetCourseLinkId based on title */
    function getCourseLinkId($title)
    {
        $dbObj=new InteractDatabase();
        $sql="SELECT * FROM `courselinks` WHERE title='".$title."';";   
        $json=$dbObj->getJSONData($sql);

         $dejson=json_decode($json);
          $courseId='';
         if(count($dejson)>0)
         {
         $courseId=$dejson[0]->{'idCourseLinks'};
         }
         return $courseId;
    }
    
    function addCourses($courseName, $courseNum, $courseImg)
    /* Adding Courses and It returns Primary Key */
    {
        $dbObj=new InteractDatabase();
        $isql="INSERT INTO `courses`(`courseName`, `courseNumber`, `courseImage`) VALUES ('".$courseName."',".$courseNum.",'".$courseImg."')";
        $gsql="SELECT * FROM `courses` WHERE `courseName`='".$courseName."' AND `courseNumber`=".$courseNum.";";
        
        $dbObj->addupdateData($isql);
        $json=$dbObj->getJSONData($gsql);
        $dejson=json_decode($json);
        $courseId=$dejson[0]->{'idCourses'};
        
        return $courseId;
    }
    
    
    
    function updateCourses($idCourses, $courseName, $courseNum, $courseImg)
    /* Adding Courses and It returns Primary Key */
    {
        $dbObj=new InteractDatabase();
        $isql="UPDATE `courses` SET `courseName`='".$courseName."', `courseNumber`=".$courseNum.", `courseImage`='".$courseImg."' ";
        $isql.= "  WHERE `idCourses`=".$idCourses;
       // $gsql="SELECT * FROM `courses` WHERE `courseName`='".$courseName."' AND `courseNumber`=".$courseNum.";";
        
        echo $isql;
        $dbObj->addupdateData($isql);
       // $json=$dbObj->getJSONData($gsql);
      //  $dejson=json_decode($json);
       // $courseId=$dejson[0]->{'idCourses'};
        
      //  return $courseId;
    }
    
    
        
    function deleteCourses($idCourses)
    /* Adding Courses and It returns Primary Key */
    {
        $dbObj=new InteractDatabase();
        $isql="DELETE FROM `courses` ";
        $isql.= "  WHERE `idCourses`=".$idCourses;
       // $gsql="SELECT * FROM `courses` WHERE `courseName`='".$courseName."' AND `courseNumber`=".$courseNum.";";
        
        echo $isql;
        $dbObj->addupdateData($isql);
       // $json=$dbObj->getJSONData($gsql);
      //  $dejson=json_decode($json);
       // $courseId=$dejson[0]->{'idCourses'};
        
      //  return $courseId;
    }
    
    
    
    
    
    function addCourseLink($courseId, $title, $courseEngVideo, $courseEngPDF,
            $courseHinVideo, $courseHinPDF, $courseTelVideo, $courseTelPDF)
    /* Adding CourseLinks */
    {
        $dbObj=new InteractDatabase();
        
        $sql="INSERT INTO `courselinks`(`courseID`, `title`, `courseEngVideoLink`, `courseEngPDFLink`,";
        $sql.="`courseHindiVideoLink`, `courseHindiPDFLink`, `courseTeluguVideoLink`, `courseTeluguPDFLink`) ";
        $sql.="VALUES (".$courseId.",'".$title."','".$courseEngVideo."','".$courseEngPDF."',";
        $sql.="'".$courseHinVideo."', '".$courseHinPDF."', '".$courseTelVideo."', '".$courseTelPDF."'";
        $sql.=")";
        
        $dbObj->addupdateData($sql);
    }
    
    
    
     
    function updateCourseLink($idCourseLinks, $courseId, $title, $courseEngVideo, $courseEngPDF,
            $courseHinVideo, $courseHinPDF, $courseTelVideo, $courseTelPDF)
    /* Updating CourseLinks */
    {
        $dbObj=new InteractDatabase();
        
        $sql="UPDATE `courselinks` SET `title`='".$title."', `courseEngVideoLink`='".$courseEngVideo."', `courseEngPDFLink`='".$courseEngPDF."',";
        $sql.="`courseHindiVideoLink`='".$courseHinVideo."', `courseHindiPDFLink`='".$courseHinPDF."', `courseTeluguVideoLink`='".$courseTelVideo."', `courseTeluguPDFLink`='".$courseTelPDF."' ";
        $sql.="WHERE `courseID`=".$courseId." AND idCourseLinks=".$idCourseLinks;
        
        $dbObj->addupdateData($sql);
    }
    
    
    function deleteCourseLink($idCourseLinks, $courseId, $title)
    {
        $dbObj=new InteractDatabase();
        
        $sql="DELETE FROM `courselinks` ";
        $sql.="WHERE `courseID`=".$courseId." AND idCourseLinks=".$idCourseLinks." AND title='".$title."'";
        
        echo $sql;
        
        $dbObj->addupdateData($sql);
    }
    
    
    
    
    
    
    
    
    
    
    
    function viewCourseFullDetails($courseID)
    /* Getting  Course Full Details */
    {
        $sql="SELECT * FROM `courselinks` WHERE courselinks.courseID=".$courseID;
        $dbObj=new InteractDatabase();
        $json=$dbObj->getJSONData($sql);
     
        return $json;
    }
    
    function viewCourseDetailsOnly()
    /* Getting CourseName */
    {
        $sql="SELECT DISTINCT * FROM `courses`";
        $dbObj=new InteractDatabase();
        $json=$dbObj->getJSONData($sql);
        return $json;
    }
    
    function addCourseLogs($course, $date, $startTime, $status, $userId, $ipaddress)
    {
        $sql="INSERT INTO `uservisitedcourse`( `course`, `date`, `startTime`,`status`, `userId`, `IPAddress`) ";
        $sql.="VALUES('".$course."','".$date."','".$startTime."','".$status."',".$userId.",'".$ipaddress."')";
        echo $sql;
        $dbObj=new InteractDatabase();
        $result=$dbObj->addupdateData($sql);
        return $result;
    }
    
    function getCourseLogs($userId)
    {
        $sql="SELECT * FROM `uservisitedcourse` WHERE `userId`=".$userId." ORDER BY date ASC";
        $dbObj=new InteractDatabase();
        $json=$dbObj->getJSONData($sql);
        return $json;
    }
    
    
    function checkforTestDone($userId, $courseId, $testType)
    {
        $sql="SELECT `testTaken` FROM `usercoursetest` WHERE `userID`=".$userId." AND `courseID`=".$courseId." AND `testType`='".$testType."'";
        $dbObj=new InteractDatabase();
        $json=$dbObj->getJSONData($sql);
        return $json;
    }
    
    
    
}

 //$c=new Courses();
 //$c->addCourseLogs('Natural Resources Management', date("d/m/Y"), date("h:i:sa"),'' ,'1', '192.168.1.1');

/*
function get_client_ip()
{ $ipaddress = ''; 
  if (!empty($_SERVER['HTTP_CLIENT_IP']))
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if(!empty($_SERVER['HTTP_X_FORWARDED'])) 
      $ipaddress = $_SERVER['HTTP_X_FORWARDED']; 
   else if(!empty($_SERVER['HTTP_FORWARDED_FOR'])) 
       $ipaddress = $_SERVER['HTTP_FORWARDED_FOR']; 
   else if(!empty($_SERVER['HTTP_FORWARDED'])) 
       $ipaddress = $_SERVER['HTTP_FORWARDED']; 
   else if(!empty($_SERVER['REMOTE_ADDR']))
       $ipaddress = $_SERVER['REMOTE_ADDR']; 
   else $ipaddress = 'UNKNOWN'; 
   return $ipaddress;
   }
 */
//$ip=$_SERVER['HTTP_CLIENT_IP'];
// $ip2=$_SERVER['HTTP_X_FORWARDED_FOR'];
 //echo get_client_ip();

 //  $ip = getenv('HTTP_CLIENT_IP')?: getenv('HTTP_X_FORWARDED_FOR')?: getenv('HTTP_X_FORWARDED')?: getenv('HTTP_FORWARDED_FOR')?: getenv('HTTP_FORWARDED')?: getenv('REMOTE_ADDR');
//echo $ip;
