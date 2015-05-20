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




