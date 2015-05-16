<?php
session_start();
require 'database.php';
/* 
 * Questions Class includes testdetails table, testquestions table, testresults table
 */

class Questions
{
    /* TestDetails Table */
    function addTestDetails()
    {       
        $dbObj=new InteractDatabase();
        $isql="INSERT INTO `testdetails`(`testName`, `testType`) VALUES ('".$testName."',".$testType.")";
        $gsql="SELECT * FROM `testdetails` WHERE `testName`='".$courseName."' AND `testType`=".$courseNum.";";
        
        $dbObj->addupdateData($isql);
        $json=$dbObj->getJSONData($gsql);
        $dejson=json_decode($json);
        $courseId=$dejson[0]->{'idTestDetails'};
        
        return $courseId;
    }
    
    function addQuestions()
    {
        
    }
    
}