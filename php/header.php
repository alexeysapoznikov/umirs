<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./css/styles.css">
    <script src="./js/script.js"></script>
    <title>Umirs - сервис тестирования</title>
</head>
<body>
        <header>
        <div class="header-top-block">
            <div class="logo-box">
                <svg width="120" height="62" viewBox="0 0 120 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_40_194)">
                    <g clip-path="url(#clip1_40_194)">
                    <g clip-path="url(#clip2_40_194)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M60 62C93.1371 62 120 48.1208 120 31C120 13.8792 93.1371 0 60 0C26.8629 0 0 13.8792 0 31C0 48.1208 26.8629 62 60 62Z" fill="#255CA1"/>
                    <path d="M13.6344 17H18.997L16.0396 31.4145L15.3091 34.9638C15.2616 35.2656 15.2378 35.5493 15.2378 35.8149C15.2378 36.8652 15.612 37.7344 16.3602 38.4225C17.1204 39.0986 18.219 39.4366 19.6562 39.4366C20.9508 39.4366 22.0197 39.1891 22.863 38.6942C23.7063 38.1992 24.3595 37.4628 24.8227 36.4849C25.2859 35.507 25.7551 33.8471 26.2302 31.505L29.2232 17H34.5858L31.6105 31.5231C30.9811 34.5775 30.2565 36.9135 29.437 38.5312C28.6175 40.1489 27.3763 41.4648 25.7135 42.4789C24.0507 43.493 21.9485 44 19.4067 44C16.3662 44 14.0382 43.2455 12.4229 41.7364C10.8076 40.2153 10 38.2656 10 35.8873C10 35.3924 10.0416 34.8551 10.1247 34.2757C10.1722 33.8893 10.3801 32.7907 10.7483 30.9799L13.6344 17Z" fill="white"/>
                    <path d="M38.2915 24.316H43.1017L42.6207 26.652C44.4973 24.7929 46.4689 23.8633 48.5355 23.8633C49.9608 23.8633 51.0594 24.1651 51.8315 24.7687C52.6035 25.3723 53.0964 26.2053 53.3102 27.2677C53.9634 26.3019 54.9017 25.4931 56.1251 24.8411C57.3484 24.1892 58.6193 23.8633 59.9376 23.8633C61.446 23.8633 62.6219 24.2737 63.4652 25.0947C64.3084 25.9156 64.7301 27.0021 64.7301 28.3542C64.7301 29.0182 64.5638 30.1651 64.2312 31.7949L61.8083 43.5474H56.6952L59.1181 31.7949C59.415 30.322 59.5635 29.489 59.5635 29.2959C59.5635 28.7647 59.4032 28.3482 59.0825 28.0464C58.7737 27.7325 58.3045 27.5756 57.675 27.5756C56.4042 27.5756 55.2699 28.2576 54.2722 29.6218C53.5477 30.5997 52.9301 32.3321 52.4194 34.819L50.62 43.5474H45.5069L47.8942 31.9216C48.1673 30.5816 48.3039 29.7124 48.3039 29.314C48.3039 28.8069 48.1317 28.3904 47.7873 28.0645C47.4547 27.7385 46.9915 27.5756 46.3976 27.5756C45.8394 27.5756 45.2634 27.7446 44.6695 28.0826C44.0757 28.4206 43.5531 28.8854 43.1017 29.477C42.6623 30.0685 42.2822 30.8291 41.9615 31.7587C41.819 32.1933 41.5874 33.1772 41.2667 34.7104L39.4495 43.5474H34.3364L38.2915 24.316Z" fill="white"/>
                    <path d="M72.4087 17H77.5218L76.5598 21.7082H71.4466L72.4087 17ZM70.9122 24.3159H76.0253L72.0702 43.5473H66.9571L70.9122 24.3159Z" fill="white"/>
                    <path d="M80.7821 24.316H85.5567L84.7907 28.0464C86.5722 25.2576 88.5023 23.8633 90.5808 23.8633C91.3172 23.8633 92.107 24.0504 92.9503 24.4246L90.9906 28.6802C90.5273 28.5112 90.0344 28.4267 89.5118 28.4267C88.6329 28.4267 87.7362 28.7647 86.8217 29.4407C85.919 30.1168 85.2123 31.0222 84.7016 32.157C84.1909 33.2798 83.6861 35.0665 83.1872 37.5172L81.9401 43.5474H76.827L80.7821 24.316Z" fill="white"/>
                    <path d="M90.6699 38.1691L95.6227 37.3723C96.0621 38.4347 96.6085 39.1892 97.2617 39.6359C97.915 40.0705 98.8057 40.2878 99.9341 40.2878C101.098 40.2878 102.03 40.0222 102.731 39.491C103.218 39.1289 103.462 38.6882 103.462 38.1691C103.462 37.819 103.337 37.5051 103.087 37.2275C102.826 36.9619 102.119 36.6359 100.967 36.2496C97.8793 35.2114 95.9671 34.3904 95.2307 33.7868C94.0786 32.8452 93.5026 31.6138 93.5026 30.0927C93.5026 28.5715 94.0608 27.2617 95.1773 26.1631C96.7332 24.6299 99.0433 23.8633 102.108 23.8633C104.542 23.8633 106.383 24.316 107.631 25.2214C108.878 26.1269 109.667 27.3522 110 28.8975L105.279 29.7305C105.029 29.0303 104.626 28.5051 104.067 28.155C103.307 27.6842 102.393 27.4488 101.324 27.4488C100.255 27.4488 99.4827 27.6299 99.0077 27.9921C98.5444 28.3542 98.3128 28.7707 98.3128 29.2415C98.3128 29.7244 98.5504 30.1228 99.0255 30.4367C99.3224 30.6299 100.279 30.9679 101.894 31.4508C104.388 32.1872 106.057 32.9116 106.9 33.6238C108.088 34.6259 108.682 35.8331 108.682 37.2456C108.682 39.0685 107.927 40.65 106.419 41.99C104.911 43.3301 102.785 44.0001 100.041 44.0001C97.3092 44.0001 95.1951 43.4931 93.6986 42.479C92.2139 41.4528 91.2043 40.0162 90.6699 38.1691Z" fill="white"/>
                    </g>
                    </g>
                    </g>
                    <defs>
                    <clipPath id="clip0_40_194">
                    <rect width="120" height="62" fill="white"/>
                    </clipPath>
                    <clipPath id="clip1_40_194">
                    <rect width="120" height="62" fill="white"/>
                    </clipPath>
                    <clipPath id="clip2_40_194">
                    <rect width="120" height="62" fill="white"/>
                    </clipPath>
                    </defs>
                    </svg>
                    <p>
                        Сервис онлайн тестирования
                    </p>                    
            </div>
            <div class="phones-header">
                <a href="">+7 (900) 459 95-22</a>
                <a href="">+7 (900) 459 95-22</a>
            </div>
        </div>
        <div class="header-bottom-block__container">
            <div class="header-bottom-block">
                <nav>
                    <a href="/">Главная</a>
                    <a href="">О нас</a>
                    <a href="/catalog.php">Тесты</a>
                </nav>
                <?php
                if (empty($_SESSION['USER'])) {
                    ?>
                    <div class="profile">
                        <a href="./auth.php">Войти
                        </a>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="profile">
                        <a href="./profile.php"> Профиль <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.83521 2.95825L1.16471 2.95825L4.99996 8.04175L8.83521 2.95825Z" fill="white" fill-opacity="0.5"/>
                            </svg>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </header>