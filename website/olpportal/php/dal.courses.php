<?php
session_start();
require 'database.php';
/* 
 * Courses Class includes courses table, courselinks table 
 */



class Courses
{
    function addCourses($courseName, $courseNum)
    /* Adding Courses and It returns Primary Key */
    {
        $dbObj=new InteractDatabase();
        $isql="INSERT INTO `courses`(`courseName`, `courseNumber`) VALUES ('".$courseName."',".$courseNum.")";
        $gsql="SELECT * FROM `courses` WHERE `courseName`='".$courseName."' AND `courseNumber`=".$courseNum.";";
        
        $dbObj->addupdateData($isql);
        $json=$dbObj->getJSONData($gsql);
        $dejson=json_decode($json);
        $courseId=$dejson[0]->{'idCourses'};
        
        return $courseId;
    }
    
    function addCourseLink($courseId, $courseVideo, $coursePDF)
    {
        $dbObj=new InteractDatabase();
        
        $sql="INSERT INTO `courselinks`(`courseID`, `courseVideoLink`, `coursePDFLink`) ";
        $sql.="VALUES (".$courseId.",'".$courseVideo."','".$coursePDF."')";
        
        $dbObj->addupdateData($sql);
    }
    
    function viewCourseDetails()
    {
        $sql="SELECT * FROM `courses`,`courselinks` WHERE courses.idCourses=courselinks.courseID";
        $dbObj=new InteractDatabase();
        $json=$dbObj->getJSONData($sql);
        
        echo $json;
    }
    
    
}


