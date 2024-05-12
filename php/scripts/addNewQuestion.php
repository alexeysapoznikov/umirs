<?php

include 'functions.php';
session_start();
header('Content-Type: application/json; charset=utf-8');
$counter = 0;
$responses = [];
$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(true);

$uploadfile = 'D:/OSPanel/domains/umirs/assets/images/' . basename($_FILES['img']['name']);
move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);

foreach ($_POST as $item) {
    if ($counter >= 2) {
        echo $item;
        array_push($responses, $item);

    };
    $counter++;
}

print_r($responses);
print_r($_SESSION["createdTest"]['INFO']);

$responses = json_encode($responses, JSON_UNESCAPED_UNICODE);

$questionsData = [
    'TEST_ID' => $_SESSION["createdTest"]['INFO']['id'],
    'TITLE' => $_POST['title'],
    'NAME' => $_POST['title'],
    'DESC' => $_POST['desc'],
    'IMG' => $_FILES['img']['name'],
    'RESPONSES' => $responses
];

$addQuestions = $application->addQuestion($dbconn, $questionsData);


?>
