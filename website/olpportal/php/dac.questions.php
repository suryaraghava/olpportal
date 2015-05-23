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
    $answers=$_GET["answers"];
    $questions=$_GET["questions"];
    
    // Get Answers for Questions;
    $q=new Questions();
    $ans_json=$q->getAnswersList($questions);

    echo $ans_json;
     echo $answers;
     
     $json=json_decode($answers);
     
    //$json=json_decode($answers);
    /*
    $jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($answers, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

    foreach ($jsonIterator as $key => $val) {
        
    if(is_array($val)) {
        
        echo "$key:\n";
    } else {
        echo "$key => $val\n";
    }
    */
   /* if(!is_array($val))
    {
        
    }
        
        
}*/
    
}


