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
        $list = mysqli_query($connection, "SELECT * FROM `users` WHERE `email`='".$user['email']."'");
        // $list = mysqli_fetch_assoc($list);

        print_r($list);
        
    }

}