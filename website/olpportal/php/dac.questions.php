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
    $q=new Questions();
    $json=$q->getTestDetails($testName);
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
    $ans_user=$_GET["answers"];
    $questions=$_GET["questions"];
    $testId=$_SESSION[constant("SESSION_COURSEID")];
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
     
    
}

if($action=='viewTotalMarks')
{
  
    $userId=$_SESSION[constant("SESSION_USER_REGID")];
    $testId=$_SESSION[constant("SESSION_COURSEID")];
}
