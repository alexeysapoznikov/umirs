<?php

namespace Functions;


class getFunctions {

    public function connectDatabase($showStatus) {
        $connection = mysqli_connect('localhost', 'root', 'root', 'umirs');
        if ($showStatus == true) {
         echo 'connected';
        }

        return $connection;
     }
     public function addUser($user, $connection) {
        if (!mysqli_query($connection, "INSERT INTO users (`id`, `name`, `surname`, `email`, `number`, `password`, `primary`) VALUES (NULL,'".$user['name']."','".$user['surname']."','".$user['email']."','".$user['number']."', '".$user['password']."', 0)")) {
            echo 'Ошибка добавления пользователя.';
        } else {
            echo 'Пользователь добавлен.';
            return 1;
        }
    }

    public function authUser($user, $connection) {
        $list = mysqli_query($connection, "SELECT * FROM `users` WHERE `email`='".$user['email']."' AND `password`='".$user['password']."'");

        if (!$list->num_rows == 1) {
            echo 'Аккаунт не найден либо введен неправильный пароль';
        } else {
            $userinfo = mysqli_query($connection, "SELECT * FROM `users` WHERE `email`='".$user['email']."'");
            $userinfo = mysqli_fetch_assoc($userinfo);

            session_start();
            $_SESSION['USER']['ID'] = $userinfo['id'];
            $_SESSION['USER']['NAME'] = $userinfo['name'];
            $_SESSION['USER']['SURNAME'] = $userinfo['surname'];
            $_SESSION['USER']['EMAIL'] = $userinfo['email'];
            $_SESSION['USER']['NUMBER'] = $userinfo['number'];
            $_SESSION['USER']['PASSWORD'] = $userinfo['password'];
            $_SESSION['USER']['PRIMARY'] = $userinfo['primary'];
            print_r($_SESSION['USER']);
        }
    }

    public function getTests($connection) {
        $tests = mysqli_query($connection, "SELECT * FROM `tests`");
        $tests = mysqli_fetch_assoc($tests);

        return $tests;
    }

    public function addTest($connection, $testData) {
        mysqli_query($connection, "INSERT INTO tests (`id`, `name`, `desc`, `desc_short`, `preview_img_src`, `main_img_src`, `time`, `difficulty`, `questions`) VALUES (NULL,'".$testData['TITLE']."','".$testData['DESC']."','".$testData['DESC_SHORT']."','".$testData['IMG_PREVIEW']."','".$testData['IMG']."','".$testData['TIME']."','".$testData['DIFFICULTY']."','".$testData['QUESTIONS']."')");
        $thisTestInfo = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `tests` WHERE `name`='".$testData["TITLE"]."'"));
        print_r($thisTestInfo);
        $_SESSION["createdTest"]['INFO'] = $thisTestInfo;
        return $_SESSION["createdTest"]['INFO'];

    }

    public function addQuestion($connection, $questionsData) {
        mysqli_query($connection, "INSERT INTO questions (`id`, `quiz_id`, `title`, `name`, `desc`, `img`, `responses`) VALUES (NULL,'".$questionsData['TEST_ID']."','".$questionsData['TITLE']."','".$questionsData['NAME']."','".$questionsData['DESC']."','".$questionsData['IMG']."','".$questionsData['RESPONSES']."')");
    }

    public function getTestById($connection, $testid) {
        $test = mysqli_query($connection, "SELECT * FROM `tests` WHERE `id`='".$testid."'");
        $test = mysqli_fetch_assoc($test);
        return $test;
    }

    public function getTestQuestions($connection, $testid) {
        $test = mysqli_query($connection, "SELECT * FROM `questions` WHERE `quiz_id`='".$testid."'");
        $test = mysqli_fetch_assoc($test);
        return $test;
    }

    
}