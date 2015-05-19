<?php
session_start();
require 'database.php';
/* 
 * Questions Class includes testdetails table, testquestions table, testresults table
 */

class Questions
{
    /* TestDetails Table */
    function addTestDetails($testName, $testType, $testTime)
    {       
        $dbObj=new InteractDatabase();
        $isql="INSERT INTO `testdetails`(`testName`, `testType`, `testTime`) VALUES ('".$testName."',".$testType.", '".$testTime."')";
        $gsql="SELECT * FROM `testdetails` WHERE `testName`='".$testName."' AND `testType`=".$testType.";";
        
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