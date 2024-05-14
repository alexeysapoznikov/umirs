<?php

include_once './php/header.php';
include './php/scripts/functions.php';
$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(false);
$testInfo = $application->getTestById($dbconn, $_GET['id']);
//print_r($testInfo);
$questions = mysqli_query($dbconn, "SELECT * FROM `questions` WHERE `quiz_id` = '".$testInfo['id']."'");
?>
    <main id="testDetail">
    <div class="breadcrumbs">
        <a href="">Главная <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.95825 1.16475L2.95825 8.83525L8.04175 5L2.95825 1.16475Z" fill="black" fill-opacity="0.5"/>
            </svg></a><a href="">Главная <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.95825 1.16475L2.95825 8.83525L8.04175 5L2.95825 1.16475Z" fill="black" fill-opacity="0.5"/>
                </svg></a>
        </p>
    </div>
    <div class="test-info-block">
        <div class="test-info-test">
            <span class="now">Не пройден</span>
            <h2><?= $testInfo['name']; ?></h2>
            <p class="desc"><?= $testInfo['desc']; ?></p>
            <p class="statistic-desc">Количество вопросов: <span><?= $questions->num_rows ?></span></p>
            <p class="statistic-desc">Сложность: <span><?= $testInfo['difficulty'] ?></span></p>
            <p class="statistic-desc">Время прохождения: <span><?= $testInfo['time'] ?></span></p>
            <a href="/testStep.php?id=<?= $testInfo['id']; ?>">Начать тест <svg width="28" height="23" viewBox="0 0 28 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.22211 2.96997L8.22211 20.0302L22.3511 11.5001L8.22211 2.96997Z" fill="white"/>
                </svg>
                </a>
        </div>
        <div class="test-info-img" style="background-image: url(./assets/images/<?= $testInfo['main_img_src']; ?>)">
            
        </div>
    </div>
    </main>
<?php include_once "./php/footer.php";?>
