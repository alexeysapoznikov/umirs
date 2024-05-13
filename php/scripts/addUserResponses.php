<?php
include 'functions.php';

$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(false);
$data = json_decode($_POST['myData'], true);
// print_r($data);

$successQuestions = 0;
foreach ($data as $dataItem) {
    $originalItem = mysqli_query($dbconn, 'SELECT * FROM `questions` WHERE `id`='.$dataItem['QUESTION_ID']);
    $originalItem = mysqli_fetch_assoc($originalItem);
    $originalItemResponses = json_decode($originalItem['responses'], true);
    // print_r($originalItem[0]);
    // print_r($dataItem['QUESTION_RESPONSE']);

    if ($originalItemResponses[0] == $dataItem['QUESTION_RESPONSE']) {
        $successQuestions++;
        print_r(' Ответ на вопрос ' . $originalItem['title'] . ' = ' . $dataItem['QUESTION_RESPONSE']);
    };
};
$testPrecents = ($successQuestions / count($data)) * 100;
print_r('Правильно отвечено на '.$successQuestions.' из '.count($data).'. В процентах: '.$testPrecents.'%');

if ($testPrecents >= 70) {
  print_r('Тест сдан');
} else {
  print_r('Тест не сдан');
};


?>