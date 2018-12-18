<?php
/* Article FructCode.com */
if (isset($_POST["username"]) && isset($_POST["password"])) {

    // Формируем массив для JSON ответа
    $result = array(
        'username' => $_POST["username"],
        'password' => $_POST["password"]
    );

    // Переводим массив в JSON
    echo json_encode($result);
}

?>