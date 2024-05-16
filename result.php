<?php
session_start();
if (empty($_SESSION['USER'])) {
    header('Location: ./auth.php');
};
include_once './php/header.php';
include './php/scripts/functions.php';
$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(false);

$successTests = mysqli_query($dbconn, "SELECT * FROM `successTest` WHERE `id`='".$_GET['id']."'");
$successTests = mysqli_fetch_assoc($successTests);

if ($_GET['result'] == 2) {
    ?>

    <main id="result">
        <div class="result-block">
            <div class="result-title">
                <h2>Тест пройден</h2>
                <svg width="81" height="81" viewBox="0 0 81 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M40.5 5.0625C49.8986 5.0625 58.9123 8.79608 65.5581 15.4419C72.2039 22.0877 75.9375 31.1014 75.9375 40.5C75.9375 49.8986 72.2039 58.9123 65.5581 65.5581C58.9123 72.2039 49.8986 75.9375 40.5 75.9375C31.1014 75.9375 22.0877 72.2039 15.4419 65.5581C8.79608 58.9123 5.0625 49.8986 5.0625 40.5C5.0625 31.1014 8.79608 22.0877 15.4419 15.4419C22.0877 8.79608 31.1014 5.0625 40.5 5.0625ZM36.0855 47.4913L28.2133 39.6141C27.9311 39.3318 27.5961 39.108 27.2273 38.9552C26.8586 38.8025 26.4634 38.7239 26.0643 38.7239C25.6652 38.7239 25.27 38.8025 24.9012 38.9552C24.5325 39.108 24.1975 39.3318 23.9153 39.6141C23.3453 40.184 23.0251 40.9571 23.0251 41.7631C23.0251 42.5691 23.3453 43.3422 23.9153 43.9121L33.939 53.9359C34.2204 54.2195 34.5552 54.4447 34.924 54.5983C35.2929 54.7519 35.6885 54.831 36.088 54.831C36.4876 54.831 36.8832 54.7519 37.252 54.5983C37.6209 54.4447 37.9557 54.2195 38.2371 53.9359L58.9933 33.1746C59.2793 32.8935 59.5068 32.5586 59.6627 32.1892C59.8186 31.8198 59.8999 31.4232 59.9017 31.0222C59.9036 30.6213 59.8261 30.2239 59.6736 29.8531C59.5211 29.4822 59.2967 29.1452 59.0134 28.8615C58.73 28.5778 58.3933 28.353 58.0226 28.2001C57.652 28.0472 57.2547 27.9692 56.8537 27.9706C56.4528 27.972 56.056 28.0528 55.6864 28.2083C55.3168 28.3637 54.9817 28.5908 54.7003 28.8765L36.0855 47.4913Z" fill="#579B00"/>
                    </svg>
                    
            </div>
            <div class="result-line">

            </div>
            <div class="result-stats">
                <h3>Результаты и статистика:</h3>
                <p>Затрачено времени: <span><?= $successTests['time'] ?></span></p>
                <p>Всего вопросов: <span><?= $successTests['questionsCount'] ?></span></p>
                <p>Правильно отвечено: <span><?= $successTests['successQuestionsCount'] ?></span></p>
                <p>Неправильно отвечено: <span><?= ($successTests['questionsCount'] - $successTests['successQuestionsCount']) ?></span></p>
                <p>Результат: <span><?= (($successTests['successQuestionsCount'] / $successTests['questionsCount']) * 100) ?>%</span></p>
            </div>
            <div class="result-nav">
                <a href="./index.php">НА ГЛАВНУЮ</a>
                <a href="./profile.php">ЛИЧНЫЙ КАБИНЕТ</a>
            </div>
        </div>
    </main>

    <?php
} else if ($_GET['result'] == 1) {
    ?>

    <main id="result">
        <div class="result-block">
            <div class="result-title">
                <h2>Тест не пройден</h2>
                <svg width="81" height="81" viewBox="0 0 81 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M40.5 5.0625C49.8986 5.0625 58.9123 8.79608 65.5581 15.4419C72.2039 22.0877 75.9375 31.1014 75.9375 40.5C75.9375 49.8986 72.2039 58.9123 65.5581 65.5581C58.9123 72.2039 49.8986 75.9375 40.5 75.9375C31.1014 75.9375 22.0877 72.2039 15.4419 65.5581C8.79608 58.9123 5.0625 49.8986 5.0625 40.5C5.0625 31.1014 8.79608 22.0877 15.4419 15.4419C22.0877 8.79608 31.1014 5.0625 40.5 5.0625ZM36.0855 47.4913L28.2133 39.6141C27.9311 39.3318 27.5961 39.108 27.2273 38.9552C26.8586 38.8025 26.4634 38.7239 26.0643 38.7239C25.6652 38.7239 25.27 38.8025 24.9012 38.9552C24.5325 39.108 24.1975 39.3318 23.9153 39.6141C23.3453 40.184 23.0251 40.9571 23.0251 41.7631C23.0251 42.5691 23.3453 43.3422 23.9153 43.9121L33.939 53.9359C34.2204 54.2195 34.5552 54.4447 34.924 54.5983C35.2929 54.7519 35.6885 54.831 36.088 54.831C36.4876 54.831 36.8832 54.7519 37.252 54.5983C37.6209 54.4447 37.9557 54.2195 38.2371 53.9359L58.9933 33.1746C59.2793 32.8935 59.5068 32.5586 59.6627 32.1892C59.8186 31.8198 59.8999 31.4232 59.9017 31.0222C59.9036 30.6213 59.8261 30.2239 59.6736 29.8531C59.5211 29.4822 59.2967 29.1452 59.0134 28.8615C58.73 28.5778 58.3933 28.353 58.0226 28.2001C57.652 28.0472 57.2547 27.9692 56.8537 27.9706C56.4528 27.972 56.056 28.0528 55.6864 28.2083C55.3168 28.3637 54.9817 28.5908 54.7003 28.8765L36.0855 47.4913Z" fill="red"/>
                    </svg>
                    
            </div>
            <div class="result-line">

            </div>
            
            <div class="result-nav">
                <a href="./index.php">НА ГЛАВНУЮ</a>
                <a href="./profile.php">ЛИЧНЫЙ КАБИНЕТ</a>
            </div>
        </div>
    </main>

    <?php
};



?>
<?php include_once './php/footer.php' ?>