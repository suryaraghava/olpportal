<?php
require 'define.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$action=$_GET["action"];
if($action=='SetCourseSession')
{
    $var=$_GET["courseName"];
    $_SESSION[constant("SESSION_COURSENAME")]=$var;
}