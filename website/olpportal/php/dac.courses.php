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
  $course=new Courses();
   $json=$course->checkforTestDone($userId, $courseId);
    echo $json;    
}