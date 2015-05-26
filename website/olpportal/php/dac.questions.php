<?php
require 'dal.questions.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dac
 *
 * @author user1
 */
$action=$_GET["action"];

if($action=='TestDetails')
{
    $testName=$_GET["courseName"];
    $testType=$_GET["testType"];
    $q=new Questions();
    $json=$q->getAllTestDetails($testName, $testType);
    echo $json;
}

if($action=='GetQuestions')
{
    $testDetailsId=$_GET["TestDetailsID"];
    $qtotal=$_GET["qtotal"];
    $q=new Questions();
    $json=$q->getQuestions($testDetailsId, '1', $qtotal);
    echo $json;
}

if($action=='SendAnswers')
{
    $userId=$_SESSION[constant("SESSION_USER_REGID")];
    $testType=$_GET["testType"];
    $ans_user=$_GET["answers"];
    $questions=$_GET["questions"];
    $testId=$_SESSION[constant("SESSION_COURSEID")];
    $testName=$_SESSION[constant("SESSION_COURSENAME")];
    // Get Answers for Questions;
    $q=new Questions();
    $ans_sys=$q->getAnswersList($questions);

    echo $ans_sys;
     echo $ans_user;
     

     $userobj = json_decode($ans_user);
     
     $sysobj= json_decode($ans_sys);
     
     $count=0;
    
     for($uind=0;$uind<count($userobj);$uind++)
     {
         $status="F";
         for($sind=0;$sind<count($sysobj);$sind++)
         {
              
                     
             if($userobj[$uind]->{'QuestionId'}==$sysobj[$sind]->{'idTestQuestions'})
             {
                 if($userobj[$uind]->{'UserAnswer'}==$sysobj[$sind]->{'answer'})
                 {
                      $status="P";
                    $count++; 
                 }
             }
         
         }
          $questionId=$userobj[$uind]->{'QuestionId'};
          $result=$userobj[$uind]->{'UserAnswer'};
          $q->addTestResults($userId, $testId, $questionId, $result, $status);
     }
     
     
    $questionResults=$count."/".count($userobj);
    
    
    $t_json=$q->getTestDetails($testName);
    $t_dejson=json_decode($t_json);
    
    $totalmarks=$t_dejson[0]->{'totalmarks'};
    $passMarks=$t_dejson[0]->{'passMarks'};
    $totalquestions=$t_dejson[0]->{'totalquestions'};
    
    $eachQmarks=$totalmarks/$totalquestions;
    $marksResults=($eachQmarks*$count);
    
     $examStatus='FAILED';
    if($marksResults>=$passMarks)
    {
        $examStatus='PASSED';
       
    }
    $marksInsert=$marksResults."/".$totalmarks;
    
     // Results Update
     $q->courseUserTest($userId, $testId, $testType, 1, $questionResults, $marksInsert, $examStatus);
    
     // Marks Logic
     
     
}

if($action=='viewTestResults')
{
  $q=new Questions();
    $userId=$_SESSION[constant("SESSION_USER_REGID")];
 
    $json=$q->getTestResults($userId);
    echo $json;
}

if($action=='AdminAddQuestions')
{
   $courseList=$_GET["courseList"];
   $testList=$_GET["testList"];
   $addQuestion=$_GET["addQuestion"];
   $t_option1=$_GET["t_option1"];
   $t_option2=$_GET["t_option2"]; 
   $t_option3=$_GET["t_option3"];
   $t_option4=$_GET["t_option4"];
   $answer=$_GET["answer"];
   $active=$_GET["active"];
   
   for($ind=0;$ind<count($testList);$ind++)
   {
       $id=0;
        $test=$testList[$ind];
       // Get TestID from TestDetails Table
        $q=new Questions();
       $json=$q->getIdTestDetails($courseList, $test);
       
       echo "ID List :: ".$json;
         $jsonIterator = new RecursiveIteratorIterator(
            new RecursiveArrayIterator(json_decode($json, TRUE)),
            RecursiveIteratorIterator::SELF_FIRST);

            foreach ($jsonIterator as $key => $val) {
            if(!is_array($val)) {
                if($key=='idTestDetails')
                {
                    $id=$val;
                }
 
            }
        }
       
        echo $id." ". $addQuestion." ". $t_option1." ".$t_option2." ". $t_option3." ".$t_option4." ". $answer." ".$active;
       
       // Add Question in testquestion Table
       $q->addQuestions($id, $addQuestion, $t_option1, $t_option2, $t_option3, $t_option4, $answer, $active);
   }
   
   
}    
    