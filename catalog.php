<?php

include_once './php/header.php';
include './php/scripts/functions.php';
$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(false);

?>
    <main id="catalog">
    <div class="breadcrumbs">
        <a href="">Главная <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.95825 1.16475L2.95825 8.83525L8.04175 5L2.95825 1.16475Z" fill="black" fill-opacity="0.5"/>
            </svg></a>
        </p>
    </div>
    <div class="catalog-title">
        <h2>Список тестов</h2>
        <form action="">
            <input type="text" placeholder="Поиск">
            <button type="submit"><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_9_616)">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.31252 1.58333C7.23949 1.58342 6.18203 1.84012 5.22839 2.332C4.27474 2.82389 3.45255 3.5367 2.83041 4.41097C2.20828 5.28523 1.80423 6.2956 1.65199 7.35778C1.49976 8.41996 1.60374 9.50314 1.95526 10.517C2.30678 11.5308 2.89565 12.4458 3.67275 13.1858C4.44984 13.9257 5.39262 14.4691 6.42242 14.7706C7.45223 15.0721 8.5392 15.1229 9.59266 14.9189C10.6461 14.7148 11.6355 14.2618 12.4783 13.5977L15.3694 16.4888C15.5187 16.633 15.7187 16.7128 15.9263 16.711C16.1339 16.7092 16.3324 16.626 16.4792 16.4792C16.626 16.3324 16.7092 16.1338 16.7111 15.9263C16.7129 15.7187 16.6331 15.5187 16.4888 15.3694L13.5977 12.4782C14.3798 11.486 14.8669 10.2936 15.003 9.03744C15.1391 7.78133 14.9188 6.51226 14.3674 5.37549C13.8159 4.23871 12.9556 3.28015 11.8848 2.60951C10.814 1.93887 9.57599 1.58324 8.31252 1.58333ZM3.16668 8.3125C3.16668 6.94774 3.70883 5.63887 4.67386 4.67384C5.63889 3.70881 6.94776 3.16666 8.31252 3.16666C9.67728 3.16666 10.9861 3.70881 11.9512 4.67384C12.9162 5.63887 13.4584 6.94774 13.4584 8.3125C13.4584 9.67725 12.9162 10.9861 11.9512 11.9511C10.9861 12.9162 9.67728 13.4583 8.31252 13.4583C6.94776 13.4583 5.63889 12.9162 4.67386 11.9511C3.70883 10.9861 3.16668 9.67725 3.16668 8.3125Z" fill="white"/>
                </g>
                <defs>
                <clipPath id="clip0_9_616">
                <rect width="19" height="19" fill="white"/>
                </clipPath>
                </defs>
                </svg>
                </button>
        </form>
    </div>
    <div class="catalog-block">
        <?php
        $tests = mysqli_query($dbconn, "SELECT * FROM tests");
        foreach ($tests as $test) {
            $questions = mysqli_query($dbconn, "SELECT * FROM `questions` WHERE `quiz_id` = '".$test['id']."'");

            ?>
            <div class="catalog-item">
                <div class="info-plash">
                    <span id="type1">НЕ ПРОЙДЕН</span>
                    <span id="type2"><?= $questions->num_rows;?> ВОПРОСОВ</span>
                </div>
                <img src="./assets/images/<?= $test['preview_img_src']?>" alt="">
                <h3><?= $test['name']; ?></h3>
                <p><?= $test['desc']; ?></p>
                <a href="./testDetail.php?id=<?= $test['id']; ?>">Начать тест <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.62068 1.74713L5.62068 13.2529L15.2793 7.50001L5.62068 1.74713Z" fill="white"/>
                    </svg>
                </a>
            </div><?php
        };?>
    </div>
    </main>
    <?php include_once './php/footer.php' ?>
