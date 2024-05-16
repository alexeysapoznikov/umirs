<?php

include_once './php/header.php';
include './php/scripts/functions.php';
$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(false);
?>
    <main id="index">
        <div class="top-banner">
            <div class="banner-content">
                <p>Бесплатный многофункциональный сервис для проведения тестирования и обучения</p>
                <a href="./catalog.php">Подробнее</a>
            </div>
        </div>
        <div class="about-block">
            <div class="about-text-block">
                <h2>О сайте</h2>
                <p>Радиолокационные средства охраны,периметральные
                    извещатели, технические средства и системы охраны,
                    инженерно-сигнализационные заграждения,
                    мобильные сигнализационные комплексы
                    разработанные АО «ЮМИРС», успешно решают задачу
                    комплексной охраны периметров и обеспечения
                    безопасности объектов.</p>
                <a href="./catalog.php">Подробнее</a>
            </div>
            <div class="about-img-block">

            </div>
        </div>
        <div class="catalog-light-block">
            <div class="catalog-light-title">
                <h2>Тесты</h2>
                <a href="./catalog.php">Все тесты <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.429 11.0001L11.479 7.05006C11.2968 6.86146 11.196 6.60885 11.1983 6.34666C11.2006 6.08446 11.3057 5.83365 11.4911 5.64824C11.6765 5.46283 11.9274 5.35766 12.1896 5.35538C12.4518 5.35311 12.7044 5.4539 12.893 5.63606L18.55 11.2931C18.6431 11.3857 18.7171 11.4959 18.7676 11.6172C18.818 11.7385 18.844 11.8687 18.844 12.0001C18.844 12.1315 18.818 12.2616 18.7676 12.3829C18.7171 12.5042 18.6431 12.6144 18.55 12.7071L12.893 18.3641C12.7035 18.5417 12.4524 18.6387 12.1927 18.6345C11.933 18.6303 11.6852 18.5252 11.5016 18.3415C11.318 18.1578 11.2131 17.9098 11.209 17.6501C11.205 17.3905 11.3022 17.1394 11.48 16.9501L15.43 13.0001L5.84396 13.0001C5.57874 13.0001 5.32439 12.8947 5.13685 12.7072C4.94932 12.5196 4.84396 12.2653 4.84396 12.0001C4.84396 11.7348 4.94932 11.4805 5.13685 11.293C5.32439 11.1054 5.57874 11.0001 5.84396 11.0001L15.429 11.0001Z" fill="#5C5C5C"/>
                    </svg>
                    </a>
            </div>
            <div class="catalog-light-list">
                <?php

                $tests = mysqli_query($dbconn, "SELECT * FROM tests LIMIT 4");
                foreach ($tests as $test) {
                    $questions = mysqli_query($dbconn, "SELECT * FROM `questions` WHERE `quiz_id` = '".$test['id']."'");
                    if (isset($_SESSION['USER'])) {
                        $successTest = mysqli_query($dbconn, "SELECT * FROM `successTest` WHERE `quiz_id` = '".$test['id']."' AND `user_id` = '".$_SESSION['USER']['ID']."'");
                        if ($successTest->num_rows >= 1) {
                            $testPassed = true;
                        } else {
                            $testPassed = false;
                        }
                    } else {
                        $testPassed = false;
                    }
                ?>
                <div class="catalog-item">
                    <div class="info-plash">
                        <?php
                        
                        if ($testPassed == true) {
                            ?><span id="type1" style="background-color: green;">ПРОЙДЕН</span><?php
                        } else {
                            ?><span id="type1">НЕ ПРОЙДЕН</span><?php
                        };

                        ?>
                        <span id="type2">ВОПРОСЫ: <?= $questions->num_rows; ?></span>
                    </div>
                    <img src="./assets/images/<?=$test['preview_img_src'] ?>" alt="">
                    <h3><?= $test['name'] ?></h3>
                    <p><?= $test['desc'] ?></p>
                        <?php
                        
                        if ($testPassed == true) {
                            ?><a href="/profile.php" style="justify-content: center;">ТЕСТ ПРОЙДЕН
                            </a><?php
                        } else {
                            ?><a href="/testDetail.php?id=<?=$test['id']?>">ПОДРОБНЕЕ <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.62068 1.74713L5.62068 13.2529L15.2793 7.50001L5.62068 1.74713Z" fill="white"/>
                            </svg>
                            </a><?php
                        };

                        ?>
                </div><?php
                };?>
            </div>
        </div>
        <div class="feedback-form">
            <h2>Остались вопросы? Напишите нам!</h2>
            <p>Мы ответим Вам в течение 1 рабочего дня.</p>
            <form action="" id="feedback">
                <div>
                    <input type="text" placeholder="Имя" id="name" name="name">
                    <input type="text" placeholder="Email" id="email" name="email">
                    <input type="text" placeholder="Телефон" id="number" name="number">
                </div>
                <input type="text" placeholder="Напишите ваш вопрос" class="desc" id="comment" name="comment">
                <button>Отправить</button>
            </form>
        </div>
    </main>
    <script>
            $('#feedback').submit(function(event) {
                event.preventDefault();
                
                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#number').val();
                var question = $('#comment').val();
                
                $.ajax({
                    type: 'POST',
                    url: './php/scripts/feedbackNew.php',
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                        question: question
                    },
                    success: function(response) {
                        // Handle success response here
                        alert('Сообщение успешно отправлено')
                    },
                    error: function(xhr, status, error) {
                        // Handle error response here
                        console.error('AJAX request error:', error);
                    }
                });
            });
    </script>

<?php include_once "./php/footer.php";?>