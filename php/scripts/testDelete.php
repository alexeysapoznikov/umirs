<?php
include 'functions.php';
session_start();
$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(false);
mysqli_query($dbconn, 'DELETE FROM `tests` WHERE `id`="'.$_GET['id'].'"');
mysqli_query($dbconn, 'DELETE FROM `successTest` WHERE `quiz_id`="'.$_GET['id'].'"');
mysqli_query($dbconn, 'DELETE FROM `questions` WHERE `quiz_id`="'.$_GET['id'].'"');
header('Location: ../../admin.php');


?>