<?php
session_start();
if (empty($_SESSION['USER'])) {
    header('Location: ./auth.php');
};
include_once './php/header.php';
include './php/scripts/functions.php';
$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(false);

?>
    <main id="profile">
        <div class="profile-title">
            <h2>Профиль</h2>
            <a href="">Выйти</a>
        </div>
        <div class="profile-content-block">
            <div class="profile-info">
                <div class="profile-info-block">
                    <h3>Информация о пользователе:</h3>
                    <p>Имя: <span><?= $_SESSION['USER']['NAME']?></span></p>
                    <p>Фамилия: <span><?= $_SESSION['USER']['SURNAME']?></span></p>
                    <p>EMAIL: <span><?= $_SESSION['USER']['EMAIL']?></span></p>
                    <a href="">РЕДАКТИРОВАТЬ</a>
                    <a style="background-color: #ff4545;" href="./php/scripts/exit.php">ВЫЙТИ ИЗ ПРОФИЛЯ</a>
                </div>
                <div class="profile-info-block">
                    <h3>Статистика:</h3>
                    <p>Тестов пройдено: <span><?= mysqli_query($dbconn, 'SELECT * FROM `successTest` WHERE `user_id`='.$_SESSION['USER']['ID'])->num_rows?></span></p>
                    <p>Время: <span>22 минуты</span></p>
                    <p>Время: <span>22 минуты</span></p>
                    
                </div>
                <? if ($_SESSION['USER']['PRIMARY'] == 1): ?>
                <div class="profile-info-block">
                        <a style="background-color: #ff4545;" href="./admin.php">ПАНЕЛЬ АДМИНИСТРАТОРА</a>
                </div>
                <? endif; ?>
            </div> 
            <div class="profile-success-list-block">
                <h3>Пройденные тесты</h3>
                <div class="profile-success-list">
                    <div class="profile-success-item">
                        <h3>Название</h3>
                        <p>Описание: <span>Описание2</span></p>
                        <p>Описание: <span>Описание2</span></p>
                        <p>Описание: <span>Описание2</span></p>
                        <span id="result">Результат: 77%</span>
                    </div>
                    <div class="profile-success-item">
                        <h3>Название</h3>
                        <p>Описание: <span>Описание2</span></p>
                        <p>Описание: <span>Описание2</span></p>
                        <p>Описание: <span>Описание2</span></p>
                        <span id="result">Результат: 77%</span>
                    </div>
                    <div class="profile-success-item">
                        <h3>Название</h3>
                        <p>Описание: <span>Описание2</span></p>
                        <p>Описание: <span>Описание2</span></p>
                        <p>Описание: <span>Описание2</span></p>
                        <span id="result">Результат: 77%</span>
                    </div>
                    <div class="profile-success-item">
                        <h3>Название</h3>
                        <p>Описание: <span>Описание2</span></p>
                        <p>Описание: <span>Описание2</span></p>
                        <p>Описание: <span>Описание2</span></p>
                        <span id="result">Результат: 77%</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once './php/footer.php' ?>
