<?php

include 'functions.php';

$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(true);

//print_r($_POST);
//print_r($_FILES);

$uploadfile = 'D:/OSPanel/domains/umirs/assets/images/' . basename($_FILES['img_main']['name']);
move_uploaded_file($_FILES['img_main']['tmp_name'], $uploadfile);

$uploadfile = 'D:/OSPanel/domains/umirs/assets/images/' . basename($_FILES['img_preview']['name']);
move_uploaded_file($_FILES['img_preview']['tmp_name'], $uploadfile);

print_r($uploadfile);

$testData = [
    'TITLE' => $_POST['title'],
    'DESC' => $_POST['desc'],
    'DESC_SHORT' => $_POST['desc_short'],
    'TIME' => $_POST['time'],
    'DIFFICULTY' => $_POST['difficulty'],
    'IMG' => $_FILES['img_preview']['name'],
    'IMG_PREVIEW' => $_FILES['img_preview']['name'],
    'QUESTIONS' => '123'
];

$application->addTest($dbconn, $testData);

?>