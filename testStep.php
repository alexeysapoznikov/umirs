<?php

include_once './php/header.php';
include './php/scripts/functions.php';
$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(false);
?>

<style>
    header {
        display: none;
    }

    footer {
        display: none;
    }
</style>

<main id="testStep">
        <!-- <div class="teststep-block">
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
        </div> -->
    </main>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/php/scripts/getTestQuestions.php?id=' + <?= $_GET['id'] ?>,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    

                    $(data).each(function(e) {

                    })
                    let counter = 0;
                    
                    $(data).each(function(e) {
                        let next = 0;
                        let questions = JSON.parse(this[6])
                        function makeRandomArr(a, b) {
                            return Math.random() - 0.5;
                        }
                        let hidden;
                        let first = '';
                        let last = '';
                        questions.sort(makeRandomArr);
                        counter++;
                        next = counter;
                        next++;
                        if (counter != 1) {
                            hidden = 'style="display: none"';
                        };
                        if (counter > 1) {
                            first = `<a href="" id="`+counter+`" style="background-color: #0378A6" class="prevQuestion">НАЗАД</a>`;
                        }
                        if (counter != data.length) {
                            last = `<a href="" id="`+counter+`" class="nextQuestion">ДАЛЕЕ</a>`;
                        } else if (counter == data.length) {
                            last = `<a href="" style="background-color: red" class="endTest">ЗАВЕРШИТЬ ТЕСТ</a>`;
                        }
                        $('#testStep').append(`<div class="teststep-block" id="`+counter+`" `+ hidden +`>
                        <div class="step-top-info">
                            <p><span id="count">`+counter+`/` + data.length + `</span> `+this[2]+`</p> <a href="" id="exit">Выйти</a>
                        </div>
                        <img src="./assets/images/header.png" class="step-image" alt="">
                        <div class="step-qiestion">
                            <div class="step-qiestion-text">
                                <h3>Описание вопроса:</h3>
                                <p>`+this[3]+`</p>
                            </div>
                            <form action="">
                                <h3>Ваш ответ:</h3>
                                <input type="hidden" name="questionid" value="`+this[0]+`">
                                <input type="hidden" name="testId" value="<?= $_GET['id']?>">
                                <div>
                                    <input type="checkbox" name="`+this[0]+`question1" id="`+this[0]+`question1" value="`+questions[2]+`">
                                    <label for="`+this[0]+`question1">`+questions[0]+`</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="`+this[0]+`question2" id="`+this[0]+`question2" value="`+questions[2]+`">
                                    <label for="`+this[0]+`question2">`+questions[1]+`</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="`+this[0]+`question3" id="`+this[0]+`question3" value="`+questions[2]+`">
                                    <label for="`+this[0]+`question3">`+questions[2]+`</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="`+this[0]+`question4" id="`+this[0]+`question4" value="`+questions[2]+`">
                                    <label for="`+this[0]+`question4">`+questions[3]+`</label>
                                </div>
                                `+last+`
                                `+first+`
                            </form>
                        </div>
                    </div>`);
                    })
                },
                error: function(xhr, status, error) {
                    console.error('Ошибка при получении данных:', error);
                }
            });
            $(document).on('click', '.endTest', function(e) {
                e.preventDefault();
                $('form').each(function(e) {
                var formData = new FormData(this); // Создаем объект FormData для отправки данных формы, включая загруженные файлы

                $.ajax({
                    url: './php/scripts/addUserResponses.php', // Замените на путь к вашему файлу PHP
                    type: 'POST',
                    data: formData,
                    processData: false, // Обязательно установите это значение в false
                    contentType: false, // Обязательно установите это значение в false
                    success: function(response) {
                        // Обработка успешного ответа от сервера
                        console.log('Данные успешно отправлены: ' + response);
                    },
                    error: function(xhr, status, error) {
                        // Обработка ошибок
                        console.log('Произошла ошибка при отправке данных: ' + error);
                    }
                });
            });
            });
        });
        $(document).on('click', '.nextQuestion', function(e) {
            e.preventDefault();
            let thisId = $(this).attr('id');
            // alert(thisId);
            
            $('.teststep-block#' + thisId).css('display', 'none');
            thisId++;
            $('.teststep-block#' + thisId).css('display', 'flex');
        });
        $(document).on('click', '.prevQuestion', function(e) {
            e.preventDefault();
            let thisId = $(this).attr('id');
            // alert(thisId);
            
            $('.teststep-block#' + thisId).css('display', 'none');
            thisId--;
            $('.teststep-block#' + thisId).css('display', 'flex');
        });
        
    </script>
<?php include_once "./php/footer.php";?>
