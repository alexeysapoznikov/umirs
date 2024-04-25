<?php

include 'functions.php';

$application = new Functions\getFunctions;
$dbconn = $application->connectDatabase(true);
 
if ($type = $_POST["auth"] == 'reg') {

    $type = $_POST["name"];
    $type = $_POST["surname"];
    $type = $_POST["email"];
    $type = $_POST["number"];
    $type = $_POST["password"];

    $result = $application->addUser($_POST, $dbconn);
    echo $result;

    if ($result == 1) {
        header('Location: /auth.php');
    };

} else {

    $type = $_POST["email"];
    $type = $_POST["password"];

    $application->authUser($_POST, $dbconn);

};