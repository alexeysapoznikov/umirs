<?php

include 'functions.php';

$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(true);

print_r($_POST);
print_r($_FILES);

$uploadfile = 'D:/OSPanel/domains/umirs/assets/images/' . basename($_FILES['img']['name']);
move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);

print_r($uploadfile);

