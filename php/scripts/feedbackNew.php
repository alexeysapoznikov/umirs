<?php
include 'functions.php';
session_start();
$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(false);

print_r($_POST);

mysqli_query($dbconn, 'INSERT INTO `feedback` (`id`, `name`, `email`, `number`, `comment`) VALUES (NULL, "'.$_POST['name'].'", "'.$_POST['email'].'", "'.$_POST['phone'].'", "'.$_POST['question'].'")')

?>