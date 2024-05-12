<?php

include 'functions.php';
session_start();
header('Content-Type: application/json; charset=utf-8');
$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(true);

$testQuestions = $application->getTestQuestions($dbconn, $_GET['id']);

print_r($testQuestions);
$testQuestions = json_decode($testQuestions['responses']);
print_r($testQuestions);

?>