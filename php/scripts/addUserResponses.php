<?php
include 'functions.php';
session_start();
$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(false);
$data = json_decode($_POST['myData'], true);
$testId = json_decode($_POST['testid'], true);
$time = json_decode($_POST['time'], true);


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

if ($successQuestions == 0) {
  echo 'Ошибка';
} else {
  mysqli_query($dbconn, "INSERT INTO successTest (`id`, `quiz_id`, `user_id`, `time`, `successQuestionsCount`, `falseQuestionsCount`, `questionsCount`) VALUES (NULL,'".$testId."','".$_SESSION['USER']['ID']."','".$time."','".$successQuestions."', '".$testPrecents."', '".count($data)."')");
}


?>