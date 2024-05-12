<?php

include 'functions.php';
session_start();
header('Content-Type: application/json; charset=utf-8');
$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(false);

$test = mysqli_query($dbconn, "SELECT * FROM `questions` WHERE `quiz_id`='".$_GET['id']."' ORDER BY `questions`.`id` DESC");

$test = mysqli_fetch_all($test);
$test = json_encode($test);
print_r($test);


return $test;
?>