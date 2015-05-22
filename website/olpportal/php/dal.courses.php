<?php
session_start();
require 'database.php';
/* 
 * Courses Class includes courses table, courselinks table 
 */



class Courses
{
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
    
    function addCourseLink($courseId, $title, $courseEngVideo, $courseEngPDF,
            $courseHinVideo, $courseHinPDF, $courseTelVideo, $courseTelPDF)
    /* Adding CourseLinks */
    {
        $dbObj=new InteractDatabase();
        
        $sql="INSERT INTO `courselinks`(`courseID`, `title`, `courseEngVideoLink`, `coursePDFLink`,";
        $sql.="`courseHindiVideoLink`, `courseHindiPDFLink`, `courseTeluguVideoLink`, `courseTeluguPDFLink`) ";
        $sql.="VALUES (".$courseId.",'".$title."','".$courseEngVideo."','".$courseEngPDF."',";
        $sql.="'".$courseHinVideo."', '".$courseHinPDF."', '".$courseTelVideo."', '".$courseTelPDF."'";
        $sql.=")";
        
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
        $sql="SELECT * FROM `courses`";
        $dbObj=new InteractDatabase();
        $json=$dbObj->getJSONData($sql);
        return $json;
    }
    
    function addCourseLogs($course, $date, $startTime, $endTime, $userId, $ipaddress)
    {
        $sql="INSERT INTO `uservisitedcourse`( `course`, `date`, `startTime`,`endTime`, `userId`, `IPAddress`) ";
        $sql.="VALUES('".$course."','".$date."','".$startTime."','".$endTime."',".$userId.",'".$ipaddress."')";
        echo $sql;
        $dbObj=new InteractDatabase();
        $result=$dbObj->addupdateData($sql);
        return $result;
    }
    
    function getCourseLogs($userId)
    {
        $sql="SELECT * FROM `uservisitedcourse` WHERE `userId`='".$userId."'";
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
