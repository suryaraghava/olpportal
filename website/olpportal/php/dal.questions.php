<?php
session_start();
require 'database.php';
/* 
 * Questions Class includes testdetails table, testquestions table, testresults table
 */

class Questions
{
    /* TestDetails Table */
    function addTestDetails($testName, $testType, $testTime, $courseq, $totalMarks)
    {       
        $dbObj=new InteractDatabase();
        $isql="INSERT INTO `testdetails`(`testName`, `testType`, `testTime`, `totalquestions`, `totalmarks`) ";
        $isql.="VALUES ('".$testName."','".$testType."', '".$testTime."',".$courseq.", ".$totalMarks.")";
        $gsql="SELECT * FROM `testdetails` WHERE `testName`='".$testName."' AND `testType`='".$testType."';";
        echo $isql;
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

$que=new Questions();
echo $que->addTestDetails('Natural Resources Management', 'Pre Test', '00:10', '5', '20');