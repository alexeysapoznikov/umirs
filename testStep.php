<?php

include_once './php/header.php';
include './php/scripts/functions.php';
$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(false);


?>

<main id="testStep">
        <div class="teststep-block">
            <div class="step-top-info">
                <p><span id="count">2/2</span> Звучание вопроса</p> <a href="" id="exit">Выйти</a>
            </div>
            <img src="./assets/images/header.png" class="step-image" alt="">
            <div class="step-qiestion">
                <div class="step-qiestion-text">
                    <h3>Описание вопроса:</h3>
                    <p>Тестовое описание - это документ, который содержит информацию о том, какие тесты необходимо провести для проверки работоспособности вашего проекта. Оно помогает убедиться в том, что.

                        который содержит информацию о том, какие тесты необходимо провести для проверки работоспособности вашего содержит информацию о том, какие тесты необходимо провести для проверки работоспособности вашего проекта. Оно помогает убедитьсяпроекта. Оно помогает убедиться в том, что</p>
                </div>
                <form action="">
                    <h3>Ваш ответ:</h3>
                    <div>
                        <input type="checkbox" id="question1">
                        <label for="question1">Ответ на вопрос номер один</label>
                    </div>
                    <div>
                        <input type="checkbox" id="question1">
                        <label for="question1">Второй ответ на тот же самый вопрос</label>
                    </div>
                    <div>
                        <input type="checkbox" id="question1">
                        <label for="question1">Ответ на те же вопросы, на которые отвечают два предыдущих, но только длиньше</label>
                    </div>
                    <a href="">ДАЛЕЕ</a>
                </form>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/php/scripts/getTestQuestions.php?id=' + <?= $_GET['id'] ?>,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var outputDiv = $('#output');

                    var infoText = "Имя: " + data.name + "<br>";
                    infoText += "Возраст: " + data.age + "<br>";
                    infoText += "Город: " + data.city;

                    outputDiv.html(infoText);
                },
                error: function(xhr, status, error) {
                    console.error('Ошибка при получении данных:', error);
                }
            });
        });
    </script>
<?php include_once "./php/footer.php";?>
