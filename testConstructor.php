<?php include_once './php/header.php' ?>


<main id="testConstructor" class="testConstructor-container">
	<h2>Создание теста</h2>
		<div class="constructor-main-container">
			<form class="constructor-main-info" id="testInfo">
				<h3>Основная информация</h3>
				<input type="text" name="title" placeholder="Название теста">
				<div class="container-two-inputs">
					<input type="text" class="test-desc" name="desc" placeholder="Описание теста">
					<input type="text" class="test-desc" name="desc_short" placeholder="Описание теста (кратко)">
				</div>
				<input type="text" name="time" placeholder="Время прохождения">
				<input type="text" name="difficulty" placeholder="Сложность">
				<div class="container-two-inputs">
                    <p>Фото: </p>
					<input type="file" name="img_main" placeholder="Фото">
                    <p>Превью: </p>
					<input type="file" name="img_preview" placeholder="Превью">
				</div>
			</form>
			<div class="questions-list-block">
				<h3>Список вопросов</h3>
				<div class="questions-list">
					<div class="questionItem">
                        <form method="post" class="question" id="question1" enctype="multipart/form-data">
                            <div class="question-left">
                                <input type="text" name="title" placeholder="Название теста">
                                <input type="text" name="desc" placeholder="Описание теста">
                                Фото:
                                <input type="file" name="img" placeholder="Фото">
                            </div>
                            <div class="question-right">
                                <input type="text" name="response_1" placeholder="Вариант ответа 1">
                                <p>Данный вариант ответа является правильным</p>
                                <input type="text" name="response_2" placeholder="Вариант ответа 2">
                                <input type="text" name="response_3" placeholder="Вариант ответа 3">
                                <input type="text" name="response_4" placeholder="Вариант ответа 4">
                            </div>
                        </form>
                    </div>
				</div>
			</div>
			<div class="test-buttons">
            <a href="" class="newQuestion">Новый вопрос</a>
			<a href="" class="createTest">Сохранить и создать тест</a>
            </div>
		</div>
</main>
<script type="text/javascript">
	$('.newQuestion').click(function(e) {
		e.preventDefault();
		$('.questions-list').append(`
            <div class="questionItem">
            <form method="post" class="question" id="question1" enctype="multipart/form-data">
                <div class="question-left">
                    <input type="text" name="title" placeholder="Название вопроса">
                    <input type="text" name="desc" placeholder="Описание">
                    Фото:
                    <input type="file" name="img" placeholder="Фото">
                </div>
                <div class="question-right">
                    <input type="text" name="response_1" placeholder="Вариант ответа 1">
                    <p>Данный вариант ответа является правильным</p>
                    <input type="text" name="response_2" placeholder="Вариант ответа 2">
                    <input type="text" name="response_3" placeholder="Вариант ответа 3">
                    <input type="text" name="response_4" placeholder="Вариант ответа 4">
                </div>
            </form>
        </div>`);

    });

    $('.createTest').click(function(e) {
        e.preventDefault(); // Предотвращаем стандартное отправление формы
        var testInfo = document.getElementById('testInfo');
        var testInfoFormData = new FormData(testInfo); // Создаем объект FormData для отправки данных формы, включая загруженные файлы

        $.ajax({
            url: './php/scripts/addNewTest.php', // Замените на путь к вашему файлу PHP
            type: 'POST',
            data: testInfoFormData,
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
        

        $('.question').each(function(e) {
            var formData = new FormData(this); // Создаем объект FormData для отправки данных формы, включая загруженные файлы

            $.ajax({
                url: './php/scripts/addNewQuestion.php', // Замените на путь к вашему файлу PHP
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
</script>

<?php include_once './php/footer.php' ?>
