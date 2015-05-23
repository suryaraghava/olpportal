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
    
    
    function getTestDetails($testName)
    {
       $dbObj=new InteractDatabase();
       $sql="SELECT * FROM testdetails WHERE testName='".$testName."'";
       $json=$dbObj->getJSONData($sql);
       return $json;
    }
    
    
    function addQuestions($testDetailsId, $question, $option1, $option2, $option3, $option4, $answer, $active)
    {
        $sql="INSERT INTO `testquestions`( `idTestDetails`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `active`) ";
        $sql.=" VALUES ('".$testDetailsId."','".$question."','".$option1."','".$option2."','".$option3."','".$option4."','".$answer."',".$active.")";
       
         $dbObj=new InteractDatabase();
         $dbObj->addupdateData($sql);
    }
    
    
    function getQuestions($testDetailsId, $active, $qtotal)
    {
        
        $sql="SELECT idTestQuestions, question, option1, option2, option3, option4 FROM `testquestions` WHERE idTestDetails=".$testDetailsId." AND active=".$active." ORDER BY RAND() LIMIT ".$qtotal;
         $dbObj=new InteractDatabase();
         $json=$dbObj->getJSONData($sql);
         return $json;
    }
    
    
    function getAnswersList($ansArray)
    {
        $sql="SELECT idTestQuestions, answer FROM `testquestions` WHERE ";
       
        for($index=0;$index<count($ansArray);$index++)
        {
           $sql.=" idTestQuestions=".$ansArray[$index]." OR";
        }
        
       $sql=chop($sql,"OR");
       
       
         $dbObj=new InteractDatabase();
         $json=$dbObj->getJSONData($sql);
         return $json;
    }
    
    
    
    function addTestResults($userId, $testId, $questionId, $result, $status)
    {
        $sql="INSERT INTO `testresults`( `userCourseTestID`, `questionID`, `result`, `userId`, `status`) ";
        $sql.=" VALUES (".$testId.",".$questionId.",'".$result."',".$userId.",'".$status."')";
        
        $dbObj=new InteractDatabase();
        $dbObj->addupdateData($sql);
    }
   
    
    
    
}


// SELECT * FROM `testdetails` ORDER BY RAND() LIMIT 10
// $que=new Questions();
// $que->addQuestions('2', 'Which is known as Black Continent?', 'Asia', 'Africa', 'Europe', 'Australia', 'Africa', '1');
// echo $que->addTestDetails('Natural Resources Management', 'Pre Test', '00:10', '5', '20');