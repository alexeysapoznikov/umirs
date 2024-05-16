<?php
session_start();
if (empty($_SESSION['USER'])) {
    header('Location: ./auth.php');
};
include_once './php/header.php';
include './php/scripts/functions.php';
$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(false);
$tests = mysqli_query($dbconn, "SELECT * FROM tests");
$feedback = mysqli_query($dbconn, "SELECT * FROM feedback");
?>
    <main id="admin">
        <div class="profile-title">
            <h2>Профиль</h2>
            <a href="">Выйти</a>
        </div>
        <div class="admin_container">
            <div class="tests-block">
               <h3>Список тестов</h3>
                <div class="tests-list">
                    <? foreach ($tests as $item): ?>
                        <div class="tests-item">
                        <span><?= $item['name'] ?></span>
                        <a href="./php/scripts/testDelete.php?id=<?= $item['id'] ?>">Удалить</a>
                    </div>
                    <? endforeach; ?>
                </div>
                <a href="./testConstructor.php" class="createNewQuestion">Создать новый</a> 
            </div>
            <div class="feedback-block">
                <h3>Форма обратной связи</h3>
                <div class="feedback-list">
                    <? foreach ($feedback as $items): ?>
                    <div class="feedback-item">
                        <div class="feedback-text">
                            <p>Имя: <span><?= $items['name']; ?></span></p>
                            <p>EMAIL: <span><?= $items['email']; ?></span></p>
                            <p>Телефон: <span><?= $items['number']; ?></span></p>
                            <a href="./php/scripts/feedbackDelete.php?id=<?= $items['id']; ?>">УДАЛИТЬ</a>
                        </div>
                        <div class="feedback-comment">
                            <p>Сообщение: <span><?= $items['comment']; ?></span></p>
                            
                        </div>
                    </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
    </main>
    <?php include_once './php/footer.php' ?>
