<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'dal.courses.php';

$action=$_GET["action"];

if($action=='courseListOnly')
{
    $course=new Courses();
    $json=$course->viewCourseDetailsOnly();
    echo $json;
}
else if($action=='GetCourseId')
{
    $courseName=$_GET["courseName"];
    $course=new Courses();
    $json=$course->getCourseId($courseName);
    echo $json;
}



else if($action=='AddcourseVisited')
{
    if (function_exists('date_default_timezone_set'))
    {
      date_default_timezone_set('Asia/Calcutta');
    }
   $userId=$_GET["userId"];
    $courseObj=new Courses();
    $course=$_GET["course"];
    $date=date("d/m/Y");
    $startTime=date("h:i:sa");
    $status=$_GET["status"];
    
    $ipaddress=$_GET["ipaddress"];
    echo $courseObj->addCourseLogs($course, $date, $startTime, $status, $userId, $ipaddress);
}



else if($action=='courseVisited')
{
    $userId=$_GET["userId"];
    $course=new Courses();
    $json=$course->getCourseLogs($userId);
    echo $json; 
}
else if($action=='viewCourseDetails')
{
    $courseID=$_GET["courseID"];
    $course=new Courses();
    $json=$course->viewCourseFullDetails($courseID);
    echo $json;
}

else if($action=='CheckForTest')
{
    $userId=$_SESSION[constant("SESSION_USER_REGID")];
    $courseId=$_GET["courseId"];
    $testType=$_GET["testType"];

   
    if($testType=='preTest')
    {
        $testType='Pre Test';
    }
    else if($testType=='Assessment')
    {
        $testType='Assessment';
    }

    $course=new Courses();
     $json=$course->checkforTestDone($userId, $courseId, $testType);
      echo $json;    
}

else if($action=='AddNewCourses')
{
    $courseName=$_GET["courseName"];
    $courseNum=$_GET["courseNumber"];
    
    echo $courseName;
   echo $courseNum;
        $course=new Courses();
        $course->addCourses($courseName, $courseNum, 'images/courses/course-2.jpg');
}
else if($action=='EditNewCourses')
{
    $idCourses=$_GET["idCourses"];
    $courseName=$_GET["courseName"];
    $courseNum=$_GET["courseNumber"];
    
    echo $courseName;
   echo $courseNum;
        $course=new Courses();
        $course->updateCourses($idCourses, $courseName, $courseNum, 'images/courses/course-2.jpg');
}

else if($action=='DeleteCourse')
{
    $idCourses=$_GET["idCourses"];
    
        $course=new Courses();
        $course->deleteCourses($idCourses);
}


else if($action=='AddNewCourseDetails')
{
    $courseId=$_GET["courseId"];
    $title=$_GET["title"];
    $courseEngVideo=$_GET["courseEngVideo"];
    $courseEngPDF=$_GET["courseEngPDF"];
    
    $courseHinVideo=$_GET["courseHinVideo"];
    $courseHinPDF=$_GET["courseHinPDF"];
    
    $courseTelVideo=$_GET["courseTelVideo"];
    $courseTelPDF=$_GET["courseTelPDF"];
    
    
    $course=new Courses();
    $course->addCourseLink($courseId, $title, $courseEngVideo, $courseEngPDF,
            $courseHinVideo, $courseHinPDF, $courseTelVideo, $courseTelPDF);
}
else if($action=='DeleteCourseDetails')
{
     $idCourseLinks=$_GET["idCourseLinks"];
     $courseName=$_GET["courseName"];
     $title=$_GET["title"];
     
     $course=new Courses();
     $course->deleteCourseLink($idCourseLinks, $courseName, $title);
}